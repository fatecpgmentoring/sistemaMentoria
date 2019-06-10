<template>
        <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div id="chat-frame-box" class="done">
                    <div class="talking-area">
                        <div v-for="(item, index) in messages" :key="index" :class="item.quem == 1? 'msg agent-me' : 'msg agent-notme'">
                            <div class="text">
                                <span class="name"> {{item.quem == 1 ? toName : fromName }} </span>
                                {{ item.message }}
                            </div>
                        </div>
                    </div>
                    <div class="panel-text">
                        <p class="typing" v-if="typing">{{ toName }} está digitando...</p>
                        <textarea v-model="message" @keyup.enter="sendMessage" @keypress="onTyping" @keyup.delete="stopTyping" id="message" placeholder="Enviar mensagem..." ></textarea>
                        <button @click="sendMessage">Enviar Mensagem</button><button style="background-color: red; float: right" @click="encerrarMentoria">Encerrar Mentoria</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="chat-frame-box" class="done" style="height: 565px;">
                    <div>
                        <ul>
                            <li class="contact">
                                <div class="wrap">
                                    <div class="row" v-for="(listMentores, index) in conexoes" :key="index" :style="'margin-bottom:1%;'">
                                        <div class="col-4" :style="listMentores.id_conexao === conexao.id_conexao ? 'background-color: rgba(0, 176, 176, 0.2)' : '' ">
                                            <a :href="'/mentorado/chat/' + listMentores.id_conexao">
                                                <span class="contact-status online"></span>
                                                <img :src="'/' + listMentores.ds_foto" alt=""
                                                    style="height:55px; width:55px; border-radius:50%; " />
                                            </a>
                                        </div>
                                        <div class="col-8" :style="listMentores.id_conexao === conexao.id_conexao ? 'background-color: rgba(0, 176, 176, 0.2)' : '' ">
                                            <a :href="'/mentorado/chat/' + listMentores.id_conexao">
                                                <p class="name"
                                                    style="font-weight:600; margin-top:10%; padding-right:5%; margin-left:0; margin-right:0; color: rgba(0, 176, 176, 1); ">
                                                    {{listMentores.nm_mentor}}</p>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
         <div class="py-4">
            <stack-modal :show="show" title="Avaliar" @close="show=false" @save="salvar()">
                <div class="form-group">
                    <label class="control-label">Nota: </label>
                    <div class="estrelas">
                        <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
                        <label for="cm_star-1"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-1" name="fb" value="1"/>
                        <label for="cm_star-2"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-2" name="fb" value="2" >
                        <label for="cm_star-3"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-3" name="fb" value="3"/>
                        <label for="cm_star-4"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-4" name="fb" value="4"/>
                        <label for="cm_star-5"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-5" name="fb" value="5"/>
                        <label for="cm_star-6"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-6" name="fb" value="6"/>
                        <label for="cm_star-7"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-7" name="fb" value="7"/>
                        <label for="cm_star-8"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-8" name="fb" value="8"/>
                        <label for="cm_star-9"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-9" name="fb" value="9"/>
                        <label for="cm_star-10"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-10" name="fb" value="10"/> <br>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="10" style="resize: none" id="textArea"></textarea>
                </div>
            </stack-modal>

        </div>
    </div>
</template>

<script>
    import StackModal from './ModalEncerrar.vue'
    export default {
        props: ['mentor', 'mentorado', 'conexao', 'conversa', 'conexoes'],
        name: 'chat-mentorado', // Esse é o nome da tag html que vai conter o template : <chat-mentorado></chat-mentorado>
        components: { StackModal },
        data()
        {
            return {
                socket: CreateConnectionSocket,
                to: this.mentor.id_mentor,
                from: this.mentorado.id_mentorado,
                toName: this.mentor.nm_mentor,
                fromName: this.mentorado.nm_mentorado,
                typing: false,
                message: '',
                messages: this.conversa,
                show: false,
            }
        },
        created()
        {
            this.socket.emit("join", {
                 user_id: this.from,
                 name: this.fromName
            });
        },
        mounted() {
            this.socket.on('receiveMessage', this.receiveMessage);
            this.socket.on('istyping', this.someoneIsTyping);
            this.socket.on('notyping', this.finishIsTyping);
            var token = document.head.querySelector('meta[name="csrf-token"]');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            this.scrollToBottom();
        },
        destroyed() {
            this.socket.emit('disconnect', this.from)
        },
        methods: {
            sendMessage()
            {
                if (this.message.trim().length > 0) {
                    let messagePackage = this.createMsgObj(this.message);
                    this.socket.emit('sendMessage', {mensagem: this.message, to: this.to});
                    this.socket.emit("typing", {to: this.to, name: this.fromName, typing:false });
                    this.messages.push(messagePackage);
                    this.storeMessage();
                    this.message = "";
                    this.scrollToBottom();
                }else{
                    alert("Digite algo antes de enviar :)");
                }
            },
            receiveMessage(msg) {
                this.messages.push({message: msg, quem: 1});
                this.scrollToBottom();
            },
            onTyping() {
                if(this.message.length == 1 || (this.message.length%100 == 0 && this.message.length > 0))
                {
                    this.socket.emit("typing", {to: this.to, name: this.fromName, typing:true });
                }
            },
            stopTyping() {
                if(this.message.length == 0)
                {
                    this.socket.emit("typing", {to: this.to, name: this.fromName, typing:false });
                }
            },
            someoneIsTyping(data) {
                this.typing = true;
            },
            finishIsTyping(data) {
                this.typing = false;
            },
            createMsgObj() {
                return {
                    quem: 0,
                    message: this.message
                }
            },
            scrollToBottom() {
                setTimeout(function() {
                    document.querySelector('.talking-area').scrollTop = document.querySelector('.talking-area').scrollHeight
                },300)
            },
            storeMessage(){
                axios.post('/mentorado/mensagem', {conexao: this.conexao.id_conexao, mensagem: this.message, msgpor: 0})
            },
            encerrarMentoria()
            {
                event.preventDefault();
                this.show = true;

            },
            salvar()
            {
                var descricao = document.getElementById('textArea').value;
                var escolha = null;
                var els = document.getElementsByName('fb');
                for (var i=0;i<els.length;i++){
                    if ( els[i].checked ) {
                        escolha = els[i].value;
                    }
                }
                axios.post('/mentorado/avaliar', {nota: escolha, comentario: descricao, mentor: this.to, mentorado: this.from})
                .then((data) => {
                    this.show = false;
                    axios.post('/mentorado/encerrar', {conexao: this.conexao.id_conexao})
                    .then((data) => {
                        window.location = '/mentorado/conexoes';
                    })
                    .catch((e) => {
                        console.log('Erro ao carregar mentores created: ', e);
                    });
                })
                .catch((e) => {
                    console.log('Erro ao carregar mentores created: ', e);
                });
            },
        }
    }
</script>
