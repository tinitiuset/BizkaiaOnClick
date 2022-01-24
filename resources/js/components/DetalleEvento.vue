<template>
    <div>
        {{evento}}
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    name: "DetalleEvento",
    props: {

        eventopasado: String

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