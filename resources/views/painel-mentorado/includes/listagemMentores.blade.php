    <div>
        <div class="search-wrap">
            <form>
                <div class="wrap-input">
                    <input type="text" id="search" placeholder="Buscar" name="termo">
                    <button type="submit" id="searchBtn">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
        <ul class="row consultant-list" id="listaMentoresUL" > </ul>
        <div id="paginator">
            <ul>
                <div>
                    <li class="prev"><a href="#" id="anterior">Anterior</a></li>
                </div>
                &nbsp &nbsp
                <div id="paginate"></div>
                &nbsp &nbsp
                <div>
                    <li class="next"><a href="#" id="proximo">Proximo</a></li>
                </div>
            </ul>
        </div>
        {{-- <div>
                <div class="col-12 h2-title center-sprite text-center">
                    Não há consultores
                </div>
            </div> --}}
    </div>
@section('js')
<script type="application/javascript">
    var dic = [ 'menos de 1 ano de experiência',
                'entre 1 e 3 anos de experiência',
                'entre 3 e 6 anos de experiência',
                'entre 6 e 10 anos de experiência',
                'entre 10 e 15 anos de experiência',
                'entre 15 e 20 anos de experiência',
                'mais de 20 anos de experiência'];
    var page = 1;
    var qtd = 0;
    var search = "";
    var filteredMentores = {};
    carregaMentores(1, null);
    function carregaMentores(pageParam, searchParam) {
        page = pageParam;
        $.ajax({
            url: '/mentoresListagembyMentorado',
            method: 'get',
            dataType: 'json',
            data: {page: page, search: search},
            success: function(data)
            {
                filteredMentores = data.dados;
                qtd = data.qtd;
                reordenaMentores();
            },
            error: function(err)
            {
                console.log('Erro ao carregar consultores: ', err);
            }
        });
    }
    function fsearch(searchParam) {
        search = searchParam;
        carregaMentores(page, search);
    }

    function changePage(pageParam) {
        page = pageParam;
        carregaMentores(page, search);
    }

    function reordenaMentores()
    {
        var liClasse = '<li class="col-lg-4 col-md-6 item">';
        var divWarpCard = '<div class="wrap-card">';
        var cheader = '<div class="cheader">';
        var specialization = '<h3 class="specialization"><div><div>Mentor</div></div></h3>';
        var textCenterExperiencia = '<div class="text-center">';
        var divFotoOpen = '<div class="perfil-photo"><figure>';
        var divFotoClose = '</figure></div>';
        var divNota = '<p class="description text-justify p-3 text-center">'
        var footer = '<div class="cfooter"><div>';
        var fim = '<div class="spriting"></div>ver</a></div></div></div></li>';
        $("#listaMentoresUL").empty();
        $.each(filteredMentores, function(i, mentor)
        {
            var name = '<h2 class="name">'+ mentor.nm_mentor+'</h2>';
            var divExp = '<div>'+dic[mentor.nv_conhecimento-1]+'</div>'
            var foto = '<img src="/' + mentor.ds_foto +'" alt="mentor">';
            var nota = 'Nota: ' + mentor.vl_nota + '</p>';
            var link = '<a href="/show/mentor/' + mentor.id_mentor +'" class="btn">';
            $("#listaMentoresUL").append(
                liClasse+
                divWarpCard+
                cheader+
                name+
                specialization+
                textCenterExperiencia+
                divExp+
                '</div></div>'+
                divFotoOpen+
                foto+
                divFotoClose+
                divNota+
                nota+
                footer+
                link+
                fim);
        });
        paginate();
    }

    function paginate()
    {
        if(page == 1) $("#anterior").addClass('disabled');
        else $("#anterior").removeClass('disabled');
        if(page == qtd) $("#proximo").addClass('disabled');
        else $("#proximo").removeClass('disabled');
        $("#paginate").empty();
        for(var i = 1; i <= qtd; i++)
        {
            if(page == i) $("#paginate").append('<li class="active itemPaginate"><a href="#" id="#pagina">'+i+'</a></li>');
            else $("#paginate").append('<li><a class="itemPaginate" href="#" id="#pagina">'+i+'</a></li>');
        }

    }

    $(".itemPaginate").click(function(e)
    {
        e.preventDefault();
        console.log($(".itemPaginate"));
    });

    $("#searchBtn").click(function(e)
    {
        e.preventDefault();
        fsearch($("#search").val());
    });
</script>
@endsection
