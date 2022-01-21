// Initial State
const state = () => ({
    categorias: [],
    categoria : []
})

// Getters

const getters = {
    categorias: state => {
        return state.categorias
    },
    categoria: state => {
        return state.categoria
    }
}

// Actions
let actions = {
    createCategoria({commit}, categoria) {
        axios.post('/api/categorias', categoria)
            .then(res => {
                console.log("Called CREATE")
                commit('CREATE_CATEGORIA', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchCategoria({commit}, id) {
        axios.get(`/api/categorias/${id}`)
            .then(res => {
                console.log("Called GET")
                commit('FETCH_CATEGORIA', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchCategorias({commit}) {
        axios.get('/api/categorias')
            .then(res => {
                console.log("Called GET ALL")
                commit('FETCH_CATEGORIAS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteCategoria({commit}, categoria) {
        axios.delete(`/api/categorias/${categoria.nombre}`)
            .then(res => {
                console.log("Called DELETE")
                if (res.data === 'ok')
                    commit('DELETE_CATEGORIA', categoria)
            }).catch(err => {
            console.log(err)
        })
    }
}

// Mutations

const mutations = {
    CREATE_CATEGORIA(state, categoria) {
        state.categorias.unshift(categoria)
    },
    FETCH_CATEGORIA(state, categoria) {
        return state.categoria = categoria
    },
    FETCH_CATEGORIAS(state, categorias) {
        return state.categorias = categorias
    },
    DELETE_CATEGORIA(state, categoria) {
        let index = state.categorias.findIndex(item => item.id === categoria.id)
        state.categorias.splice(index, 1)
    }

}

// Exports

export default {
    state,
    getters,
    actions,
    mutations
}
