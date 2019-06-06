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
                           Conhecimento: {{dic[mentor.nv_conhecimento-1]}}
                        </div>
                    </div>
                    <div class="perfil-photo">
                        <figure>
                            <img :src="'/' + mentor.ds_foto" alt="mentor">
                        </figure>
                    </div>
                    <p class="description text-justify p-3 text-center estrelas">
                        Nota:
                        <input type="radio" :id="'cm_star-empty-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 0"/>
                        <label :for="'cm_star-1-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-1-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="1" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 1" disabled/>
                        <label :for="'cm_star-2-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-2-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="2" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 2" disabled/>
                        <label :for="'cm_star-3-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-3-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="3" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 3" disabled/>
                        <label :for="'cm_star-4-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-4-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="4" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 4" disabled/>
                        <label :for="'cm_star-5-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-5-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="5" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 5" disabled/>
                        <label :for="'cm_star-6-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-6-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="6" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 6" disabled/>
                        <label :for="'cm_star-7-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-7-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="7" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 7" disabled/>
                        <label :for="'cm_star-8-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-8-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="8" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 8" disabled/>
                        <label :for="'cm_star-9-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-9-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="9" :checked="parseInt(mentor.vl_nota.toFixed(0)) == 9" disabled/>
                        <label :for="'cm_star-10-' + mentor.id_mentor"><i class="fa"></i></label>
                        <input type="radio" :id="'cm_star-10-' + mentor.id_mentor" :name="'fb-' + mentor.id_mentor" value="10":checked="parseInt(mentor.vl_nota.toFixed(0)) == 10" disabled/>
                    </p>
                    <div class="cfooter">
                        <div>
                            <a :href="'/show/mentor/' + mentor.id_mentor" class="btn">
                                <div class="spriting"></div>conectar
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
        props: ['mentores'],
        name: 'all-mentores',
        data() {
            return {
                page: 1,
                qtd: 0,
                search: "",
                filteredMentores: this.mentores,
                dic: [
                'menos de 1 ano de experiência',
                'entre 1 e 3 anos de experiência',
                'entre 3 e 6 anos de experiência',
                'entre 6 e 10 anos de experiência',
                'entre 10 e 15 anos de experiência',
                'entre 15 e 20 anos de experiência',
                'mais de 20 anos de experiência'],
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
