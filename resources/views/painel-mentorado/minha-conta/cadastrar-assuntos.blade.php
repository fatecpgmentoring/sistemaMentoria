@extends('painel-mentorado.layouts.master')

@section('meta-title', 'Cadastrar Assuntos - Painel Mentorado | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentorado" class="link-breadcrumb">Painel Mentorado</a></li>
    <li><a href="/mentorado/cadastrar-assunto" class="link-breadcrumb">Cadastrar Assuntos</a></li>
</ul>
@endsection

@section('content')

@csrf
<div class="assuntos-cad row">
    <div class="col-xl-2">
        <select name="profissao" id="profissao" class="form-control assuntos-sel">
            <option value="">Filtrar...</option>
            @foreach ($profissoes as $profissao)
                <option value="{{$profissao->id_profissao}}">{{$profissao->nm_profissao}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xl-2">
        <select name="carreira" id="carreira" class="form-control assuntos-sel">
            <option value="">Filtrar...</option>
            @foreach ($carreiras as $carreira)
                <option value="{{$carreira->id_carreira}}">{{$carreira->nm_carreira}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xl-2">
        <button class="btn btn-mentoring-circule btn-lg" id="searchAssunto"><i class="fa fa-search fa-lg"></i></button>
    </div>
</div>
<div class="row">
	<div class="col-xl-5">
    <div style="text-align:center;">Assuntos Existentes</div>
		<select name="from[]" id="multiselect1" class="form-control" size="8" multiple="multiple">
            @foreach ($assuntos as $assunto)
                <option value="{{$assunto->id_assunto}}">{{$assunto->nm_assunto}}</option>
            @endforeach
		</select>
	</div>
	<div class="col-xl-2" style="margin-top: 24px">
        <button data-toggle="modal" data-target="#exampleModal" id="addAssunto" class="btn btn-mentoring btn-block"><i class="fa fa-plus fa-lg fa-mentoring" data-toggle="tooltip" title="Não encontrou o que deseja? Adicione um novo assunto."><a class="btnAdicionar">Adicionar</a></i></button>
		<button type="button" id="multiselect1_rightSelected" class="btn btn-mentoring btn-block"><i class="fa fa-long-arrow-right fa-lg fa-mentoring" data-toggle="tooltip" title="Adicionar a sua lista de assuntos"></i></button>
		<button type="button" id="multiselect1_leftSelected" class="btn btn-mentoring btn-block"><i class="fa fa-long-arrow-left fa-lg fa-mentoring" data-toggle="tooltip" title="Remover da sua lista de assuntos"></i></button>
	</div>

	<div class="col-xl-5">
    <div style="text-align:center;">Meus Assuntos</div>
        <select name="to[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple">
            @foreach (Auth::user()->assuntos as $assunto)
                <option value="{{$assunto->id_assunto}}">{{$assunto->nm_assunto}}</option>
            @endforeach
        </select>
	</div>
</div>
@endsection

@section('js')
@include('painel-mentorado.includes.addAssunto')
<script>

$(document).ready(function() {
    // $('#multiselect1').multiselect();
    // $('#multiselect2').multiselect();

    function carregarAssuntos()
    {
        $.ajax({
            url: "{{route('carrega.assuntos.mentorado')}}",
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
            url: "{{route('carrega.assuntos.meus.mentorado')}}",
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
            url: "{{route('salva.assunto.mentorado')}}",
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
            url: "{{route('remove.assunto.mentorado')}}",
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
    $("#btnSalvaSugestaoAssunto").click(function()
    {
        var assunto = $("#assuntoInput").val();
        var carreira = $("#carreiraAssunto").val();
        $.ajax({
            url: "{{route('cadastrar.assunto.mentorado')}}",
            method: 'post',
            dataType: 'json',
            data: {_token: $("input[name=_token]").val(), dados: {assunto, carreira}},
            success: function(data) {
                $("#assuntoInput").val("");
                $("#carreiraAssunto").val("");
                if(data.status == 'success') alert('salvo mano')
            }
        })
    });

});

</script>
@endsection
