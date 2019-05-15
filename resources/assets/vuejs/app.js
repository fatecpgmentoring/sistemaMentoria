/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.CreateConnectionSocket = io(WS_URL);

window.Vue = require('vue');
window.VueSocketio = require('vue-socket.io');

import Snotify from 'vue-snotify';

Vue.use(Snotify);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('consultant-list', require('./vuejsTarot/ConsultantList.vue').default);


const app = new Vue({
    el: '#vue-app'
});

const notifier = new Vue({
        el: '#global-notifier'
})
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))
