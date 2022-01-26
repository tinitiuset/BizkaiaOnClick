<template>
    <div class="evento-container">
        <div class="row">
            <div class="col-12"><h2>FOTO</h2></div>
        </div>
        <div class="container bg-black text-light rounded-3 pt-4 pb-4">
            <div class="h2 m-2">
                {{ evento.titulo }}
            </div>
            <div class="bg-dark border rounded border-dark text-light m-2">
                CATEGORIA
            </div>
            <div class="row bg-dark m-2 rounded-3">
                <div class="col-md-3 p-2 text-center">
                    <div class="rounded-2 bg-primary">
                    <div class="">Desde:</div>
                    <div class="">{{ evento.fechaInicio }}</div>
                    </div>
                    <div class="rounded-2 bg-secondary">
                    <div class="">Hasta:</div>
                    <div class="">{{ evento.fechaFin }}</div>
                    </div>
                    <div class="pt-2">{{ evento.hora }}</div>
                    <div class="">{{ evento.sala }}</div>
                    <div class="">{{ evento.recinto }}</div>
                    <div class="">{{ evento.localidad }}</div>
                </div>
                <div class="col-md-9 text-justify">
                    {{ evento.descripcion }}
                </div>
            </div>
            <div class="text-center">
                <div class="h2">{{ evento.recinto }} {{ evento.sala }}</div>
                <div class="">{{ evento.direccion }}</div>
            </div>
        </div>
        <div class="h2">
        {{ evento }}
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
    name: "Evento",
    props: ['id'],
    mounted() {
        this.$store.dispatch('fetchEvento', this.id)
    },
    computed: {
        ...mapGetters([
            'evento'
        ])
    }
}

</script>

<style scoped>

</style>
