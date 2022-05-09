<template>

    <div>

        <!-- {{eventos}} -->

        <div class="container-fluid my-4 g-0">

            <div class="row mx-auto my-2">
                <h3 class="text-center">Busca tus eventos:</h3>
                <div class="text-center">
                <input type="text" name="" placeholder="Buscar evento..." aria-label="Search" class="form-control d-inline form-control-dark w-50 mx-auto" id="" v-model="filtroPalabra" />
                </div>

            </div>
            <div class="row text-center mx-auto my-2">
                <div class="col">
                    <h3>Filtros:</h3>

                    <div class="row">
                        <div class="col-4">
                            <label for="" class="fw-bold">
                                Categoria:
                            </label>
                            <select class="p-0 w-auto mx-auto" name="" id="" v-model="filtroCategoria">
                                <option value="">Todos</option>
                                <option v-for="categoria in categorias" :key="categoria.nombre" :value="categoria.nombre">{{categoria.nombre}}</option>
                            </select>
                            <span class = "fa fa-star checked"></span>
                            <!-- To display unchecked star rating icons -->
                            <span class = "fa fa-star unchecked"></span>
                            <!-- <i class="fas fa-star"></i> -->
                        </div>
                        <div class="col-4">
                            <div class="me-2 d-inline">
                                <label for="" class="fw-bold">
                                    Precio:
                                </label>
                                <select class="p-0 w-auto mx-auto" name="" id="" v-model="filtroPrecio">
                                    <option value="">Todos</option>
                                    <option v-for="(precio, idx) in precios" :key="idx" :value="precio.value">{{precio.name}}</option>
                                </select>
                            </div>
                            <div class="d-inline">
                                <input type="checkbox" class="mx-auto" name="" id="" v-model="filtroGratis">
                                <label for="" class="fw-bold">Gratis</label>
                            </div>
                            


                        </div>
                        <div class="col-4">
                            <label for="" class="fw-bold">
                                Fecha inicio:
                            </label>
                            <input type="date" name="" id="" v-model="filtroFechaInicio">
                            <label for="" class="fw-bold">
                                Fecha fin:
                            </label>
                            <input type="date" name="" id="" v-model="filtroFechaFin">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="container-fluid my-4">

            <div class="row g-3">

                <div v-for="(evento, index) in eventosFiltrados" :key="evento.id" :class="{'d-none':evento.fotos.length === 0,'py-4':true, 'col-md-6':true, 'col-lg-4':true}" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">

                    <div class="card h-100 bg-dark">
                        
                        <img v-if="evento.fotos.length > 0" class="card-img-top" :src="'/img/eventos/'+evento.fotos[0].ruta" :alt="evento.titulo" style="height: 400px">
                        <div class="card-body bg-dark border border-1 border-dark overflow-hidden m-1">
                            <h5 class="card-title"><a :href="'/detalleevento/'+evento.id" class="text-decoration-none text-white texto-degradado">{{evento.titulo}}</a></h5>
                            <p class="card-text text-white">{{reducirTexto(evento.descripcion)}} <span class="fs-2">...</span></p>
                        </div>
                        <a :href="'/detalleevento/'+evento.id" class="btn btn-primary botonSinRedondeo w-100">Ver</a>

                    </div>

                </div>

            </div>

            <nav aria-label="Page navigation" class="text-center">
                <ul class="pagination text-center justify-content-center">
                    <li class="mx-2">
                        <a href="#" aria-label="Primero" v-show="pag != 1" @click.prevent="pag = 1" class="btn btn-info">
                            <span aria-hidden="true"><i class="fas fa-arrow-left"></i> <i class="fas fa-arrow-left"></i></span>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="anteriorPagina" class="btn btn-danger">
                            <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="#" aria-label="Siguiente" v-show="pag * NUM_RESULTS / eventosFiltrados.length < 1" @click.prevent="siguientePagina" class="btn btn-success">
                            <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </li>
                    <li class="mx-2">
                        <a href="#" aria-label="Ultimo" v-show="(pag != Math.ceil(eventosFiltrados.length / NUM_RESULTS)) && (eventosFiltrados.length > NUM_RESULTS)" @click.prevent="pag = Math.ceil(eventosFiltrados.length / NUM_RESULTS)" class="btn btn-info">
                            <span aria-hidden="true"><i class="fas fa-arrow-right"></i> <i class="fas fa-arrow-right"></i></span>
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

            filtroCategoria: "",
            filtroPrecio: "",
            filtroGratis: "",
            filtroLocalidad: "",
            filtroFechaInicio: "",
            filtroFechaFin: "",
            filtroPalabra: "",
            eventosFiltrados: "",
            // diasSemana: ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"]
            NUM_RESULTS: 24, // Numero de resultados por página
            pag: 1, // Página inicial
            precios: [
                {name: 'menos de 20€', value: {minValue: 0, maxValue: 20} },
                {name: 'entre 20€ y 60€', value: {minValue: 20, maxValue: 60}},
                {name: 'entre 60€ y 100€', value: {minValue: 60, maxValue: 100}},
                {name: 'entre 100€ y 150€', value: {minValue: 100, maxValue: 150}},
                {name: 'entre 150€ y 200€', value: {minValue: 150, maxValue: 200}},
                {name: 'más de 200€', value: {minValue: 200, maxValue: null}},
            ]
        };

    },
    methods: {

        reducirTexto (texto) {

            return texto.split(' ').slice(0,60).join(' ');

        },
        siguientePagina () {

            this.pag += 1; 
            $(window).scrollTop(0,0);

        },
        anteriorPagina () {

            this.pag -= 1; 
            $(window).scrollTop(0,0);

        },
        filter(){
            this.eventosFiltrados = this.filterByCategory(this.filterByPrice(this.filterByPalabra(this.eventos)))
        },
        filterByCategory(eventosFiltrados){
            if (this.filtroCategoria == "") {
                return eventosFiltrados;
            }
            return eventosFiltrados.filter(e => e.categoria == this.filtroCategoria);
        },
        filterByPrice(eventosFiltrados){
            if (this.filtroPrecio == "") {
                return eventosFiltrados;
            }
            return eventosFiltrados.filter(e => e.precio < this.filtroPrecio.maxValue && e.precio > this.filtroPrecio.minValue);
        },
        filterByLocalidad(eventosFiltrados){
            if (this.filtroLocalidad == "") {
                return eventosFiltrados;
            }
            return eventosFiltrados.filter(e => e.localidad == this.filtroLocalidad);
        },
        filterByPalabra(eventosFiltrados){

            if (this.filtroPalabra == "") {
                
                return eventosFiltrados;

            }

            return eventosFiltrados.filter(e => {
                return (e.titulo.toLowerCase().includes(this.filtroPalabra.toLowerCase())) || (e.descripcion.toLowerCase().includes(this.filtroPalabra.toLowerCase()));
            });

        }

    },

    computed: {
        ...mapGetters([
            'eventos',
            'categorias'
        ])/* , eventosFiltrados() {

            
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




        } */
    }, 
    beforeMount: async function() {

        await this.$store.dispatch('fetchEventos');
        await this.$store.dispatch('fetchCategorias');
        this.eventosFiltrados = this.eventos;
        console.log(this.eventos)
    },
    mounted: function () {

        this.filter();

    },
    watch: {
        filtroCategoria: function(newData, oldData){
            this.filter();
        },
        filtroPrecio: function(newData, oldData){
            this.filter();
        },
        filtroPalabra: function(newData, oldData) {

            this.filter();

        },
        filtroFechas: function(newData, oldData) {

            this.filter();

        }
    },
}
</script>