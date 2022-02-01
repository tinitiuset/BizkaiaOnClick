<template>

    <div>

        <!-- {{eventos}} -->

        <div class="container-fluid my-4 g-0">

            <div class="row mx-auto my-2">
                <h3 class="text-center">Busca tus eventos:</h3>
                <div class="text-center">
                <input type="text" name="" placeholder="Buscar evento..." aria-label="Search" class="form-control d-inline form-control-dark w-50 mx-auto" id="" v-model="filtro" />
                <button id="search-button" type="button" class="btn btn-primary" title="Actualizar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                    </svg>
                </button>
                </div>

            </div>
            <div class="row text-center mx-auto my-2">
                <h3>Categorias:</h3>
                <select class="p-0 w-auto mx-auto" name="" id="" v-model="filtroCategoria">
                    <option value="Todos">Todos</option>
                    <option v-for="categoria in categorias" :key="categoria.nombre" :value="categoria.nombre">{{categoria.nombre}}</option>
                </select>
            </div>
        </div>

        <div class="container-fluid my-4">

            <div class="row g-3">

                <div v-for="(evento, index) in eventosFiltrados" :key="evento.id" class="py-4 col-md-6 col-lg-4" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">

                    <div class="card h-100 bg-dark" v-if="evento.fotos.length > 0">
                        
                        <img class="card-img-top" :src="'/img/eventos/'+evento.fotos[0].ruta" :alt="evento.titulo" style="height: 400px">
                        <div class="card-body bg-dark border border-1 border-dark h-25 overflow-hidden m-1">
                            <h5 class="card-title"><a :href="'/detalleevento/'+evento.id" class="text-decoration-none text-white texto-degradado">{{evento.titulo}}</a></h5>
                            <p class="card-text text-white">{{evento.descripcion}}.</p>
                        </div>
                        <a :href="'/detalleevento/'+evento.id" class="btn btn-primary botonSinRedondeo w-100">Ver</a>

                    </div>

                </div>

            </div>

            <nav aria-label="Page navigation" class="text-center">
                <ul class="pagination text-center justify-content-center">
                    <li class="mx-2">
                        <a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="anteriorPagina" class="btn btn-primary">
                            <span aria-hidden="true">Anterior</span>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="#" aria-label="Next" v-show="pag * NUM_RESULTS / eventosFiltrados.length < 1" @click.prevent="siguientePagina" class="btn btn-primary">
                            <span aria-hidden="true">Siguiente</span>
                        </a>
                    </li>
                </ul>
            </nav>

         </div>

        </div>

    <!-- </div> -->
    
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    name: "Agenda",
    data () {

        return {

            filtroCategoria: "Todos",
            filtro: "",
            // diasSemana: ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"]
            NUM_RESULTS: 25, // Numero de resultados por página
            pag: 1, // Página inicial

        };

    },
    methods: {

        siguientePagina () {

            this.pag += 1; 
            $(window).scrollTop(0,0);

        },
        anteriorPagina () {

            this.pag -= 1; 
            $(window).scrollTop(0,0);

        }

    },

    computed: {
        ...mapGetters([
            'eventos',
            'categorias'
        ]), eventosFiltrados() {

            
            if (this.filtro != "") {

                this.filtrado = [];

                if (this.filtroCategoria == "Todos") {
                    
                    this.eventos.forEach(evento => {
                        
                        if ((evento.titulo.toLowerCase().includes(this.filtro.toLowerCase())) || (evento.descripcion.toLowerCase().includes(this.filtro.toLowerCase()))) {

                            this.filtrado.push(evento);

                        }

                    });

                } else {

                    this.eventos.forEach(evento => {
                        
                        if (this.filtroCategoria == evento.categoria) {
                            
                            if ((evento.titulo.toLowerCase().includes(this.filtro.toLowerCase())) || (evento.descripcion.toLowerCase().includes(this.filtro.toLowerCase()))) {

                                this.filtrado.push(evento);

                            }

                        }

                    });

                }
                


                return this.filtrado

            }

            if (this.filtroCategoria == "Todos") {
                
                return this.eventos;

            }

            this.filtrado = [];

            this.eventos.forEach(evento => {
                
                if (this.filtroCategoria == evento.categoria) {

                    this.filtrado.push(evento);

                }

            });

            return this.filtrado;




        }
    }, beforeMount () {

        this.$store.dispatch('fetchEventos');
        this.$store.dispatch('fetchCategorias');

    }
}
</script>