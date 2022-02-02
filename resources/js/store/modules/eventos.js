// Initial State
const state = () => ({
    eventos: [],
    mensaje: [],
    evento : []
})

// Getters

const getters = {
    eventos: state => {
        return state.eventos
    },
    evento: state => {
        return state.evento
    },
    mensaje: state => {
        return state.mensaje
    }
}

// Actions
let actions = {
    createEvento({commit}, evento) {
        axios.post('/api/eventos', evento)
            .then(res => {
                console.log("Called CREATE")
                // console.log(res.data)
                commit('CREATE_EVENTO', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchEvento({commit}, id) {
        axios.get(`/api/eventos/${id}`)
            .then(res => {
                console.log("Called GET")
                commit('FETCH_EVENTO', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchEventos({commit}) {
        axios.get('/api/eventos')
            .then(res => {
                console.log("Called GET ALL")
                commit('FETCH_EVENTOS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteEvento({commit}, evento) {
        axios.delete(`/api/eventos/${evento.id}`)
            .then(res => {
                console.log("Called DELETE")
                if (res.data === 'ok')
                    commit('DELETE_EVENTO', evento)
            }).catch(err => {
            console.log(err)
        })
    }
}

// Mutations

const mutations = {
    CREATE_EVENTO(state, mensaje) {
        // state.eventos.unshift(evento)
        // return state.mensaje = mensaje
        return state.mensaje = mensaje
    },
    FETCH_EVENTO(state, evento) {
        return state.evento = evento
    },
    FETCH_EVENTOS(state, eventos) {
        return state.eventos = eventos
    },
    DELETE_EVENTO(state, evento) {
        let index = state.eventos.findIndex(item => item.id === evento.id)
        state.eventos.splice(index, 1)
    }

}

// Exports

export default {
    state,
    getters,
    actions,
    mutations
}
