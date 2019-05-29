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
                                <div>
                                    Mentor
                                </div>
                            </div>

                        </h3>

                        <div class="text-center">
                            <div v-if="mentor.nv_conhecimento == 1">
                                menos de 1 ano de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 2">
                                de 1 a 3 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 3">
                                de 3 a 6 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 4">
                                6 a 10 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 5">
                                10 a 15 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 6">
                                15 a 20 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 7">
                                mais de 20 anos de experiência
                            </div>
                        </div>
                    </div>
                    <div class="perfil-photo">
                        <figure>
                            <img :src="'/' + mentor.ds_foto" alt="mentor">
                        </figure>
                    </div>
                    <p class="description text-justify p-3 text-center">
                        Nota: {{mentor.vl_nota}}
                    </p>
                    <div class="cfooter">
                        <div>
                            <a :href="'/show/mentor/' + mentor.id_mentor" class="btn">
                                <div class="spriting"></div>ver
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
        <div v-if="mentores.length == 0">
            <div class="col-12 h2-title center-sprite text-center">
                Não há mentores
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['mentores'],
        name: 'all-mentores',
        data() {
            return {
                page: 1,
                qtd: 0,
                search: "",
                filteredMentores: [],
            }
        },
        created() {
            axios.get('/mentoresListagemMentor')
                .then((data) => {
                    this.filteredMentores = data.data.dados;
                    this.qtd = data.data.qtd;
                })
                .catch((e) => {
                    console.log('Erro ao carregar mentores: ', e);
                });
        },
        methods: {
            changePage(data) {
                event.preventDefault();
                this.page = data;
                axios.get('/mentoresListagemMentor', {
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
                        console.log('Erro ao carregar mentores: ', e);
                    });
            },
            fsearch(data) {
                event.preventDefault();
                this.search = data;
                axios.get('/mentoresListagemMentor', {
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
                        console.log('Erro ao carregar mentores: ', e);
                    });
            },
        },
    }

</script>
