<template>
        <div class="position-fixed embed-responsive embed-responsive-4by3 h-100 w-100">
            <video autoplay muted loop id="myVideo" class="position-fixed end-0 bottom-0">
              <source src="/video/index.mp4" type="video/mp4">
              Your browser does not support HTML5 video.
            </video>
            <div class="position-fixed top-50 text-center w-100" style="z-index: 2;">
                <h1 class="text-white" id="textoCambiante">{{texto}}</h1>
                <a href="" class="text-white p-2 bg-success text-decoration-none">Comenzar</a>
            </div>
        </div>
</template>

<script>
export default {
    data() {
      return {
            textos: ["Disfruta","Vive","Complacete"],
            // texto: this.textos[this.contador],
            texto: "",
            contador:0,
      }
    }, created() {
      
          setInterval(() => {

            console.log("texto antes:"+this.texto);

            $("#textoCambiante").animate({opacity:"0"},2500);

            this.texto = this.textos[this.contador];

            if (this.contador == this.textos.length-1) {
    
              this.contador = 0;
    
            } else {

              this.contador++;

            }

            console.log("texto ahora:"+this.texto);

            $("#textoCambiante").animate({opacity:"1"},2500);

        }, 3000);

    }

} 
</script> 