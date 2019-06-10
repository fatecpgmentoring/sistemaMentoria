@extends('painel-mentor.layouts.master')

@section('meta-title', 'Cadastrar Contato - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentor" class="link-breadcrumb">Painel Mentor</a></li>
    <li><a href="/mentor/cadastrar-contato" class="link-breadcrumb">Cadastrar Contato</a></li>
</ul>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-1">
            <label for="tipo-contato">Logo</label>
            <img src="" id="logo-contato" style="height: 34px;">
        </div>
        <div class="col-sm-3">
                <div class="form-group">
                    <label for="tipo-contato">Tipo de Contato</label>
                    <select onchange="mostraLogo(this.value);" class="form-control" id="tipo-contato"
                        name="tipo-contato">
                        <option value="">Selecione...</option>
                        <option value="link">LinkedIn</option>
                        <option value="whats">Whatsapp</option>
                        <option value="face">Facebook</option>
                        <option value="telegram">Telegram</option>
                        <option value="insta">Instagram</option>
                        <option value="tel">Telefone</option>
                        <option value="cel">Celular</option>
                        <option value="email">Email</option>
                        <option value="other">Outro</option>
                    </select>
                </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="Nome">Contato (coloque apenas o user)</label>
                <input type="text" class="form-control" id="nome-contato" placeholder="Nome">
            </div>
            <input type="hidden" name="alterar" value="" id="alterar">
            <button class="btn btn-success" style="float: right">Salvar</button>
        </div>
        <div class="col-sm-5">
            <table class="table mentor">
                <thead>
                    <tr>
                        <th style="text-align: center">Logo</th>
                        <th colspan="2" style="text-align: center">Ações</th>
                    </tr>
                </thead>
                <tbody id="bodyContatos">
                    @foreach ($contatos as $contato)
                    <tr>
                        <td style="text-align: center">
                            <a href="{{$contato->link}}">
                                <img src="{{$contato->imagem}}" style="height: 34px;">
                            </a>
                        </td>
                        <td style="text-align: center">
                            <button id="{{$contato->id_contato}}" class="btn btn-warning">Alterar</button>
                        </td>
                        <td style="text-align: center">
                            <form>
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_contato" value="{{$contato->id_contato}}">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    var dicionarioDeImagens = {
        link: "/images/icones/linkedin.png",
        whats: '/images/icones/zap.png',
        face: '/images/icones/fb.png',
        telegram: '/images/icones/teleg.png',
        insta: '/images/icones/insta.png',
        tel: '/images/icones/tele.png',
        cel: '/images/icones/cel.png',
        email: '/images/icones/mail.png',
        other: '/images/icones/outro.png',
    }

<<<<<<< HEAD
=======
    function mostraLogo(valor) {
        document.getElementById("logo-contato").src = dicionarioDeImagens[valor];
    }
    $('.btn-warning').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            url: "{{route('contatos.ajax')}}",
            data: {
                contato: id
            },
            dataType: 'json',
            success: function (response) {
                $("#nome-contato").val(response.ds_contato);
                $("#tipo-contato").val(response.tipo_contato);
                $("#alterar").val(response.id_contato);
                mostraLogo(response.tipo_contato);
            }
        });
    });
    $('.btn-success').click(function()
    {
        var token = document.head.querySelector('meta[name="csrf-token"]');
        $.ajax({
            url: "{{route('salvar.contato')}}",
            data: {
                tipo: $("#tipo-contato").val(),
                contato: $("#nome-contato").val(),
                alterar: $("#alterar").val(),
                _token: token.content
            },
            method: 'post',
            dataType: 'json',
            success: function (response) {
                document.getElementById("logo-contato").src = "";
                $("#nome-contato").val("");
                $("#tipo-contato").val("");
                $('#alterar').val("");
                getContatos();
            }
        });
    });
    function getContatos()
    {
        $.ajax({
            url: "{{route('contatos.all.ajax')}}",
            dataType: 'json',
            success: function (response) {
               $("#bodyContatos").empty();
               $.each(response, function(i, contato)
               {
                    var one = '<tr><td style="text-align: center"><a href="' + contato.link + '"><img src="' + contato.imagem + '" style="height: 34px;"></a></td>';
                    var two = '<td style="text-align: center"><button id="'+ contato.id_contato +'" class="btn btn-warning">Alterar</button></td>';
                    var three = '<td style="text-align: center"><form> @csrf <input type="hidden" name="id_contato" value="'+ contato.id_contato +'"><button type="submit" class="btn btn-danger">Excluir</button></form></td></tr>';
                    $("#bodyContatos").append(one+two+three);
               });
            }
        });
    }

>>>>>>> faca355a12e97e464b1e1266a7a7dcc5097a4059
</script>
@endsection
