let mutations = {
    CREATE_EVENTO(state, evento) {
        state.eventos.unshift(evento)
    },
    FETCH_EVENTOS(state, eventos) {
        return state.eventos = eventos
    },
    DELETE_EVENTO(state, evento) {
        let index = state.eventos.findIndex(item => item.id === evento.id)
        state.eventos.splice(index, 1)
    }

}
export default mutations
