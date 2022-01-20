<template>
    <div>
        <h2 class="text-center">Lista de Usuarios</h2>
        <table class="table table-ligh">
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
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: {id: product.id}}" class="btn btn-success">Editar</router-link>
                            <button class="btn btn-danger" @click="deleteProduct(user.id)">Borrar</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default{
       data(){
          return{users:[]}
        },
       created(){
            this.axios.get('http://localhost:8000/api/user/').then(response => {
                this.user = response.data;
             });
        },
       methods:{
           deleteProduct(id){
                this.axios.delete('http://localhost:8000/api/user/${id}').then(response =>{
                    let i=this.user.map(data=>data.id).indexOf(id);
                    this.user.splice(i, 1)
                });
            }
        }
    } 
</script>
