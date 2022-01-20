import Vue from 'vue'
import Vuex from 'vuex'
import eventos from './modules/eventos'
import usuarios from './modules/usuarios'

Vue.use(Vuex);

export default new Vuex.Store({
    modules:{
        eventos,
        usuarios
    }
})
