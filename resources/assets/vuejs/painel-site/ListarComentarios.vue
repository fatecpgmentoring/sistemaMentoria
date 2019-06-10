<template>
    <div id="consultants-show">
        <div class="evaluation-content">
            <div class="container">
                <h2>O que disseram de você</h2>
                <ul class="rate-list">
                    <li>
                        <div class="wrap-rating">
                            estrelas
                        </div>

                        <div class="title-wrap">
                            <img src="/images/logos/icone-azul.png" height="50" width="50">
                            <h3>Manoo</h3>
                            <span class="date">20/05/2001</span>
                        </div>

                        <p>
                            depoimentos
                        </p>
                    </li>
                </ul>
                <!-- Pagination -->
                <div id="paginator">
                    paginação
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [''],
        name: 'listar-comentarios',
        data() {
            return {

            }
        },
        mounted() {
            var x = document.getElementsByName("fb");
            console.log();
            x[parseInt(this.mentor.vl_nota.toFixed(0))].checked = true;
            var token = document.head.querySelector('meta[name="csrf-token"]');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        }
    }

</script>
