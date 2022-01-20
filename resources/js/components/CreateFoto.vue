<template>
    <form action="" @submit='createFoto(foto)'>
        <h4 class="text-center font-weight-bold">Formulario de creación de foto</h4>
        <div class="form-group pt-1">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" onchange="cargarImg()">
        </div>
         <div class="form-group pt-1">
             
        </div>
        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
            Agregar foto
        </button>
    </form>
</template>

<script>
    export default {
        name: "CreateFoto",
        data() {
            return {
                foto: {
                    foto: ''
                }
            }
    },
    methods: {
        createFoto(foto) {
            this.$store.dispatch('createFoto', foto)
        }
    },
    computed: {
        isValid() {
            return this.foto.foto !== '' 
            }
        }
    }
</script>

<style scoped>

</style>
