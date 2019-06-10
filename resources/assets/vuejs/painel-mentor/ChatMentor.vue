<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div id="chat-frame-box" class="done">
                    <div class="talking-area">
                        <div v-for="(item, index) in messages" :key="index" :class="item.quem == 0? 'msg agent-me' : 'msg agent-notme'">
                            <div class="text">
                                <span class="name"> {{item.quem == 0 ? toName : fromName }} </span>
                                {{ item.message }}
                            </div>
                        </div>
                    </div>
                    <div class="panel-text">
                        <p class="typing" v-if="typing">{{ toName }} está digitando...</p>
                        <textarea v-model="message" @keyup.enter="sendMessage" @keypress="onTyping" @keyup.delete="stopTyping" id="message" placeholder="Enviar mensagem..." ></textarea>
                        <button @click="sendMessage">Enviar Mensagem</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="chat-frame-box" class="done" style="height: 565px;">
                    <div>
                        <ul>
                            <li class="contact">
                                <div class="wrap">
                                    <div class="row" style="margin-bottom:1%" v-for="(listMentorado, index) in conexoes" :key="index">
                                        <div class="col-4" :style="listMentorado.id_conexao === conexao.id_conexao ? 'background-color: rgba(0, 176, 176, 0.2)' : '' ">
                                           <a :href="'/mentor/chat/' + listMentorado.id_conexao">
                                                <span class="contact-status online"></span>
                                                <img :src="'/' + listMentorado.ds_foto" alt=""
                                                style="height:55px; width:55px; border-radius:50%; " />
                                            </a>
                                        </div>
                                        <div class="col-8" :style="listMentorado.id_conexao === conexao.id_conexao ? 'background-color: rgba(0, 176, 176, 0.2)' : '' ">
                                             <a :href="'/mentor/chat/' + listMentorado.id_conexao">
                                                <p class="name"
                                                style="font-weight:600; margin-top:10%; padding-right:5%; margin-left:0; margin-right:0; color: rgba(0, 176, 176, 1); ">
                                                {{listMentorado.nm_mentorado}}</p>
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
    </div>
</template>

<script>
    export default {
        props: ['mentor', 'mentorado', 'conexao', 'conversa', 'conexoes'],
        name: 'chat-mentor', // Esse é o nome da tag html que vai conter o template : <chat-mentorado></chat-mentorado>
        data()
        {
            return {
                socket: CreateConnectionSocket,
                from: this.mentor.id_mentor,
                to: this.mentorado.id_mentorado,
                fromName: this.mentor.nm_mentor,
                toName: this.mentorado.nm_mentorado,
                typing: false,
                message: '',
                messages: this.conversa,
            }
        },
        created()
        {
            this.socket.emit("join", {
                 user_id: this.from,
                 name: this.toName
            });
        },
        mounted() {
            this.socket.on('receiveMessage', this.receiveMessage);
            this.socket.on('istyping', this.someoneIsTyping);
            this.socket.on('notyping', this.finishIsTyping);
            var token = document.head.querySelector('meta[name="csrf-token"]');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            this.scrollToBottom()
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
                this.messages.push({message: msg, quem: 0});
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
                    quem: 1,
                    message: this.message
                }
            },
            scrollToBottom() {
                setTimeout(function() {
                    document.querySelector('.talking-area').scrollTop = document.querySelector('.talking-area').scrollHeight
                },300)
            },
            storeMessage(){
                axios.post('/mentor/mensagem', {conexao: this.conexao.id_conexao, mensagem: this.message, msgpor: 1})
            },
        }
    }
</script>
