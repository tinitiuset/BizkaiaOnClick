<template>

    <div>

        <!-- {{eventos}} -->

        <div class="container-fluid my-4 g-0">

            <div class="row mx-auto">
                <h3 class="text-center">Busca tus eventos:</h3>
                <div class="text-center">
                <input type="text" name="" placeholder="Buscar evento..." aria-label="Search" class="form-control d-inline form-control-dark w-50 mx-auto" id="" v-model="filtro" />
                <button id="search-button" type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                    </svg>
                </button>
                </div>

            </div>
            <div class="row text-center mx-auto">
                <h3>Categorias:</h3>
                <select class="text-center w-auto mx-auto" name="" id="" v-model="filtroCategoria">
                    <option value="Todos" class="text-center">Todos</option>
                    <option v-for="categoria in categorias" :key="categoria.nombre" :value="categoria.nombre">{{categoria.nombre}}</option>
                </select>
            </div>
        </div>

        <div class="container-fluid my-4">

            <div v-for="evento in eventosFiltrados" :key="evento.id" class="card col">

                <!-- {{evento.fotos[0].id}} -->

                <img class="card-img-top" :src="'/img/eventos/'+evento.fotos[0].ruta" alt="Card image cap">
                <div class="card-body bg-white border border-1">
                    <h5 class="card-title"><a :href="'/detalleevento/'+evento.id" class="text-decoration-none text-dark texto-degradado">{{evento.titulo}}</a></h5>
                    <p class="card-text">{{evento.descripcion}}.</p>
                    <a :href="'/detalleevento/'+evento.id" class="btn btn-primary">Ver</a>
                </div>

                <!-- {{evento}} -->

                <!-- <div class="row">
                    <img :src="" alt="">
                    <h4><a href="/detalleevento" class="text-decoration-none text-dark texto-degradado" :id="evento.id" @mouseover="agrandarTitulo($event)" @mouseout="reducirTitulo($event)">{{ evento.titulo }}</a></h4>
                    <h4>{{ evento.categoria }}</h4>
                    <p>{{ evento.descripcion }}</p>
                </div>

                <div class="row">
                    <div class="bg-dark">
                        
                    </div>
                    <div>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{evento.localidad}}</span>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                            </svg>
                            <span>
                                {{evento.fechaInicio.replaceAll("-","/")}} - {{evento.fechaFin.replaceAll("-","/")}}
                                {{diasSemana}} - {{}} 
                            </span>
                        </p>
                        <p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-euro" viewBox="0 0 16 16">
                            <path d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z"/>
                            </svg>
                            <span v-if="evento.precio == 0">Gratis</span>
                            <span v-else>{{evento.precio}}€</span>
                        </p>

                    </div>
                </div> -->

            </div>

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
            diasSemana: ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"]

        };

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