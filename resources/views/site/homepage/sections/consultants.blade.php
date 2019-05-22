<section id="consultants" class="mt-3">
         <div class="container">
            <h2 class="h2-title center-sprite">
            <span class="spriting sprite-hanger2"></span>
            Fale agora <br> com um Mentor
            </h2>
            @php
            $cfiltered = [];
            foreach ($mentores as $c) {
                $cfiltered[] = $c;
            }
            @endphp

        <consultant-list :mentores="{{ json_encode($cfiltered) }}"></consultant-list>
		</div>
</section>
