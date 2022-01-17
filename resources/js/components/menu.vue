<template>
    <!-- <nav class="container-fluid bg-dark sticky-top">
        <div class="row align-items-center">
          <div class="col-2">
            <img src="/img/menuHamburguesa.png" class="img-fluid text-center">
          </div>
          <div class="col-8 text-white">
            aeaea
          </div>
          <div class="col-2">
            <img src="/img/usuario.png" class="img-fluid text-center">
          </div>
        </div>
    </nav> -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand p-0 m-0" href="#">Navbar</a>
    <a class="" href="#"><img src="/img/usuario.png" alt="" class="img-fluid d-block h-50 w-50"></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item text-center">
          <a class="nav-link active text-white text-center" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white text-center" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled text-white text-center" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
    

  </div>
</nav>
</template>

<script>

export default {

  mounted() {
    console.log("menu cargado");
  }

    
}
</script>