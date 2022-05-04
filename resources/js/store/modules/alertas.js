// Initial State
const state = () => ({
    alertas: [],
    alerta : []
})

// Getters

const getters = {
    alertas: state => {
        return state.alertas
    },
    alerta: state => {
        return state.alerta
    }
}

// Actions
let actions = {
    createAlerta({commit}, alerta) {
        axios.post('/api/alertas', alerta)
            .then(res => {
                console.log("Called CREATE")
                commit('CREATE_ALERTA', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchAlerta({commit}, id) {
        axios.get(`/api/alertas/${id}`)
            .then(res => {
                console.log("Called GET")
                commit('FETCH_ALERTA', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchAlertas({commit}) {
        axios.get('/api/alertas')
            .then(res => {
                console.log("Called GET ALL")
                console.log(res.data)
                commit('FETCH_ALERTAS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteAlerta({commit}, alerta) {
        axios.delete(`/api/alertas/${alerta.categoria}`)
            .then(res => {
                console.log("Called DELETE")
                if (res.data === 'ok')
                    commit('DELETE_ALERTA', alerta)
            }).catch(err => {
            console.log(err)
        })
    }
}

// Mutations

const mutations = {
    CREATE_ALERTA(state, alerta) {
        state.alertas.unshift(alerta)
    },
    FETCH_ALERTA(state, alerta) {
        return state.alerta = alerta
    },
    FETCH_ALERTAS(state, alertas) {
        return state.alertas = alertas
    },
    DELETE_ALERTA(state, alerta) {
        let index = state.alertas.findIndex(item => item.id === alerta.id)
        state.alertas.splice(index, 1)
    }

}

// Exports

export default {
    state,
    getters,
    actions,
    mutations
}
