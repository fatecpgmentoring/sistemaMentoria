@extends('admin.layouts.dashboard')
@section('page_heading','Listar Mensagem')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Mensagem</th>
        <th>Conexão</th>
        <th>Enviada em</th>
    </thead>
    <tbody>
        @foreach ($mensagens as $mensagem)
            <tr>
                <td>{{$mensagem->id_mensagem}}</td>
                <td><a href="{{route('admin.mensagem.show', $mensagem->id_mensagem)}}">Ver Mensagem</a></td>
                <td><a href="{{route('admin.conexao.show', $mensagem->conexao->id_conexao)}}">Ver Conexão</a></td>
                <td>{{date('d/m/Y H:i:s', strtotime($mensagem->created_at))}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')

@stop
