<template>

	<div>
        <ul class="row consultant-list" >                 
            <li class="col-lg-4 col-md-6 item">
                <div class="wrap-card">
                    <div class="cheader">
                        <h2 class="name">Charles</h2>
                        <h3 class="specialization">
                            <div>
                                <div>
                                    Mentor
                                </div>
                            </div>

                        </h3>
                        <div class="text-center">
                            <span class="status-now">Online</span>
                        </div>
                    </div>
                    <div class="perfil-photo">
                        <figure>
                            <img src="/images/logos/avatar.png" alt="mentores">
                        </figure>
                    </div>
                    <p class="description text-justify p-3">
                        
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
    	name: 'conexoes-mentorados',
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>

<style scoped>
	
</style>