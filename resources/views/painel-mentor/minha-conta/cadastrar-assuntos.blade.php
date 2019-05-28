@extends('painel-mentor.layouts.master')

@section('meta-title', 'Cadastrar Assuntos - Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li>Home</li>
    <li>Painel Mentor</li>
    <li>Cadastrar Assuntos</li>
</ul>
@endsection

@section('content')

@csrf
<div class="assuntos-cad">
    <select name="profissao" id="profissao" class="form-control assuntos-sel select2">
        <option value="">Filtrar...</option>
        @foreach ($profissoes as $profissao)
            <option value="{{$profissao->id_profissao}}">{{$profissao->nm_profissao}}</option>
        @endforeach
    </select>
    <select name="carreira" id="carreira" class="form-control assuntos-sel select2">
        <option value="">Filtrar...</option>
        @foreach ($carreiras as $carreira)
            <option value="{{$carreira->id_carreira}}">{{$carreira->nm_carreira}}</option>
        @endforeach
    </select>
    <button class="btn btn-mentoring-circule btn-lg" id="searchAssunto"><i class="fa fa-search fa-lg"></i></button>
</div>
<div class="row">
	<div class="col-xl-5">

		<select name="from[]" id="multiselect1" class="form-control" size="8" multiple="multiple">
            @foreach ($assuntos as $assunto)
                <option value="{{$assunto->id_assunto}}">{{$assunto->nm_assunto}}</option>
            @endforeach
		</select>
	</div>
	<div class="col-xl-2">
		<button type="button" id="addAssunto" class="btn btn-mentoring btn-block"><i class="fa fa-plus fa-lg fa-mentoring"> <a>Adicionar</a></i></button>
		<button type="button" id="multiselect1_rightSelected" class="btn btn-mentoring btn-block"><i class="fa fa-long-arrow-right fa-lg fa-mentoring"></i></button>
		<button type="button" id="multiselect1_leftSelected" class="btn btn-mentoring btn-block"><i class="fa fa-long-arrow-left fa-lg fa-mentoring"></i></button>
	</div>

	<div class="col-xl-5">
        <select name="to[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple">
            @foreach (Auth::user()->assuntos as $assunto)
                <option value="{{$assunto->id_assunto}}">{{$assunto->nm_assunto}}</option>
            @endforeach
        </select>
	</div>
</div>
@endsection

@section('js')
<script>

$(document).ready(function() {
    // $('#multiselect1').multiselect();
    // $('#multiselect2').multiselect();

    function carregarAssuntos()
    {
        $.ajax({
            url: "{{route('carrega.assuntos')}}",
            method: 'post',
            data: {prof: $('#profissao option:selected').val(), _token: $("input[name=_token]").val(), car: $('#carreira option:selected').val()},
            dataType: 'json',
            success: function(data)
            {
                if(data.length > 0) {
                    $('#multiselect1').empty();
                    $.each(data, function(i, obj)
                    {
                        $('#multiselect1').append('<option value="'+obj.id_assunto+'">'+obj.nm_assunto+'</option>');
                    });
                }
            }
        })
    }
    function carregarCarreiras()
    {
        $.ajax({
            url: "{{route('carrega.carreira')}}",
            method: 'post',
            data: {prof: $('#profissao option:selected').val(), _token: $("input[name=_token]").val()},
            dataType: 'json',
            success: function(data)
            {
                console.log(data);
                if(data.length > 0) {
                    $('#carreira').empty();
                    $('#carreira').append('<option value="" selected>Filtrar...</option>');
                    $.each(data, function(i, obj)
                    {
                        $('#carreira').append('<option value="'+obj.id_carreira+'">'+obj.nm_carreira+'</option>');
                    });
                }
            }
        });
    }
    function carregarMeusAssuntos()
    {
        $.ajax({
            url: "{{route('carrega.assuntos.meus')}}",
            method: 'post',
            dataType: 'json',
            data: {_token: $("input[name=_token]").val()},
            success: function(data)
            {
                if(data.length > 0) {
                    $('#multiselect1_to').empty();
                    $.each(data, function(i, obj)
                    {
                        $('#multiselect1_to').append('<option value="'+obj.id_assunto+'">'+obj.nm_assunto+'</option>');
                    });
                }
            }
        });
    }
    $('#profissao').change(function()
    {
        carregarCarreiras();
    });
    $('#searchAssunto').click(function()
    {
        carregarAssuntos();
        carregarMeusAssuntos();
    });
    $("#multiselect1_rightSelected").click(function()
    {
        var assuntos = $('#multiselect1').val()
        $.ajax({
            url: "{{route('salva.assunto.mentor')}}",
            method: 'post',
            data: {assuntos: assuntos, _token: $("input[name=_token]").val()},
            dataType: 'json',
            success: function(data)
            {
                $('#multiselect1_to').append($('#multiselect1 option:selected'));
                $('#multiselect1 option:selected').remove();
                $('#multiselect1_to option:selected').prop('selected', false);
            }
        });
    });
    $("#multiselect1_leftSelected").click(function()
    {
        var assuntos = $('#multiselect1_to').val();
        $.ajax({
            url: "{{route('remove.assunto.mentor')}}",
            method: 'post',
            data: {assuntos: assuntos, _token: $("input[name=_token]").val()},
            dataType: 'json',
            success: function(data)
            {
                $('#multiselect1').append($('#multiselect1_to option:selected'));
                $('#multiselect1_to option:selected').remove();
                $('#multiselect1 option:selected').prop('selected', false);
            }
        });
    });

    $("#addAssunto").click(function()
    {

    });


});

</script>
@endsection
