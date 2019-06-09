<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div id="chat-frame-box" class="done">
                    <div class="talking-area">
                        <div v-for="(item, index) in messages" :key="index" :class="item.fromUserId == from? 'msg agent-me' : 'msg agent-notme'">
                            <div class="text">
                                <span class="name"> {{item.fromUserId == from ? fromName : toName }} </span>
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
                                        <div class="col-4">
                                            <span class="contact-status online"></span>
                                            <img :src="'/' + listMentorado.ds_foto" alt=""
                                                style="height:55px; width:55px; border-radius:50%; " />
                                        </div>
                                        <div class="col-8">
                                            <p class="name"
                                                style="font-weight:600; margin-top:10%; padding-right:5%; margin-left:0; margin-right:0; color: rgba(0, 176, 176, 1); ">
                                                {{listMentorado.nm_mentorado}}</p>
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
        name: 'chat-mentorado', // Esse é o nome da tag html que vai conter o template : <chat-mentorado></chat-mentorado>
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
                messages: [],
            }
        },
        created()
        {
            // this.socket.emit("join", {
            //     user_id: this.to,
            //     name: this.toName
            // });
        },
        mounted() {
            this.socket.on('receiveMessage', this.receiveMessage);
            this.socket.on('istyping', this.someoneIsTyping);
            this.socket.on('notyping', this.finishIsTyping);
            var token = document.head.querySelector('meta[name="csrf-token"]');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
            for(let i = 0; i < Object.keys(this.conversa).lenght; i++)
            {
                if(this.conversa[i].id_flag == 1)
                {
                    this.messages.push({
                        fromUserId: this.from,
                        toUserId: this.to,
                        message: this.conversa[i].ds_mensagem
                    });
                }
            }
        },
        destroyed() {
            this.socket.emit('disconnect', this.to)
        },
        methods: {
            sendMessage()
            {
                if (this.message.trim().length > 0) {
                    let messagePackage = this.createMsgObj(this.message);
                    this.socket.emit('sendMessage', messagePackage);
                    this.socket.emit("typing", {toUserId: this.from, name: this.toName, typing:false });
                    this.socket.emit('response', {toUserId: this.from});
                    this.messages.push(messagePackage);
                    this.storeMessage();
                    this.message = "";
                    this.scrollToBottom();
                }else{
                    alert("Digite algo antes de enviar :)");
                }
            },
            receiveMessage(msg) {
                this.messages.push(msg);
                this.scrollToBottom();
            },
            onTyping() {
                if(this.message.length == 1 || (this.message.length%100 == 0 && this.message.length > 0))
                {
                    this.socket.emit("typing", {toUserId: this.from, name: this.toName, typing:true });
                    this.socket.emit('response', {toUserId: this.from});
                }
            },
            stopTyping() {
                if(this.message.length == 0)
                {
                    this.socket.emit("typing", {toUserId: this.from, name: this.toName, typing:false });
                    this.socket.emit('response', {toUserId: this.from});
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
                    fromUserId: this.to,
                    toUserId: this.from,
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
