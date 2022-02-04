import axios from "axios";

// Initial State
const state = () => ({
    fotos: [],
    foto: []
});

// Getters

const getters = {
    fotos: state => {
        return state.fotos;
    },
    foto: state => {
        return state.foto;
    }
 }

 // Actions
 let actions = {
     createFoto({commit},foto)  {
        axios.post('/api/fotos',foto)
        .then(res => {
            consoler.log('Called CREATE');
            commit('CREATE_FOTO', res.data);
        }).catch(err => {
            console.log(err);
        });
    },
     fetchFoto({commit}, id) {
        axios.get(`/api/fotos/${id}`)
        .then(res => {
        console.log('Called GET');
        commit('FETCH_EVENTO', res.data);
        }).catch(err => {
        console.log(err);
        });
    },
     fetchFotos({commit}) {
        axios.get('/api/fotos')
        .then(res => {
        console.log('CALLED GET ALL');
        commit('FETCH_FOTOS',res.data);
        }).catch(err => {
            console.log(err);
        });
    }
 }

 // Mutations
 const mutations = {
    CREATE_FOTO(state,foto) {
        state.foto.unshift(foto);
    },
    FETCH_FOTO(state,foto) {
        return state.foto = foto;
    },
    FETCH_FOTOS(state, fotos) {
        return state.fotos = fotos;
    }
 }

 // Exports

 export default {
    state,
    getters,
    actions,
    mutations
 }