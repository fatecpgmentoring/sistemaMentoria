<template>
<!-- Coloque o html do Chat aqui -->
<div class="row">
    <div class="col-sm-8">
        <div id="chat-frame-box" class="done">
            <div class="talking-area">
                <div class="msg agent-notme">
                    <div class="text">
                        <span class="name"> André </span>
                        Mensagem
                    </div>
                </div>
                <div class="msg agent-me">
                    <div class="text">
                        <span class="name"> Paulo </span>
                        Mensagem
                    </div>
                </div>
            </div>
            <div class="panel-text">
                <p class="typing" > paulo está digitando...</p>
                <textarea id="message" placeholder="Enviar mensagem..." ></textarea>
                <button>Enviar Mensagem</button>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div id="chat-frame-box" class="done" style="height: 585px;">
            <div class="talking-area">
                <div class="msg agent-notme">
                    <div class="text">
                        <span class="name"> André </span>
                        Mensagem
                    </div>
                </div>
                <div class="msg agent-me">
                    <div class="text">
                        <span class="name"> Paulo </span>
                        Mensagem
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: [''],
        name: 'chat-mentorado', // Esse é o nome da tag html que vai conter o template : <chat-mentorado></chat-mentorado>
        data()
        {
            return {

            }
        },
        mounted() {
            var token = document.head.querySelector('meta[name="csrf-token"]');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        },
    }
</script>
