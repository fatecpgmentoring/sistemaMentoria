<section id="consultants" class="mt-3">
         <div class="container">
            <h2 class="h2-title center-sprite">
            Fale agora <br> com um Mentor
            </h2>
            @php
            $cfiltered = [];
            foreach ($mentores as $c) {
                $cfiltered[] = $c;
            }
            @endphp

        <best-grades-mentores :mentores="{{ json_encode($cfiltered) }}"></best-grades-mentores>
		</div>
</section>
