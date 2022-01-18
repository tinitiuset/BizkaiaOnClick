/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";

require('./bootstrap');

window.Vue = require('vue').default;

import indexVideo from './components/indexVideo.vue';
// import {createApp} from 'vue';

import menu from './components/menu.vue';
import footer from './components/footer.vue';

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

import store from './store/index'

Vue.component('eventos', require('./components/Eventos.vue').default)
Vue.component('createEvento', require('./components/CreateEvento.vue').default)

const app = new Vue({
    el: '#app',
    store,
    components: {

        "menujs":menu,
        "piedepagina":footer,

    }
});

const app = new Vue({
    el: '#index',
    components: {

        "indexVideo":indexVideo

    }
});
