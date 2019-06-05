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
        <ul class="row consultant-list" v-if="this.filteredMentorados.length > 0">
            <li class="col-lg-4 col-md-6 item" v-for="(mentorado, index) in mentorados" :key="index">
                <div class="wrap-card">
                    <div style="color: red; margin-top: 0px">&times</div>
                    <div class="cheader">
                        <h2 class="name">{{mentorado.nm_mentorado}}</h2>
                        <h3 class="specialization">
                            <div>
                                <div v-if="mentorado.ds_status == 1" style="color: green">
                                    Conexão {{status[mentorado.ds_status]}}
                                </div>
                                <div v-if="mentorado.ds_status == 0" style="color: #FF8C00">
                                    Conexão {{status[mentorado.ds_status]}}
                                </div>
                                <div v-if="mentorado.ds_status == 2" style="color: #FF0000">
                                    Conexão {{status[mentorado.ds_status]}}
                                </div>
                                <div v-else style="color: #000000">
                                    Conexão {{status[mentorado.ds_status]}}
                                </div>
                            </div>

                        </h3>

                        <div class="text-center">
                           Assunto: {{mentorado.nm_assunto}}
                        </div>
                    </div>
                    <div class="perfil-photo">
                        <figure>
                            <img :src="'/' + mentorado.ds_foto" alt="mentorado">
                        </figure>
                    </div>
                    <p class="description text-justify p-3 text-center">
                        Ate: {{mentorado.dt_fim}}
                    </p>
                    <div class="cfooter">
                        <div v-if="true"> <!-- Ter um v-if para ver se é chamar no chat ou, cancelar solicitação -->
                            <a :href="'/mentor/chat/' + mentorado.id_mentorado" class="btn">
                                <div class="spriting"></div>ver
                            </a>
                        </div>
                        <div v-else>
                            <a :href="'/mentor/chat/' + mentorado.id_mentorado" class="btn">
                                <div class="spriting"></div>chamar
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
        <div v-if="filteredMentorados.length == 0">
            <div class="col-12 h2-title center-sprite text-center">
                Não há mentorados
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['mentorados'],
        name: 'conexoes-mentorados',
        data() {
            return {
                page: 1,
                qtd: 0,
                search: "",
                filteredMentorados: this.mentorados,
                status: [
                    'Pendente',
                    'Ativa',
                    'Encerrada',
                    'Cancelada',
                    'Recusada'
                ]
            }
        },
        created() {
            axios.get('/mentoradosConectados')
                .then((data) => {
                    this.filteredMentorados = data.data.dados;
                    this.qtd = data.data.qtd;
                })
                .catch((e) => {
                    console.log('Erro ao carregar mentorados: ', e);
                });
        },
        methods: {
            changePage(data) {
                event.preventDefault();
                this.page = data;
                axios.get('/mentoradosConectados', {
                        params: {
                            page: this.page,
                            search: this.search
                        }
                    })
                    .then((data) => {
                        this.filteredMentorados = data.data.dados;
                        this.qtd = data.data.qtd;
                    })
                    .catch((e) => {
                        console.log('Erro ao carregar mentorados: ', e);
                    });
            },
            fsearch(data) {
                event.preventDefault();
                this.search = data;
                axios.get('/mentoradosConectados', {
                        params: {
                            page: this.page,
                            search: this.search
                        }
                    })
                    .then((data) => {
                        this.filteredMentorados = data.data.dados;
                        this.qtd = data.data.qtd;
                    })
                    .catch((e) => {
                        console.log('Erro ao carregar mentorados: ', e);
                    });
            },
        },
    }

</script>
