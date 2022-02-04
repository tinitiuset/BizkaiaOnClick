import Vue from 'vue'
import Vuex from 'vuex'

import eventos from './modules/eventos'
import usuarios from './modules/usuarios'
import categorias from './modules/categorias'

Vue.use(Vuex);

export default new Vuex.Store({
    modules:{
        eventos,
        usuarios,
        categorias
    }
})
