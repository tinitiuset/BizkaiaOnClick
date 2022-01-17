<template>

    <footer class="footer mt-auto bg-dark">
        <div class="container">
          <!-- Copyright -->
          <div class="row pt-2 text-center text-white">
              <div class="col">
                © 2022 Todos los derechos reservados. <a class="text-white text-decoration-none" href="https://mdbootstrap.com/">BizkaiaOnClick.com</a>
              </div>
          </div>
          <div class="row pb-2 text-center text-light">
              <div class="col">
                Politica de privacidad | Términos de uso | Legalidad | <a class="text-white text-decoration-none" href="https://mdbootstrap.com/">Volver arriba</a>
              </div>
          </div>
          <!-- Copyright -->
        </div>

    </footer>

</template>

<script>

export default {

    data: {
            textos: ["Disfruta","Vive","Complacete"],
            // texto: this.textos[contador],
            texto: "hola",
            contador:0,
    },
    methods: {
        cambiarTexto() {

            if (this.contador == textos.length-1) {
    
                this.contador = 0;
    
            }
    
            return this.textos[contador];            
    
        }
    },
    mounted() {
        setInterval(cambiarTexto, 3000);
    },

    
}
</script>