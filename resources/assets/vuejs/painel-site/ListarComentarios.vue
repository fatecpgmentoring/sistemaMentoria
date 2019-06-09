<template>
    <div class="estrelas">
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
    </div>
</template>

<script>
    export default {
        props: [''],
        name: 'listar-comentarios',
        data()
        {
            return {

            }
        },
       mounted()
        {
            var x = document.getElementsByName("fb");
            console.log();
            x[parseInt(this.mentor.vl_nota.toFixed(0))].checked = true;
            var token = document.head.querySelector('meta[name="csrf-token"]');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        }
    }
</script>
