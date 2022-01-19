<template>
    <div>
        {{ id }}
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
