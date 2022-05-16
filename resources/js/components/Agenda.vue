<template>

    <div>

        <!-- {{eventos}} -->

        <div class="container-fluid my-4 g-0">
            <div class="row mx-5 my-2" v-if="mensaje || mensajeeliminado">
                <div class="alert text-center alert-success alert-dismissible fade show fw-bold" role="alert" v-if="mensaje">
                    {{mensaje}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="alert text-center alert-danger alert-dismissible fade show fw-bold" role="alert" v-else-if="mensajeeliminado">
                    {{mensajeeliminado}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
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
                            <form :action="'/alertas/'+filtroCategoria" method="post" id="removeFavorito" class="d-inline"  >
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="_method" value="DELETE">
                                <svg style="cursor: pointer" class="svg-inline--fa fa-star fa-w-18 checked" v-show="favorito && filtroCategoria != ''" @click="removeFavorito" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                            </form>
                            
                            <!-- To display unchecked star rating icons -->
                            <form action="/alertas" method="post" id="addFavorito" class="d-inline" v-show="!favorito && filtroCategoria != ''" >
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="categoria" :value="filtroCategoria">
                                <svg style="cursor: pointer" class="svg-inline--fa fa-star fa-w-18 unchecked" v-show="!favorito && filtroCategoria != ''" @click="addFavorito" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>
                            </form>
                            
                            <!-- <i class="fas fa-star"></i> -->
                        </div>
                        <div class="col-4">
                            <div class="me-2 d-inline">
                                <label for="" class="fw-bold">
                                    Precio:
                                </label>
                                <select class="p-0 w-auto mx-auto" name="" id="selectPrecio" v-model="filtroPrecio">
                                    <option value="">Todos</option>
                                    <option v-for="(precio, idx) in precios" :key="idx" :value="precio.value">{{precio.name}}</option>
                                </select>
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
    props: {
        mensaje: String,
        mensajeeliminado: String
    },
    data () {

        return {

            csrf: document.head.querySelector('meta[name="csrf-token"]') ? document.head.querySelector('meta[name="csrf-token"]').content : '',
            filtroCategoria: "",
            filtroPrecio: "",
            filtroGratis: "",
            filtroLocalidad: "",
            filtroFechaInicio: "",
            filtroFechaFin: "",
            filtroPalabra: "",
            favorito: false,
            eventosFiltrados: "",
            // diasSemana: ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"]
            NUM_RESULTS: 24, // Numero de resultados por página
            pag: 1, // Página inicial
            precios: [
                {name: 'Gratuito', value: {minValue: 0, maxValue: 0} },
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

        addFavorito () {

            document.getElementById("addFavorito").submit();

        },
        removeFavorito () {

            document.getElementById("removeFavorito").submit();


        },
        esFavorito() {

            this.favorito = this.alertas.filter(alerta => alerta.nombre == this.filtroCategoria).length > 0;

        },
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
            this.eventosFiltrados = this.filterByCategory(this.filterByPrice(this.filterByPalabra(this.filterByFecha(this.eventos))));
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

            if (this.filtroPrecio.maxValue == 0) {
               return eventosFiltrados.filter(e => e.precio == 0);
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

        },
        filterByFecha(eventosFiltrados) {   
           if (this.filtroFechaInicio == "" && this.filtroFechaFin == "") {
               return eventosFiltrados;
           }

           if (this.filtroFechaInicio != "" && this.filtroFechaFin != "") {
               return eventosFiltrados.filter(e=> e.fechaInicio>=this.filtroFechaInicio && e.fechaFin<=this.filtroFechaFin);
           } else if (this.filtroFechaInicio != "") {
                return eventosFiltrados.filter(e=> e.fechaInicio>=this.filtroFechaInicio);
           } else {
                return eventosFiltrados.filter(e=> e.fechaFin<=this.filtroFechaFin);
           } 
        }

    },

    computed: {
        ...mapGetters([
            'eventos',
            'categorias',
            'alertas'
        ])
        
        
        /* , eventosFiltrados() {

            
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
        await this.$store.dispatch('fetchAlertas');

        // window.setInterval()

        // while (true) {
            
        //     if (this.eventos.length > 0) {
                
                // this.eventosFiltrados = this.eventos;

        //     }

        // }

    },
    mounted: function () {

        this.filter();

    },
    watch: {
        eventos: function(newData, oldData){
            this.eventosFiltrados = this.eventos
        },
        filtroCategoria: function(newData, oldData){
            this.esFavorito();
            this.filter();
        },
        filtroPrecio: function(newData, oldData){
            this.filter();
        },
        filtroPalabra: function(newData, oldData) {

            this.filter();

        },
        filtroFechaInicio: function(newData, oldData) {

            this.filter();

        },
        filtroFechaFin: function(newData, oldData) {

            this.filter();

        },
        filtroGratis: function(newData, oldData) {
            
            this.filter();

        },
    },
}
</script>