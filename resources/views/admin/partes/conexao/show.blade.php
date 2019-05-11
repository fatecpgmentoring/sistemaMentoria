@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Conexão')
@section('section')

<div class="form-group">
        <label class="label-control" for="conexao">Conexão de:</label>
        <ul>
            <li>
                <a href="{{route('admin.mentor.show', $comentario->mentor->id_mentor)}}">{{$comentario->mentor->nm_mentor}}</a>
                com
                <a href="{{route('admin.mentorado.show', $comentario->mentorado->id_mentorado)}}">{{$comentario->mentorado->nm_mentorado}}</a>
            </li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="assunto">Assunto:</label>
        <ul>
            <li><a href="{{route('admin.assunto.show', $comentario->assunto->id_assunto)}}">{{$comentario->assunto->nm_assunto}}</a></li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="assunto">Datas:</label>
        <ul>
            <li>{{date('d/m/Y', strtotime($conexao->dt_inicio))." até ".date('d/m/Y', strtotime($conexao->dt_fim))}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="assunto">Quantidade de Reconexões:</label>
        <ul>
            <li>{{$conexao->qnt_reconexoes}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="assunto">Status:</label>
        <ul>
            <li>{{$conexao->ds_status == 0 ? 'Aguardando...' : $conexao->ds_status == 1 ? 'Ativa' : 'Terminada'}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="assunto">Mensagens Trocadas:</label>
        <table>
            @foreach ($conexao->mensagens as $mensagem)
                <tr>
                    <td>
                        @if($mensagem->id_flag)
                            <strong>{{$comentario->mentor->nm_mentor}}:</strong>{{$mensagem->ds_mensagem}}
                        @else
                            <strong>{{$comentario->mentorado->nm_mentorado}}:</strong>{{$mensagem->ds_mensagem}}
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@include('admin.includes.scripts')


@stop
