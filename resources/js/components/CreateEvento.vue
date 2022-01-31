<template>
    <div>
        <form action="" @submit="createEvento(evento)">
            <div class="cardPersonalizada">
                <h2 class="text-center font-weight-bold h2Personalizado">Envia tus eventos</h2>
                <!--TITULO EVENTO-->
                <div class="row mb-3 justify-content-center">
                    <label for="titulo" class="col-form-label white">Título:</label>
                    <div class="col">
                        <input id="titulo" type="text" placeholder="" v-model="evento.titulo" class="form-control col-10 ">
                    </div>
                </div>

                <!--DESCRIPCION EVENTO-->
                <div class="row mb-3 justify-content-center">
                    <label for="descripcion" class="col-form-label white">Descripción:</label>
                    
                    <div class="col">
                        <textarea id="descripcion" v-model="evento.descripcion" placeholder="" class="form-control"></textarea>
                    </div>
                </div>
                <!-- CATEGORIA EVENTO -->
                <div class="row mb-3 justify-content-center">
                    <label for="categoria" class="col-form-label white">Categoría:</label>
                    <div class="col">
                        <select v-model="evento.categoria" class="form-control" id="categoria">
                            <option selected disabled>Escoge una categoría</option>
                            <option v-for="categoria in categorias" :key="categoria.nombre" :value="categoria.nombre">{{categoria.nombre}}</option>
                        </select>
                    </div>
                </div>
                <!--FECHA INICIO/FIN EVENTO-->
                <div class="row mb-3 justify-content-center">
                    <label for="fechaIni" class="col-form-label white">Fecha Inicio:</label>

                    <div class="col">
                        <input type="date" placeholder="Inicio del Evento" v-model="evento.fechaInicio" class="form-control">
                    </div>

                    <label for="fechaFin" class="col-form-label white">Fecha Fin:</label>

                    <div class="col">
                        <input type="date" placeholder="Fin del Evento" v-model="evento.fechaFin" class="form-control">

                    </div>
                </div>
                <!--HORA Y PRECIO EVENTO-->
                <div class="row mb-3">
                    <div class="col-6 form-group white">
                        Hora: <input type="time" placeholder="" v-model="evento.hora" class="form-control">

                    </div>
                    <div class="col-6 form-group white">
                        Precio: <input type="number" placeholder="" min=0 v-model="evento.precio" class="form-control">

                    </div>
                </div>
                <!--DIRECCION EVENTO-->
                <div class="row mb-3">
                    <label for="direccion" class="col-form-label white">Dirección:</label>

                    <div class="col">
                        <input type="text" placeholder="" v-model="evento.direccion" class="form-control">
                    </div>
                </div>
                <!--AFORO EVENTO-->
                <div class="row mb-3">
                    <label for="aforo" class="col-form-label white">Aforo:</label>

                    <div class="col">
                        <input type="text" placeholder="" v-model="evento.aforo" class="form-control">
                    </div>
                </div>
                <!--RECINTO EVENTO-->
                <div class="row mb-3">
                    <label for="recinto" class="col-form-label white">Recinto:</label>

                    <div class="col">
                        <input type="text" placeholder="" v-model="evento.recinto" class="form-control">
                    </div>
                </div>
                <!--LOCALIDAD EVENTO-->
                <div class="row mb-3">
                    <label for="localidad" class="col-form-label white">Localidad:</label>

                    <div class="col">
                        <input type="text" placeholder="" v-model="evento.localidad" class="form-control">
                    </div>
                </div>
                <!--BOTON ENVIAR EVENTO-->
                <div class="row mb-0">
                    <div class="d-grid gap-2 col-10 mx-auto" id="btn">
                        <button :disabled="!isValid" class="btn btn-primary mt-2 btn-lg btnPersonalizado" @click.prevent="createEvento(evento)">Crear Evento
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    name: "CreateEvento",
    props: {
        card: String

    },
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
            this.$store.dispatch('createEvento', evento);
            $(window).scrollTop(0,0);
        },
        tituloValido(texto) {
            const pattern = /[a-zA-Z0-9^]+/;
                return pattern.test(texto);
        },
        estaVacio(texto) {
            return texto == '';
        },
        parpadeo(componente) {
            $(`#${componente}`).fadeOut();
            $(`#${componente}`).fadeIn();
            $(`#${componente}`).fadeOut();
            $(`#${componente}`).fadeIn();
        },
        bordeRojo(componente) {
            $(`#${componente}`).css("border","2px solid red");
        }
    },
    computed: {
        ...mapGetters(['categorias']),
        isValid() {
            let b = true;
            let tituloBien = false;
            let descripcionBien = false;
            let categoriaBien = false;
            $("#titulo").css("border","none");
            $("#descripcion").css("border","none");
            $("#categoria").css("border","none");
            //TODO Hacer correspondientes validaciones
            // Validaciones JS

            // this.estaVacio(this.evento.titulo) ? b = false : this.tituloValido(this.evento.titulo) ? tituloBien = true : b = this.bordeRojo("titulo");

            if (this.estaVacio(this.evento.titulo)) {
                b = false
                this.bordeRojo("titulo");
            } else {
               if  (this.tituloValido(this.evento.titulo)) {
                    tituloBien = true;
                } else {
                    b = false;
                    this.bordeRojo("titulo");
                }
            }

            if (this.estaVacio(this.evento.descripcion)) {
                b = false;
                this.bordeRojo("descripcion");
            } else {
                descripcionBien = true;
            }

            if (this.estaVacio(this.evento.categoria)) {
                b = false;
                this.bordeRojo("categoria");
            } else {
                categoriaBien = true;
            }
            
            //Aquí cuando se pulse el botón y b sea false
                // if (!b) {
                //     console.log("Mikel es gay");
                //     $(window).scrollTop(0,0);
                //     if (!tituloBien) this.parpadeo("titulo");
                //     if (!descripcionBien) this.parpadeo("descripcion");
                //     if (!categoriaBien) this.parpadeo("categoria");
                // }
            return b;
        }
    },
    beforeMount() {
        this.$store.dispatch('fetchCategorias');
    }
}
</script>

<style scoped>

</style>
