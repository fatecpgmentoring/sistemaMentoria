import "@babel/polyfill";

require('./bootstrap');

window.VueSocketio = require('vue-socket.io');
window.Vue = require('vue');
window.CreateConnectionSocket = io(WS_URL, {
    secure: true
});

//Gerais

import AdicionarAssuntos from './components-gerais/AdicionarAssuntos.vue';
Vue.component('adicionar-assuntos', AdicionarAssuntos);
import LoginCadastro from './components-gerais/LoginCadastro.vue';
Vue.component('login-cadastro', LoginCadastro);
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
import Contato from './painel-mentor/Contato.vue';
Vue.component('contato', Contato);

// Painel Mentorado
import ConexoesMentores from './painel-mentorado/ConexoesMentores.vue';
Vue.component('conexoes-mentores', ConexoesMentores);
import ChatMentorado from './painel-mentorado/ChatMentorado.vue';
Vue.component('chat-mentorado', ChatMentorado);
import Mentores from './painel-mentorado/Mentores.vue';
Vue.component('mentores', Mentores);

const app = new Vue({
    el: '#vue-app'
});
