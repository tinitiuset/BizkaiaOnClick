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
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
				
				<!--Boton-->
				<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#mimenu">
				<span class="navbar-toggler-icon"></span>
				</button>
				<!--Lista de los link de navegacion-->
				<div class="collapse navbar-collapse" id="mimenu">
				<ul class="navbar-nav">
					<li class="nav-item">
					<!--Link activo (pestaña actual)-->
					<a class=" nav-link active" href="#">Temario</a>
					</li>
					<li class="nav-item">
					<a class=" nav-link" href="#">Objetivos</a>
					</li>
					<li class="nav-item">
					<a class=" nav-link" href="#">Requisito</a>
					</li>
					<li class="nav-item">
						<!--Link deshabilitado-->
					<a class=" nav-link" href="#">Precio</a>
					</li>
				</ul>
				</div>
        <!--Logo, para poner una imagen-->
				<a class="navbar-brand" href="#">
					<img class="rounded-circle" id="logo" src="img/gato.jpg" alt="gato">
				</a>
				<!--Formulario de busqueda-->
				<form class="form-inline" action="#">
					<input class="form-control mr-sm-2" type="text" placeholder="buscar">
						<button class="btn btn-success" type="submit">Buscar</button>
				</form>
			</nav>
</template>

<script>

export default {

  mounted() {
    console.log("menu cargado");
  }

    
}
</script>