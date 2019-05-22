<template>

    <div>
        <ul class="row consultant-list"  v-if="mentores.length > 0">
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
                            <div v-if="mentor.nv_conhecimento == 1">
                                menos de 1 ano de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 2">
                                de 1 a 3 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 3">
                                de 3 a 6 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 4">
                                6 a 10 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 5">
                                10 a 15 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 6">
                                15 a 20 anos de experiência
                            </div>
                            <div v-if="mentor.nv_conhecimento == 7">
                                mais de 20 anos de experiência
                            </div>
                        </div>
                    </div>
                    <div class="perfil-photo">
                        <figure>
                            <img :src="'/' + mentor.ds_foto" alt="mentor">
                        </figure>
                    </div>
                    <p class="description text-justify p-3 text-center">
                        {{mentor.vl_nota}}
                    </p>
                    <div class="cfooter">
                        <div>
                            <a href="#" class="btn">
                                <div class="spriting"></div>chamar</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['mentores'],
        data()
        {
            return {

            }
        },
        mounted() {
            console.log('Component mounted.')
            console.log(this.mentores);
        }
    }
</script>
