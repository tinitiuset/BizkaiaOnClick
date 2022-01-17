<!--<template>
        <div class="embed-responsive embed-responsive-4by3 h-100 w-100">
            <video class="position-fixed" src="{{video}}" style="opacity:0.9" playsinline autoplay muted loop></video>
            <div class="position-relative top-50 text-center" style="z-index: 2;">
                <h1 class="text-white">mikel</h1>
                <a href="" class="text-white p-2 bg-success text-decoration-none">Comenzar</a>
            </div>
        </div>
</template>-->

<!-- <script>
// export default {
//     props: ["video"],
//     data: {
//             textos: ["Disfruta","Vive","Complacete"],
//             // texto: this.textos[contador],
//             texto: "hola",
//             contador:0,
//     },
//     methods: {
//         cambiarTexto() {

//             if (this.contador == textos.length-1) {
    
//                 this.contador = 0;
    
//             }
    
//             return this.textos[contador];            
    
//         }
//     },
//     mounted() {
//         // setInterval(cambiarTexto, 3000);
//         console.log("montado");
//     }

// } 
// </script> -->



<template>
  <p class="greeting">{{ greeting }}</p>
</template>

<script>
export default {
  data() {
    return {
      greeting: 'Hello World!'
    }
  }
}
</script>

<style>
.greeting {
  color: red;
  font-weight: bold;
}
</style>