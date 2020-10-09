/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { routes } from './routes';
import VueRouter from 'vue-router';
import { store } from './store/store';

window.Vue = require('vue');

Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});

Vue.prototype.csrf = window.csrf;
Vue.prototype.app_url = window.app_url;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: store,
    router
});
