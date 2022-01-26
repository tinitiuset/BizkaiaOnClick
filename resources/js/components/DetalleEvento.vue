<template>
    <div class="container-fluid my-lg-2">
        <div class="row align-items-start flex-column-reverse flex-md-row justify-content-xl-center mx-xl-5">
            <div class="cardPersonalizada col-md-5 col-xl-7 mx-0 mx-md-2 my-0 my-md-2 rounded-0 rounded-lg-2 text-white">
                <h2 class="text-lg-center font-weight-bold h2Personalizado">{{evento.titulo}}</h2>
                <!--TITULO EVENTO-->
                <div class="row mb-3 justify-content-center">
                    <h3>{{evento.categoria}}</h3>
                </div>

                <!--DESCRIPCION EVENTO-->
                <div class="row mb-3 justify-content-center">
                    <div class="col-5 g-2 rounded-1 p-2 bordeDegradado">
                        
                        <span class="d-block" title="Localidad"><i class="fas fa-map-marker-alt"></i> {{evento.localidad}}</span>
                        <span class="d-block" title="Inicio del evento"><i class="far fa-calendar-check"></i> {{evento.fechaInicio}}</span>
                        <span class="d-block" title="Fin del evento"><i class="far fa-calendar-times"></i> {{evento.fechaFin}}</span>
                        <span class="d-block" title="Hora del evento"><i class="far fa-clock"></i> {{evento.hora}}</span>
                        <span class="d-block" title="Precio"><i class="fas fa-euro-sign"></i> {{evento.precio}}</span>
                        <span class="d-block" title="Sala del recinto" v-if="evento.sala != null"><i class="fas fa-door-open"></i> {{evento.sala}}</span>
                        <span class="d-block" title="Direccion fisica">{{evento.direccion}}</span>

                    </div>
                    <div class="col-6 g-0 ms-3">
                        <p>{{evento.descripcion}}</p>
                    </div>

                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide col-md-6 col-lg-5 col-xl-4 mx-auto m-md-4 g-0" data-bs-ride="carousel" style="">
                <div class="carousel-inner">
                    <div :class="{ 'active': index === 0, 'carousel-item' : true, 'imgResponsiveCarousel' : true }" v-for="(foto, index) in evento.fotos" :key="foto.id">

                        <img :src="'/img/eventos/'+foto.ruta" class="d-block w-100" alt="...">

                    </div>
                </div>
                <button class="carousel-control carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    name: "DetalleEvento",
    // data() {
    //     return {
    //         index : 0
    //     }
    // },
    props: {

        eventopasado: String,

    },
    computed: {

        ...mapGetters([
            'evento',
        ])

    }, 
    mounted() {

        this.$store.dispatch("fetchEvento",this.eventopasado);

    },
    
}
</script>