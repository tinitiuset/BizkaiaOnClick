<!--<template>
        <a class="d-block h-100 w-100" href="">
            <video autoplay muted loop id="myVideo" class="position-fixed start-0 top-0 h-100">
              <source src="/video/index.mp4" type="video/mp4">
              Your browser does not support HTML5 video.
              <a href=""></a>
            </video>
            <div class="position-fixed top-50 text-center w-100" style="z-index: 2;">
                <h1 class="text-white fs-1" id="textoCambiante">{{texto}}</h1>
                <a href="http://google.com" class="text-dark border border-3  fw-bold border-dark p-2 bg-light text-decoration-none rounded">Comenzar</a>
            </div>
        </a>
</template>-->

<template>
  <div href="" class="d-block" id="contenedorVideo">
    <video autoplay loop preload id="myVideo" class="">
      <source src="/video/videoIndex.mp4" type="video/mp4">
      Tu navegador no soporta video en HTML5
      <a href=""></a>
    </video>
    <div class="contenido d-flex align-items-center">
      <div class="container text-center">
        <a href='/agenda' class="text-white text-decoration-none texto-degradado" id="textoCambiante">{{texto}}</a>
      </div>
      
    </div>
  </div>

</template>



<script>
export default {
    data() {
      return {
            textos: ["Disfruta","Vive","Emocionate","Diviertete","Descubre"],
            texto: "Bienvenido",
            contador:0,
      }
    }, created() {

          setInterval(() => {

            if (this.contador == this.textos.length) {
    
              this.contador = 0;
    
            }

            $("#textoCambiante").animate({opacity:"0"},5000, () => {
              
              this.texto = this.textos[this.contador];

              $("#textoCambiante").animate({opacity:"1"},5000);

              this.contador++;

          });


        }, 2500);

    }

} 
</script> 