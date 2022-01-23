<template>

    <div class="py-4">

        <!-- {{eventos}} -->

        <div class="container-fluid">
            <h2>Categorias</h2>
            <select name="" id="" v-model="filtro">
                <option value="Todos">Todos</option>
                <option v-for="categoria in categorias" :key="categoria.nombre" :value="categoria.nombre">{{categoria.nombre}}</option>
            </select>
        </div>

        <div v-for="evento in eventosFiltrados" :key="evento.id">

         <div class="container-fluid my-1"> 

             <div class="row text-center">
                 <img src="" alt="">
             </div>

            <div class="row">
                <img src="" alt="">
                <h3>{{ evento.titulo }}</h3>
                <h3>{{ evento.categoria }}</h3>
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
    data () {

        return {

            filtro: "Todos"

        };

    },
    computed: {
        ...mapGetters([
            'eventos',
            'categorias'
        ]), eventosFiltrados() {

            console.log(this.filtro)

            if (this.filtro == "Todos") {
                
                return this.eventos;

            }

            this.filtrado = [];

            this.eventos.forEach(evento => {
                
                if (this.filtro == evento.categoria) {

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