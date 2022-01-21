<template>

    <div class="py-4">

        <div class="container-fluid">
            <h2>Categorias</h2>
            <select name="" id="">
                <option value="todos">Todos</option>
                <option v-for="categoria in categorias" :key="categoria.nombre" :value="categoria.nombre">{{categoria.nombre}}</option>
            </select>
        </div>

        <div v-for="evento in eventos" :key="evento.id">

         <div class="container-fluid my-1"> 

             <div class="row text-center">
                 <img src="" alt="">
             </div>

            <div class="row">
                <img src="" alt="">
                <h3>{{ evento.titulo }}</h3>
                <p>{{ evento.descripcion }}</p>
            </div>

            <div class="row">
                <div class="bg-dark">
                    
                </div>
            </div>

         </div>

        </div>



    </div>
    
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    name: "Agenda",
    data: {

        eventosFiltrados: eventos

    },
    methods: {

        filtrarEventos() {

            eventosFiltrados = [];

            eventos.forEach(evento => {
                
                // if (evento.categoria == ) {
                    
                // }

            });
            

        }

    },
    computed: {
        ...mapGetters([
            'eventos',
            'categorias'
        ])
    }, mounted() {

        this.$store.dispatch('fetchEventos');
        this.$store.dispatch('fetchCategorias');

    }

}
</script>