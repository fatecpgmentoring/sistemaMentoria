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
                            Conhecimento: {{this.dic[mentor.nv_conhecimento-1]}}
                        </div>
                    </div>
                    <div class="perfil-photo">
                        <figure>
                            <img :src="'/' + mentor.ds_foto" alt="mentor">
                        </figure>
                    </div>
                    <p class="description text-justify p-3 text-center estrelas">
                        Nota:
                        <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
                        <label for="cm_star-1"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-1" name="fb" value="1" disabled/>
                        <label for="cm_star-2"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-2" name="fb" value="2" disabled/>
                        <label for="cm_star-3"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-3" name="fb" value="3" disabled/>
                        <label for="cm_star-4"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-4" name="fb" value="4" disabled/>
                        <label for="cm_star-5"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-5" name="fb" value="6" disabled/>
                        <label for="cm_star-6"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-6" name="fb" value="6" disabled/>
                        <label for="cm_star-7"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-7" name="fb" value="7" disabled/>
                        <label for="cm_star-8"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-8" name="fb" value="8" disabled/>
                        <label for="cm_star-9"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-9" name="fb" value="9" disabled/>
                        <label for="cm_star-10"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-10" name="fb" value="10" disabled/>
                    </p>
                    <div class="cfooter">
                        <div>
                            <a :href="'/show/mentor/' + mentor.id_mentor" class="btn">
                                <div class="spriting"></div>ver</a>
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
                dic: [
                'menos de 1 ano de experiência',
                'entre 1 e 3 anos de experiência',
                'entre 3 e 6 anos de experiência',
                'entre 6 e 10 anos de experiência',
                'entre 10 e 15 anos de experiência',
                'entre 15 e 20 anos de experiência',
                'mais de 20 anos de experiência'],
            }
        },
        mounted() {
            var x = document.getElementsByName("fb");
            x[parseInt(this.mentor.vl_nota.toFixed(0))].checked = true
        }
    }
</script>
