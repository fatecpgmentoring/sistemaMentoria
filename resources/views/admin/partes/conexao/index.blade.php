@extends('admin.layouts.dashboard')
@section('page_heading','Listar Conexões')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Mentorado</th>
        <th>Mentor</th>
        <th>Assunto</th>
        <th>Iniciou em</th>
    </thead>
    <tbody>
        @foreach ($conexoes as $conexao)
            <tr><td><a href="{{route('admin.conexao.show', $conexao->id_conexao)}}">{{$conexao->id_conexao}}</a></td>
            <td>{{$conexao->mentorado->nm_mentorado}}</td>
            <td>{{$conexao->mentor->nm_mentor}}</td>
            <td>{{$conexao->assunto->nm_assunto}}</td>
            <td>{{date('d/m/Y', strtotime($conexao->created_at))}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')


@stop
