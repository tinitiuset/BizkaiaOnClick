// Initial State
const state = () => ({
    usuarios: [],
    usuario : []
})

// Getters

const getters = {
    usuarios: state => {
        return state.usuarios
    },
    usuario: state => {
        return state.usuario
    }
}

// Actions
let actions = {
    createUsuario({commit}, usuario) {
        axios.post('/api/usuarios', usuario)
            .then(res => {
                console.log("Called CREATE")
                commit('CREATE_USUARIO', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchUsuario({commit}, id) {
        axios.get(`/api/usuarios/${id}`)
            .then(res => {
                console.log("Called GET")
                commit('FETCH_USUARIO', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchUsuarios({commit}) {
        axios.get('/api/usuarios')
            .then(res => {
                console.log("Called GET ALL")
                commit('FETCH_USUARIOS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteUsuario({commit}, usuario) {
        axios.delete(`/api/usuarios/${usuario.id}`)
            .then(res => {
                console.log("Called DELETE")
                if (res.data === 'ok')
                    commit('DELETE_USUARIO', usuario)
            }).catch(err => {
            console.log(err)
        })
    }
}

// Mutations

const mutations = {
    CREATE_USUARIO(state, usuario) {
        state.usuarios.unshift(usuario)
    },
    FETCH_USUARIO(state, usuario) {
        return state.usuario = usuario
    },
    FETCH_USUARIOS(state, usuarios) {
        return state.usuarios = usuarios
    },
    DELETE_USUARIO(state, usuario) {
        let index = state.usuarios.findIndex(item => item.id === usuario.id)
        state.usuarios.splice(index, 1)
    }

}

// Exports

export default {
    state,
    getters,
    actions,
    mutations
}
