
require('./bootstrap');

// window.CreateConnectionSocket = io(WS_URL);

window.Vue = require('vue');
window.VueSocketio = require('vue-socket.io');

Vue.component('chat', require('./components/Chat.vue'));

const app = new Vue({
    el: '#vue-app'
});

const EventBus = new Vue();
