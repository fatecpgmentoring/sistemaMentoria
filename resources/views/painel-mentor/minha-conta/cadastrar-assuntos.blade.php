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
    <select name="profissao" id="profissao" class="form-control assuntos-sel">
        <option value="">Filtrar...</option>
        @foreach ($profissoes as $profissao)
            <option value="{{$profissao->id_profissao}}">{{$profissao->nm_profissao}}</option>
        @endforeach
    </select>
    <select name="carreira" id="carreira" class="form-control assuntos-sel">
        <option value="">Filtrar...</option>
        @foreach ($carreiras as $carreira)
            <option value="{{$carreira->id_carreira}}">{{$carreira->nm_carreira}}</option>
        @endforeach
    </select>
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
		<button type="button" class="btn btn-mentoring btn-block"><i class="fa fa-plus fa-lg fa-mentoring"> Adicionar</i></button>
		<button type="button" id="multiselect1_rightSelected" class="btn btn-mentoring btn-block"><i class="fa fa-long-arrow-right fa-lg fa-mentoring"></i></button>
		<button type="button" id="multiselect1_leftSelected" class="btn btn-mentoring btn-block"><i class="fa fa-long-arrow-left fa-lg fa-mentoring"></i></button>
		<button type="button" class="btn btn-mentoring btn-block"><i class="fa fa-save fa-lg fa-mentoring"> Salvar</i></button>
	</div>

	<div class="col-xl-5">
		<select name="to[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple"></select>
	</div>
</div>
@endsection

@section('js')
<script>

$(document).ready(function() {
    $('#multiselect1').multiselect();
    $('#multiselect2').multiselect();

    function carregarAssuntos()
    {
        var token = $("input[name=_token]").val();
        var profissao = $('#profissao').val();
        var carreira = $('#carreira').val();
        $.ajax({
            url: "{{route('carrega.assuntos')}}",
            method: 'post',
            data: {prof: profissao, _token: token, car: carreira},
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
        var token = $("input[name=_token]").val();
        var profissao = $('#profissao').val();
        $.ajax({
            url: "{{route('carrega.carreira')}}",
            method: 'post',
            data: {prof: profissao, _token: token},
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
        })
    }
    $('#profissao').change(function()
    {
        carregarCarreiras();
        carregarAssuntos();
    });
    $('#carreira').change(function()
    {
        carregarAssuntos();
    });
});

</script>
@endsection
