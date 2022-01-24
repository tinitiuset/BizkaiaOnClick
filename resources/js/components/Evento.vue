<template>
    <div>
        <div class="row">
            <div class="col-12"><h2>FOTO</h2></div>
        </div>
        <div class="row">
            <div class="col-6">{{evento.titulo}}</div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="row">Fecha de Inicio:</div>
                <div class="row">{{evento.fechaInicio}}</div>
                <div class="row">Fecha de Fin:</div>
                <div class="row">{{evento.fechaFin}}</div>
            </div>
            <div class="col-9">
                {{evento.descripcion}}
            </div>
        </div>
        {{evento}}
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
