import Vue from 'vue'
import Vuex from 'vuex'
import eventos from './modules/eventos'

Vue.use(Vuex);

export default new Vuex.Store({
    modules:{
        eventos
    }
})
