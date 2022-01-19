<template>
  <nav class="navbar navbar-expand-lg navbar-color">
    <div class="container-fluid" id="contenedorMenu">
      <button class="navbar-toggler" id="navbar-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" @click="abrirMenu">
        <i class="fas fa-bars fa-2x" id="menuHamburguesa"></i>
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-x d-none" id="cerrarMenu" viewBox="0 0 16 16">
          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
      </button>
      <a class="navbar-brand" id="logo" href="/">
        <img class="logo-movil" src="/img/logoColor.png">
        <!--{{ config('app.name', 'Laravel') }}-->
      </a>
      <!-- <a class="" id="iconoUsuario" href="#"><img src="/img/usuario.png" alt="" class="img-fluid d-block h-50 w-50"></a> -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div>
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
        <div>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item text-center fs-1">
              <a class="nav-link active text-white text-center" aria-current="page" href="/">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white text-center fs-1" href="#">Registrar</a>
            </li>
          </ul>
        </div>

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
          $("#menuHamburguesa").hide();
          $("#cerrarMenu").removeClass("d-none");
          // $("#cerrarMenu").show();
          $("#contenedorMenu").addClass("justify-content-center");

        } else {

          $("#logo").show();
          $("#menuHamburguesa").show();
          $("#cerrarMenu").addClass("d-none");
          // $("#cerrarMenu").hide();
          $("#contenedorMenu").removeClass("justify-content-center");

        }

      }

  },
  mounted() {
    console.log("menu cargado");
  }

    
}
</script>