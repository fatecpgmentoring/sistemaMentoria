<template>
    <div>
        <div class="assuntos-cad row">
            <div class="col-xl-5">
                <select name="profissao" id="profissao" @change="buscaCarreiras" v-model.number="modelProfissao"
                    class="form-control">
                    <option value="">Filtrar...</option>
                    <option v-for="(profissao, index) in profissoesFiltered"
                            :key="index"
                            v-bind:value="profissao.id_profissao" ref="profissoesFiltered">
                        {{profissao.nm_profissao}}
                    </option>
                </select>
            </div>
            <div class="col-xl-5">
                <select name="carreira" id="carreira" v-model.number="modelCarreira" class="form-control">
                    <option value="">Filtrar...</option>
                    <option v-for="(carreira, index) in carreirasFiltered"
                            :key="index"
                            v-bind:value="carreira.id_carreira"
                            ref="carreirasFiltered">
                        {{carreira.nm_carreira}}
                    </option>
                </select>
            </div>
            <div class="col-xl-2" >
                <button class="btn btn-mentoring-circule btn-lg" @click="buscarAssuntos" id="searchAssunto" style="float: right;"><i
                        class="fa fa-search fa-lg"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5">
                <div style="text-align:center;">Assuntos Existentes</div>
                <select name="from[]" id="multiselect1" class="form-control" v-model="assuntosAdicionar" size="8"
                    multiple="multiple">
                    <option v-for="(assunto, index) in assuntosFiltered" :key="index" v-bind:value="assunto.id_assunto" ref="assuntosFiltered">
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
                <select name="to[]" id="multiselect1_to" class="form-control" v-model="assuntosRemover" size="8"
                    multiple="multiple">
                    <option v-for="(assunto, index) in assuntosMeusFiltered" :key="index" v-bind:value="assunto.id_assunto" ref="assuntosMeusFiltered">
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
                        <select name="carreiraAssunto" id="carreiraAssunto" v-model.number="carreiraNovo" class="form-control">
                            <option value="">Digite uma carreira...</option>
                            <option v-for="(carreira, index) in carreirasFiltered" :key="index"
                                v-bind:value="carreira.id_carreira">
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
        props: ['meus', 'assuntos', 'carreiras', 'profissoes', 'user'],
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
                assuntosFiltered: this.assuntos,
                assuntosMeusFiltered: this.meus,
                assuntosRemover: [],
                assuntoNovo: '',
                carreiraNovo: '',
                show: false,
                role: this.user.cd_role == 2 ? 'mentor' : 'mentorado'
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            buscarAssuntos() {
                axios.post('/'+this.role+'/carregaAssunto', {prof: this.modelProfissao, car: this.modelCarreira})
                    .then((data) => {
                        this.assuntosFiltered = data.data.assuntos;
                    }).catch((data) => {

                    });
            },
            buscaCarreiras() {
                this.modelCarreira = '';
                axios.post('/'+this.role+'/carregaCarreira', {prof: this.modelProfissao})
                    .then((data) => {
                        this.carreirasFiltered = data.data.carreiras;
                    }).catch((data) => {

                    });
            },
            abrirModal() {
                event.preventDefault();
                this.show = true;
            },
            adicionarAssuntos() {
                axios.post('/'+this.role+'/salvarAssunto', {assuntos: this.assuntosAdicionar});
                for(var i = 0; i < this.assuntosFiltered.length; i++)
                {
                    for(var j = 0; j < this.assuntosAdicionar.length; j++)
                    {
                        if(this.assuntosFiltered[i].id_assunto == this.assuntosAdicionar[j])
                        {
                            this.assuntosMeusFiltered.push(this.assuntosFiltered[i]);
                            this.assuntosFiltered.splice(i, 1);
                        }
                    }

                }
            },
            removerAssuntos() {
                axios.post('/'+this.role+'/removerAssunto', {assuntos: this.assuntosAdicionar});
                 for(var i = 0; i < this.assuntosMeusFiltered.length; i++)
                {
                    for(var j = 0; j < this.assuntosRemover.length; j++)
                    {
                        if(this.assuntosMeusFiltered[i].id_assunto == this.assuntosRemover[j])
                        {
                            this.assuntosFiltered.push(this.assuntosMeusFiltered[i]);
                            this.assuntosMeusFiltered.splice(i, 1);
                        }
                    }

                }
            },
            salvar() {
                axios.post('/'+this.role+'/cadastrar-assunto-mentor', { assunto: this.assuntoNovo, carreira: this.carreiraNovo})
                 .then((data) => {
                        this.carreiraNovo = '';
                        this.assuntoNovo = '';
                    }).catch((data) => {

                    });;
            }
        },
    }

</script>
