<!-- Limitar a 6 por pagina -->
<template>
    <div>
        <div class="search-wrap">
            <form>
                <div class="wrap-input">
                    <input type="text" id="search" v-model="search" placeholder="Buscar" name="termo">
                    <button type="submit" @click="fsearch(search)">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
        <ul class="row consultant-list" v-if="this.filteredMentores.length > 0">
            <li class="col-lg-4 col-md-6 item" v-for="(mentor, index) in mentores" :key="index">
                <div class="wrap-card">
                    <div class="cheader">
                        <h2 class="name">{{mentor.nm_mentor}}</h2>
                        <h3 class="specialization">
                            <div>
                                <div v-if="mentor.ds_status == 1" style="color: green">
                                    Conexão {{status[mentor.ds_status]}}
                                </div>
                                <div v-else-if="mentor.ds_status == 0" style="color: #FF8C00">
                                    Conexão {{status[mentor.ds_status]}}
                                </div>
                                <div v-else-if="mentor.ds_status == 2" style="color: #FF0000">
                                    Conexão {{status[mentor.ds_status]}}
                                </div>
                            </div>

                        </h3>

                        <div class="text-center">
                          Assunto: {{mentor.nm_assunto}}
                        </div>
                    </div>
                    <div class="perfil-photo">
                        <figure>
                            <img :src="'/' + mentor.ds_foto" alt="mentor">
                        </figure>
                    </div>
                    <p class="description text-justify p-3 text-center" v-if="mentor.dt_fim != null">
                        Ate: {{mentor.dt_fim}}
                    </p>
                     <p class="description text-justify p-3 text-center" v-else></p>
                    <div class="cfooter">
                        <div v-if="mentor.ds_status == 0"> <!-- Ter um v-if para ver se é chamar no chat ou, cancelar solicitação -->
                            <a href="" @click="cancelarMentor(mentor.id_conexao)" class="btn" style="background-color: #FFD700">
                                <span class="fa fa-times fa-lg"></span>&nbsp cancelar
                            </a>
                        </div>
                        <div v-else-if="mentor.ds_status == 1"> <!-- Ter um v-if para ver se é chamar no chat ou, cancelar solicitação -->
                            <a :href="'/mentorado/chat/'+mentor.id_conexao" class="btn">
                                <span class="fa fa-comments fa-lg"></span>&nbsp chamar
                            </a>
                        </div>
                        <div v-else> <!-- Ter um v-if para ver se é chamar no chat ou, cancelar solicitação -->
                            <a href="" @click="solicitarAgain(mentor.id_conexao)" class="btn">
                                <span class="fa fa-reply fa-lg"></span>&nbsp resolicitar
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div id="paginator">
            <ul>
                <div v-if="page == 1">
                    <li class="prev disabled"><a href="" @click="changePage(page-1)">Anterior</a></li>
                </div>
                <div v-else>
                    <li class="prev"><a href="" @click="changePage(page-1)">Anterior</a></li>
                </div>
                &nbsp &nbsp
                <div v-for="n in qtd">
                    <div v-if="page == n">
                        <li class="active">
                            <a href="" @click="changePage(n)">
                                {{n}}
                            </a>
                        </li>
                    </div>
                    <div v-else>
                        <li>
                            <a href="" @click="changePage(n)">
                                {{n}}
                            </a>
                        </li>
                    </div>
                </div>
                &nbsp &nbsp
                <div v-if="page == qtd">
                    <li class="next disabled"><a href="" @click="changePage(page+1)">Proximo</a></li>
                </div>
                <div v-else>
                    <li class="next"><a href="" @click="changePage(page+1)">Proximo</a></li>
                </div>
            </ul>
        </div>
        <div v-if="filteredMentores.length == 0">
            <div class="col-12 h2-title center-sprite text-center">
                Não há mentores
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['mentores', 'quantidade'],
        name: 'conexoes-mentores',
        data() {
            return {
                page: 1,
                qtd: this.quantidade,
                search: "",
                filteredMentores: this.mentores,
                status: [
                    'Pendente',
                    'Ativa',
                    'Encerrada',
                    'Cancelada',
                    'Recusada'
                ],
            }
        },
        created() {
            axios.get('/mentoresConectados')
                .then((data) => {
                    this.filteredMentores = data.data.dados;
                    this.qtd = data.data.qtd;
                })
                .catch((e) => {
                    console.log('Erro ao carregar mentores created: ', e);
                });
        },
        mounted() {
            var token = document.head.querySelector('meta[name="csrf-token"]');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        },
        methods: {
            changePage(data) {
                event.preventDefault();
                this.page = data;
                axios.get('/mentoresConectados', {
                        params: {
                            page: this.page,
                            search: this.search
                        }
                    })
                    .then((data) => {
                        this.filteredMentores = data.data.dados;
                        this.qtd = data.data.qtd;
                    })
                    .catch((e) => {
                        console.log('Erro ao carregar mentores changePage: ', e);
                    });
            },
            fsearch(data) {
                event.preventDefault();
                this.search = data;
                axios.get('/mentoresConectados', {
                        params: {
                            page: this.page,
                            search: this.search
                        }
                    })
                    .then((data) => {
                        this.filteredMentores = data.data.dados;
                        this.qtd = data.data.qtd;
                    })
                    .catch((e) => {
                        console.log('Erro ao carregar mentores fsearch: ', e);
                    });
            },
            cancelarMentor(idConexao){
                event.preventDefault();
                  axios.get('/mentorado/conexao/cancelar', {
                        params: {
                            conexao: idConexao,
                        }
                    })
                    .then((data) => {
                        this.changePage(this.page);
                    })
                    .catch((e) => {
                        console.log('Erro ao cancelar solicitação: ', e);
                    });
            },
            solicitarAgain(idConexao)
            {
                event.preventDefault();
                  axios.get('/mentorado/resolicitar', {
                        params: {
                            conexao: idConexao,
                        }
                    })
                    .then((data) => {
                        this.changePage(this.page);
                    })
                    .catch((e) => {
                        console.log('Erro ao solicitar novamente conexão: ', e);
                    });
            }
        },
    }

</script>
