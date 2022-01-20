<template>
    <div>
        <h1 class="text center">Gestionar Usuarios</h1>
        <hr>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
            <th scope="col">Estado</th>
            
        </tr>
    </thead>
    <tbody>
        <tr v-for="us in usuarios" :key="us.id">
            <td scope="row">{{us.id}}</td>
            <td>{{us.usuario}}</td>
            <td>{{us.email}}</td>
            <td>{{us.tipo}}</td>
            <td>{{us.estado}}</td>
            
        </tr>
        
    </tbody>
</table>

    </div> 
</template>

<script>
export default {
    data() {
        return {
            usuarios:[],

        }
    },
    methods: {
      getUser(){
          let me = this;
          let url = '/user/'
          axios.get(url).then(function(response){

              me.arrayTasks = response.data;
          })

          .catch(function(error){

              console.log(error);
          });
        },

      mounted(){
          this.getUser();
      }
    
    }
}

</script>

<style>

</style>