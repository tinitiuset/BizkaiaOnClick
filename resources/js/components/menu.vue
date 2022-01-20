<template>
  <nav class="navbar navbar-expand-lg navbar-color p-0">
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
      <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <div>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-3">
            <li class="nav-item text-center">
              <a class="nav-link active text-white texto-degradado text-center" aria-current="page" href="/">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white texto-degradado text-center" href="/agenda">Agenda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white texto-degradado text-center" href="#">Envía tus eventos</a>
            </li>
          </ul>
        </div>
        <div>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-3" v-if="usuario == null">
            <li class="nav-item text-center">
              <a class="nav-link active text-white texto-degradado text-center texto-degradado" aria-current="page" href="/login">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white texto-degradado text-center" href="/register">Registrar</a>
            </li>
          </ul>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-3" v-else>

            <li class="nav-item" v-if="tipo != null">
              <a class="nav-link text-white text-center" title="Panel de administracion"  href="/register"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal iconoMenu" viewBox="0 0 16 16">
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
              </svg>
              <span class="textoOpcion">Administracion</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white texto-degradado text-center" title="Editar perfil" href="/register"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle iconoMenu" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
              <span class="textoOpcion">Editar perfil</span></a>
            </li>
            <li class="nav-item text-center">
              <a class="nav-link active text-white texto-degradado text-center texto-degradado" title="Cerrar sesion" aria-current="page" @click.prevent="cerrarSesion()" href="">
              
              <form action="/logout" method="post" id="logout-form" class="d-none"> 
                <!-- {{csrf}} -->
                <input type="hidden" name="_token" :value="csrf">
              </form>
              
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-door-open iconoMenu" viewBox="0 0 16 16">
                <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
              </svg>
              <span class="textoOpcion">Cerrar sesion</span></a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </nav>

</template>

<script>

export default {

  props: {

    usuario: String,
    tipo: String,

  },
  data() {

    return {

      csrf: document.head.querySelector('meta[name="csrf-token"]') ? document.head.querySelector('meta[name="csrf-token"]').content : ''

    }

  },
  methods: {

      cerrarSesion() {

        document.getElementById('logout-form').submit();

      }, abrirMenu() { 

        if ($("#logo").css("display") != "none") {
                    
          $("#logo").hide();
          $("#menuHamburguesa").hide();
          $("#cerrarMenu").removeClass("d-none");
          // $("#cerrarMenu").show();
          $("#contenedorMenu").addClass("justify-content-center");
          $(".textoOpcion").addClass("d-none");
          $(".iconoMenu").removeClass("d-none");

        } else {

          $("#logo").show();
          $("#menuHamburguesa").show();
          $("#cerrarMenu").addClass("d-none");
          // $("#cerrarMenu").hide();
          $("#contenedorMenu").removeClass("justify-content-center");
          $(".textoOpcion").removeClass("d-none");
          $(".iconoMenu").addClass("d-none");

        }

      }

  },
  mounted() {
    console.log("menu cargado");
  }

    
}
</script>