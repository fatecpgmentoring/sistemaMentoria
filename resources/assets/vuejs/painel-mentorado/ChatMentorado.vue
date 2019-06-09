<template>
    <!-- Coloque o html do Chat aqui -->
    <div class="container">
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
                        <p class="typing"> paulo está digitando...</p>
                        <textarea id="message" placeholder="Enviar mensagem..."></textarea>
                        <button>Enviar Mensagem</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="chat-frame-box" class="done" style="height: 565px; box-sizing: content-box;">
                    <div class="mentores-area">
                        <ul>
                            <li class="contact">
                                <div class="wrap">
                                    <div class="row" style="margin-bottom:1%">
                                        <div class="col-4">
                                            <span class="contact-status online"></span>
                                            <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" style="height:55px; width:55px; border-radius:50%; " />
                                        </div>
                                        <div class="col-8">
                                            <p class="name" style="font-weight:600; margin-top:10%; padding-right:5%; margin-left:0; margin-right:0; color: rgba(0, 176, 176, 1); "> Bolonha Maria</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:1%" v-for="n in 10">
                                        <div class="col-4">

                                            <span class="contact-status online"></span>
                                            <img src="http://emilcarlsson.se/assets/rachelzane.png" alt=""
                                                style="height:55px; width:55px; border-radius:50%; " />
                                        </div>
                                        <div class="col-8">
                                            <p class="name"
                                                style="font-weight:600; margin-top:10%; padding-right:5%; margin-left:0; margin-right:0;  color: rgba(0, 176, 176, 1);">
                                                Najila Trindade</p>
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
        props: ['mentorado', 'mentor'],
        name: 'chat-mentorado', 
        data() {
            return {
                socket: CreateConnectionSocket,
                to: mentorado.id_mentorado,
                from: mentor.id_mentor,
                toName: mentorado.nm_mentorado,
                fromName: mentor.nm_mentor 
            }
        },
        mounted() {
            var token = document.head.querySelector('meta[name="csrf-token"]');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        },
    }

</script>
