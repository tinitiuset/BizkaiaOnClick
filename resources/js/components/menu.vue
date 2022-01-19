<template>
  <nav class="navbar navbar-expand-lg navbar-color">
    <div class="container-fluid">
      <button class="navbar-toggler" id="navbar-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" @click="abrirMenu">
        <i class="fas fa-bars fa-2x"></i>
      </button>
      <a class="navbar-brand" id="logo" href="/">
        <img class="logo-movil" src="/img/LogoColor_e.png'">
        <!--{{ config('app.name', 'Laravel') }}-->
      </a>
      <!-- <a class="" id="iconoUsuario" href="#"><img src="/img/usuario.png" alt="" class="img-fluid d-block h-50 w-50"></a> -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item text-center fs-1">
            <a class="nav-link active text-white text-center" aria-current="page" href="/">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white text-center fs-1" href="#">Agenda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white text-center fs-1" href="#">Envía tus eventos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</nav>
</template>

<script>

export default {

  methods: {

      abrirMenu() { 

        if ($("#logo").css("display") != "none") {
          
          $("#logo").hide();

        } else {

          $("#logo").show();

        }



      }

  },
  mounted() {
    console.log("menu cargado");
  }

    
}
</script>