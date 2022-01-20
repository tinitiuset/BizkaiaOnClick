/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import App from './App.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import {
    routes
} from '.routes';

import Vue from "vue";
import indexVideo from './components/indexVideo.vue';
// import {createApp} from 'vue';
import menu from './components/menu.vue';
import footer from './components/footer.vue';
import store from './store';

import createFoto from './components/CreateFoto.vue';

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('eventos', require('./components/Eventos.vue').default);
Vue.component('createEvento', require('./components/CreateEvento.vue').default);
Vue.component('evento', require('./components/Evento.vue').default);
// Vue.component('indexvideo', require('./components/indexVideo.vue').default);
Vue.component('usuario', require('./components/Usuario.vue').default);

// Vue.component('createFoto', require('./components/CreateFoto.vue').default);

// const app = new Vue({
//     el: '#app',
//     store,
//     components: {

//      "menujs": menu,
//      "piedepagina": footer,

//      }
//  });



/*const createFoto = new Vue({
    el: '#createFoto',
    components: {
        "createFoto": createFoto
    }
});*/

// const index = new Vue({
//     el: '#index',
//     components: {

//         "indexvideo":indexVideo

//     }
// });
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const agenda = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
    store,
    components: {

        "indexvideo":indexVideo,
        "menuusuario":menu
        
    }
});

