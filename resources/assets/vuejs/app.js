/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
/*
window.CreateConnectionSocket = io(WS_URL);
*/
window.Vue = require('vue');
/*
window.VueSocketio = require('vue-socket.io');
*/
import Snotify from 'vue-snotify';

import ConexoesMentorados from './painel-mentor/ConexoesMentorados.vue';
import BestGradesMentores from './painel-site/BestGradesMentores.vue';
import ShowMentor from './painel-site/ShowMentor.vue';
import AllMentores from './painel-site/AllMentores.vue';

Vue.use(Snotify);
/*
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/* Painel-Mentor */
Vue.component('chat-mentor', require('./painel-mentor/ChatMentor.vue').default);
Vue.component('conexoes-mentorados', require('./painel-mentor/ConexoesMentorados.vue').default);
Vue.component('listar-comentarios', require('./painel-mentor/ListarComentarios.vue').default);

/* Painel-Mentorado */
Vue.component('chat-mentorado', require('./painel-mentorado/ChatMentorado.vue').default);
Vue.component('conexoes-mentores', require('./painel-mentorado/ConexoesMentores.vue').default);
Vue.component('mentores', require('./painel-mentorado/Mentores.vue').default);

/* Painel-Site */
Vue.component('all-mentores', require('./painel-site/AllMentores.vue').default);


const app = new Vue({
    el: '#vue-app',
    components: {
    	BestGradesMentores,
        ConexoesMentorados,
        ShowMentor,
        AllMentores
    }
});

const notifier = new Vue({
    el: '#global-notifier'
})
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))
