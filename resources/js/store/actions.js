let actions = {
    createEvento({commit}, evento) {
        axios.post('/api/eventos', evento)
            .then(res => {
                commit('CREATE_EVENTO', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchEventos({commit}) {
        axios.get('/api/eventos')
            .then(res => {
                commit('FETCH_EVENTOS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteEvento({commit}, evento) {
        axios.delete(`/api/eventos/${evento.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_EVENTO', evento)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions
