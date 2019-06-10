<template>
    <div id="consultants-show">
        <div class="evaluation-content">
            <div class="container">
                <h2>O que disseram</h2>
                <ul class="rate-list">
                    <li v-for="(comentario, index) in filteredComentarios" :key="index">
                        <div class="wrap-rating estrelas">
                            <input type="radio" :id="'cm_star-empty-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 0"/>
                            <label :for="'cm_star-1-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-1-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="1" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 1" disabled/>
                            <label :for="'cm_star-2-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-2-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="2" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 2" disabled/>
                            <label :for="'cm_star-3-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-3-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="3" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 3" disabled/>
                            <label :for="'cm_star-4-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-4-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="4" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 4" disabled/>
                            <label :for="'cm_star-5-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-5-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="5" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 5" disabled/>
                            <label :for="'cm_star-6-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-6-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="6" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 6" disabled/>
                            <label :for="'cm_star-7-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-7-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="7" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 7" disabled/>
                            <label :for="'cm_star-8-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-8-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="8" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 8" disabled/>
                            <label :for="'cm_star-9-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-9-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="9" :checked="parseInt(comentario.vl_nota.toFixed(0)) == 9" disabled/>
                            <label :for="'cm_star-10-' + comentario.id_comentario"><i class="fa"></i></label>
                            <input type="radio" :id="'cm_star-10-' + comentario.id_comentario" :name="'fb-' + comentario.id_comentario" value="10":checked="parseInt(comentario.vl_nota.toFixed(0)) == 10" disabled/>
                        </div>

                        <div class="title-wrap">
                            <img :src="'/' + comentario.ds_foto" height="50" width="50" style="padding-right: 4px">
                            <h3>{{comentario.nm_mentorado}}</h3>
                            <span class="date">{{comentario.criado_em}}</span>
                        </div>

                        <p>
                            {{comentario.ds_comentario}}
                        </p>
                    </li>
                </ul>
                <!-- Pagination -->
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
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['comentarios', 'quantidade'],
        name: 'listar-comentarios',
        data() {
            return {
                qtd: this.quantidade,
                page: 1,
                filteredComentarios: this.comentarios,
            }
        },
        created(){
            axios.post('/comentarioAray', {
                params: {
                    page: this.page
                }
            })
            .then((data) => {
                this.filteredComentarios = data.data.dados;
                this.qtd = data.data.qtd;
            })
            .catch((e) => {
                console.log('Erro ao carregar comentarios: ', e);
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
                axios.post('/comentarioAray', {
                        params: {
                            page: this.page
                        }
                    })
                    .then((data) => {
                        this.filteredComentarios = data.data.dados;
                        this.qtd = data.data.qtd;
                    })
                    .catch((e) => {
                        console.log('Erro ao carregar comentarios: ', e);
                    });
            },
        }
    }

</script>
