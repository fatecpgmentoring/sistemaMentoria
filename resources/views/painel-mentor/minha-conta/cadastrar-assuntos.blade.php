@extends('painel-mentor.layouts.master')

@section('meta-title', 'Cadastrar Assuntos - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentor" class="link-breadcrumb">Painel Mentor</a></li>
    <li><a href="/mentor/cadastrar-assuntos" class="link-breadcrumb">Cadastrar Assuntos</a></li>
</ul>
@endsection

@section('content')
<adicionar-assuntos
    :meus="{{Auth::user()->assuntos}}"
    :assuntos="{{$assuntos}}"
    :profissoes="{{$profissoes}}"
    :carreiras="{{$carreiras}}"
></adicionar-assuntos>
@endsection

@section('js')
@include('painel-mentor.includes.addAssunto')
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
                    $('#carreira').prop('disabled', false);
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
        $('#carreira').prop('disabled', true);
        carregarCarreiras();
    });
    $('#searchAssunto').click(function()
    {
        carregarAssuntos();
        carregarMeusAssuntos();
    });
    $("#btnSalvaSugestaoAssunto").click(function()
    {
        var assunto = $("#assuntoInput").val();
        var carreira = $("#carreiraAssunto").val();
        $.ajax({
            url: "{{route('cadastrar.assunto.mentor')}}",
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
