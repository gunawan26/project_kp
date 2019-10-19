/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap';
import Vue from 'vue';
import Vuetify from 'vuetify';
import VueAxios from 'vue-axios';
import store from '@/js/state/store'
import 'vuetify/dist/vuetify.min.css';

import Notifications from 'vue-notification'
import Routes from '@/js/routes.js';

import App from '@/js/views/App';
import Axios from 'axios';

import {
    setup
} from '@/js/helpers/interceptors.js';

window.Vuetify = require('vuetify');





Vue.use(Vuetify);
Vue.use(VueAxios, Axios);
Vue.use(Notifications);

Vue.use({
    install(Vue) {
        Vue.prototype.$authAPI = Axios.create()
    }
})

setup(Vue.prototype.$authAPI)

const vuetifyOptions = {
    icons: {
        iconfont: 'mdi',
    },
}
const app = new Vue({
    el: '#app',
    router: Routes,
    store,
    vuetify: new Vuetify(vuetifyOptions),
    render: h => h(App),
})



export default app;

// window.Vue = require('vue');

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i);
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app',
// });
