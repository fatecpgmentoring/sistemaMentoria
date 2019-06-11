<template>
    <div>
        <div class="assuntos-cad row">
            <div class="col-xl-2">
                <select name="profissao" id="profissao" @change="buscaCarreiras" v-model="modelProfissao"
                    class="form-control assuntos-sel">
                    <option value="">Filtrar...</option>
                    <option v-for="(profissao, index) in profissoesFiltered" :key="index"
                        :value="profissao.id_profissao">
                        {{profissao.nm_profissao}}
                    </option>
                </select>
            </div>
            <div class="col-xl-2">
                <select name="carreira" id="carreira" v-model="modelCarreira" class="form-control assuntos-sel">
                    <option value="">Filtrar...</option>
                    <option v-for="(carreira, index) in carreirasFiltered" :key="index" :value="carreira.id_carreira">
                        {{carreira.nm_carreira}}
                    </option>
                </select>
            </div>
            <div class="col-xl-2">
                <button class="btn btn-mentoring-circule btn-lg" @click="buscarAssuntos" id="searchAssunto"><i
                        class="fa fa-search fa-lg"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5">
                <div style="text-align:center;">Assuntos Existentes</div>
                <select name="from[]" id="multiselect1" class="form-control" v-model="assuntosAdicionar" size="8"
                    multiple="multiple">
                    <option v-for="(assunto, index) in assuntosFiltered" :key="index" :value="assunto.id_assunto">
                        {{assunto.nm_assunto}}
                    </option>
                </select>
            </div>
            <div class="col-xl-2">
                <button @click="abrirModal" class="btn btn-mentoring btn-block"><i class="fa fa-plus fa-lg fa-mentoring"
                        data-toggle="tooltip"
                        title="Não encontrou o que deseja? Adicione um novo assunto."><a>Adicionar</a></i></button>
                <button type="button" @click="adicionarAssuntos" class="btn btn-mentoring btn-block"><i
                        class="fa fa-long-arrow-right fa-lg fa-mentoring" data-toggle="tooltip"
                        title="Adicionar a sua lista de assuntos"></i></button>
                <button type="button" @click="removerAssuntos" class="btn btn-mentoring btn-block"><i
                        class="fa fa-long-arrow-left fa-lg fa-mentoring" data-toggle="tooltip"
                        title="Remover da sua lista de assuntos"></i></button>
            </div>

            <div class="col-xl-5">
                <div style="text-align:center;">Meus Assuntos</div>
                <select name="to[]" id="multiselect1_to" class="form-control" v-model="assuntosMeusRemover" size="8"
                    multiple="multiple">
                    <option v-for="(assunto, index) in assuntosMeusFiltered" :key="index" :value="assunto.id_assunto">
                        {{assunto.nm_assunto}}
                    </option>
                </select>
            </div>
            <div class="py-4">
                <stack-modal :show="show" title="Adicionar Assunto" @close="show=false" @save="salvar()">
                    <div class="form-group">
                        <label for="assuntoInput">Assunto: </label>
                        <input type="text" name="assunto" v-model="assuntoNovo" id="assuntoInput" class="form-control"
                            placeholder="Digite um assunto...">
                    </div>
                    <div class="form-group">
                        <label for="carreiraAssunto">Carreira: </label>
                        <select name="carreiraAssunto" id="carreiraAssunto" v-model="carreiraNovo" class="form-control">
                            <option value="">Digite uma carreira...</option>
                            <option v-for="(carreira, index) in carreirasFiltered" :key="index"
                                :value="carreira.id_carreira">
                                {{carreira.nm_carreira}}
                            </option>
                        </select>
                    </div>
                </stack-modal>

            </div>
        </div>
    </div>
</template>
<script>
    import StackModal from './ModalAssuntos.vue'
    export default {
        props: ['assuntosMeus', 'assuntosGerais', 'carreiras', 'profissoes'],
        name: 'adicionar-assuntos',
        components: {
            StackModal
        },
        data() {
            return {
                carreirasFiltered: this.carreiras,
                assuntosAdicionar: [],
                modelCarreira: '',
                modelProfissao: '',
                profissoesFiltered: this.profissoes,
                assuntosFiltered: this.assuntosGerais,
                assuntosMeusFiltered: this.assuntosMeus,
                assuntosMeusRemover: [],
                assuntoNovo: '',
                carreiraNovo: '',
                show: false,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            buscarAssuntos() {

            },
            buscaCarreiras() {

            },
            abrirModal() {

            },
            adicionarAssuntos() {

            },
            removerAssuntos() {

            },
            salvar() {

            }
        },
    }

</script>
