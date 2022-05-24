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
    createAlerta({commit, state}, alerta) {
        console.log(alerta)
        axios.post('/alertas', alerta)
            .then(res => {
                console.log("Called CREATE")
                console.log(res.data)
                commit('CREATE_ALERTA', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchAlerta({commit}, id) {
        axios.get(`/alertas/${id}`)
            .then(res => {
                console.log("Called GET")
                commit('FETCH_ALERTA', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchAlertas({commit}) {
        axios.get('/alertas')
            .then(res => {
                console.log("Called GET ALL")
                console.log(res.data)
                commit('FETCH_ALERTAS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteAlerta({commit, state}, alerta) {
        axios.delete(`/alertas/${alerta}`)
            .then(res => {
                console.log("Called DELETE")
                console.log(res.data)
                if (res.data === 'eliminada')
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
        console.log(state.alertas)
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
