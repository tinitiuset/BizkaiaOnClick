<template>
    <div>
        <h4 class="text-center font-weight-bold">Eventos</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="evento in eventos">
                <td>{{evento.titulo}}</td>
                <td>{{evento.descripcion}}</td>
                <td>
                    <button class="btn btn-danger" @click="deleteEvento(evento)"><i style="color:white" class="fa fa-trash"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
import {mapGetters} from 'vuex';
export default {
    name: "Eventos",
    mounted() {
        this.$store.dispatch('fetchEventos')
    },
    methods: {
        deleteEvento(evento) {
            this.$store.dispatch('deleteEvento',evento)
        }
    },
    computed: {
        ...mapGetters([
            'eventos'
        ])
    }
}
</script>

<style scoped>

</style>
