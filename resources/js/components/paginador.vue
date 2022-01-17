<template>
    <div class="row text-center">
        <div class="w-50 m-auto g-0">
            <!-- {{contenido}} -->
        </div>
    </div>
</template>

<script>

export default {

  props: ["contenido"],
  mounted() {
    console.log("paginador cargado");
  }

    
}
</script>