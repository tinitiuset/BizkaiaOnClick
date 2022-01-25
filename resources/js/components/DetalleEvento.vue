<template>
    <div class="container-fluid my-lg-2">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
            <div class="cardPersonalizada col-md-5 col-lg-7 mx-md-2 my-0 my-md-2 mx-0 rounded-0 text-white">
                <h2 class="text-md-center font-weight-bold h2Personalizado">{{evento.titulo}}</h2>
                <!--TITULO EVENTO-->
                <div class="row mb-3 justify-content-center">
                    <h3>{{evento.categoria}}</h3>
                </div>

                <!--DESCRIPCION EVENTO-->
                <div class="row mb-3 justify-content-center">
                    <p>{{evento.descripcion}}</p>
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide mx-auto mx-md-2 col-md-6 col-lg-4 g-0" data-bs-ride="carousel" style="">
                <div class="carousel-inner">
                    <div :class="{ 'active': index === 0, 'carousel-item' : true, 'imgResponsiveCarousel' : true }" v-for="(foto, index) in evento.fotos" :key="foto.id">

                        <img :src="'/img/eventos/'+foto.ruta" class="d-block w-100" alt="...">

                        <!-- {{index++}} -->

                    </div>
                    <!-- <div class="carousel-item active">
                    <img src="/img/eventos/1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item ">
                    <img src="/img/eventos/2.jpg" class="d-block w-100" alt="...">
                    </div> -->
                    <!-- <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    </div> -->
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
        var bootstrap_enabled = (typeof $().modal == 'function');
        console.log(bootstrap_enabled);
        // $('#carouselExampleControls').carousel();
    },
    
}
</script>