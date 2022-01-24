<template>
    <form action="" @submit='crear(createFoto)'>
        <h4 class="text-center font-weight-bold">Formulario de creación de foto</h4>
        <div class="form-group pt-1">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" onchange="cargarImg()">
        </div>
         <div class="form-group pt-1">
              <select name="evento" id="evento">
                <option v-for="evento in eventos" :key="evento.titulo" :value="evento.titulo">{{evento.titulo}}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
            Agregar foto
        </button>
    </form>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        name: "createFoto",
        data() {
            return {
                foto: {
                    foto: ''
                }
            }
    },

    methods: {
        createFoto(foto) {
            this.$store.dispatch('createFoto', foto);
        }
    },

    computed: {
        ...mapGetters([
            'eventos'
        ]), 
        beforeMount() {
            this.$store.dispatch('fetchEventos');
        },
        isValid() {
            return this.foto.foto !== '';
            }
        }
    }
</script>

<style scoped>

</style>
