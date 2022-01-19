<template>
    <form action="" @submit="createEvento(evento)">
        <h4 class="text-center font-weight-bold">Formulario de creacion de Evento</h4>
        <div class="form-group pt-1">
            Titulo: <input type="text" placeholder="" v-model="evento.titulo" class="form-control">

        </div>
        <div class="form-group pt-1">
            Descripcion: <textarea v-model="evento.descripcion" placeholder="" class="form-control">

                </textarea>
        </div>
        <div class="row pt-1">
            <div class="col-6 form-group">
                Inicio: <input type="date" placeholder="Inicio del Evento" v-model="evento.fechaInicio" class="form-control">

            </div>
            <div class="col-6 form-group">
                Fin: <input type="date" placeholder="Fin del Evento" v-model="evento.fechaFin" class="form-control">

            </div>
        </div>
        <div class="row pt-1">
            <div class="col-6 form-group">
                Hora: <input type="number" placeholder="" v-model="evento.hora" class="form-control">

            </div>
            <div class="col-6 form-group">
                Precio: <input type="number" placeholder="" v-model="evento.precio" class="form-control">

            </div>
        </div>
        <div class="form-group pt-1">
            Direccion: <input type="text" placeholder="" v-model="evento.direccion" class="form-control">

        </div>
        <div class="form-group pt-1">
            Sala: <input type="text" placeholder="" v-model="evento.sala" class="form-control">

        </div>
        <div class="form-group pt-1">
            Recinto: <input type="text" placeholder="" v-model="evento.recinto" class="form-control">

        </div>
        <div class="form-group pt-1">
            Localidad:<input type="text" placeholder="" v-model="evento.localidad" class="form-control">

        </div>

        <div class="form-group pt-1">
            <button :disabled="!isValid" class="btn btn-block btn-primary" @click.prevent="createEvento(evento)">Crear Evento
            </button>
        </div>
    </form>
</template>

<script>
export default {
    name: "CreateEvento",
    data() {
        return {
            evento: {
                titulo: '',
                descripcion: '',
                fechaInicio: '',
                fechaFin: '',
                hora: '',
                precio: '',
                direccion: '',
                sala: '',
                recinto: '',
                localidad: ''
            }
        }
    },
    methods: {
        createEvento(evento) {
            this.$store.dispatch('createEvento', evento)
        }
    },
    computed: {
        isValid() {
            //TODO Hacer correspondientes validaciones
            // Validaciones JS
            return this.evento.titulo !== '' && this.evento.descripcion !== ''
        }
    }
}
</script>

<style scoped>

</style>
