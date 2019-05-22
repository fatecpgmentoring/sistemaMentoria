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

/* Painel-Mentor */
Vue.component('chat-mentor', require('./painel-mentor/ChatMentor.vue').default);
Vue.component('conexoes-mentorados', require('./painel-mentor/ConexoesMentorados.vue').default);
Vue.component('listar-comentarios', require('./painel-mentor/ListarComentarios.vue').default);
Vue.component('listar-conteudo', require('./painel-mentor/ListarConteudo.vue').default);

/* Painel-Mentorado */
Vue.component('chat-mentorado', require('./painel-mentorado/ChatMentorado.vue').default);
Vue.component('conexoes-mentores', require('./painel-mentorado/ConexoesMentores.vue').default);
Vue.component('listar-conteudo', require('./painel-mentorado/ListarConteudo.vue').default);
Vue.component('mentores', require('./painel-mentorado/Mentores.vue').default);

/* Painel-Site */
Vue.component('all-mentores', require('./painel-site/AllMentores.vue').default);
Vue.component('best-grades-mentores', require('./painel-site/BestGradesMentores.vue').default);


const app = new Vue({
    el: '#vue-app'
});

const notifier = new Vue({
        el: '#global-notifier'
})
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))
