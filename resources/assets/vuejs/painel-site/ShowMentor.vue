<template>
<div>
    <div class='perfil-desc-content online'>
        <div class="container">
            <div class="row">
                <div class="col-md-4 photo">
                    <figure>
                        <img :src="'/' + mentor.ds_foto" alt="">
                    </figure>
                    <div class="shares-list">
                        <ul>
                            <li><a href="http://www.facebook.com/sharer.php?u=" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a :href="'https://twitter.com/intent/tweet?text=Venha+ter+um+mentor+no+site+do+SISCCON+http%3A%2F%2F127.0.0.1%3A8000%2Fshow%2Fmentor%2F' + mentor.id_mentor" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="title-wrapping">
                        <div>
                            <h2>{{mentor.nm_mentor}}</h2>
                        </div>
                    </div>
                    <div class="editor-info estrelas">
                        <strong style="font-weight: bold">Nota:</strong>

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
                        <input type="radio" id="cm_star-10" name="fb" value="10" disabled/> <br>
                        <strong style="font-weight: bold">Assuntos:</strong> {{assuntos}} <br>
                        <strong style="font-weight: bold">Conhecimento:</strong> {{this.dic[mentor.nv_conhecimento-1]}}
                        <table v-if="contatos.length > 0">
                            <tr>
                                <td><strong style="font-weight: bold">Contatos</strong></td>
                            </tr>
                            <tr v-for="(contato, index) in contatos" :key="index">
                                <td>{{contato.ds_contato}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['mentor', 'assuntos', 'contatos'],
    mode: 'production',
    name: 'show-mentor',
    data () {
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
    mounted()
    {
        var x = document.getElementsByName("fb");
        x[parseInt(this.mentor.vl_nota.toFixed(0))].checked = true
    }
}
</script>
