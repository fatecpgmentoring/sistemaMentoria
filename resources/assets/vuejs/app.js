/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "@babel/polyfill";

require('./bootstrap');
/*
window.CreateConnectionSocket = io(WS_URL);
*/
window.Vue = require('vue');
/*
window.VueSocketio = require('vue-socket.io');
*/
import Snotify from 'vue-snotify';
Vue.use(Snotify);

// Painel Site
import BestGradesMentores from './painel-site/BestGradesMentores.vue';
Vue.component('best-grades-mentores', BestGradesMentores);
import ShowMentor from './painel-site/ShowMentor.vue';
Vue.component('show-mentor', ShowMentor);
import AllMentores from './painel-site/AllMentores.vue';
Vue.component('all-mentores', AllMentores);
import ListarComentarios from './painel-site/ListarComentarios.vue';
Vue.component('listar-comentarios', ListarComentarios);

// Painel Mentor
import ConexoesMentorados from './painel-mentor/ConexoesMentorados.vue';
Vue.component('conexoes-mentorados', ConexoesMentorados);
import ChatMentor from './painel-mentor/ChatMentor.vue';
Vue.component('chat-mentor', ChatMentor);

// Painel Mentorado
import ConexoesMentores from './painel-mentorado/ConexoesMentores.vue';
Vue.component('conexoes-mentores', ConexoesMentores);
import ChatMentorado from './painel-mentorado/ChatMentorado.vue';
Vue.component('chat-mentorado', ChatMentorado);
import Mentores from './painel-mentorado/Mentores.vue';
Vue.component('mentores', Mentores);
import Modal from './painel-mentorado/Modal.vue';
Vue.component('modal', Modal);

const app = new Vue({
    el: '#vue-app'
});

const notifier = new Vue({
    el: '#global-notifier'
})
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))
