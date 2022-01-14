import axios from "axios"

export default {
    data() {
        return {
            nuevaFoto: '',
            nombreEvento: ''
        }
    }, 
    methods: {
        crearNuevaFoto() {
            axios.post('/post',{foto: this.nuevaFoto, evento: this.nombreEvento})
            .then((response)=>{
                
            })
        }
    }
}