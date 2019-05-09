@extends('admin.layouts.dashboard')
@section('page_heading','Listar Assunto')
@section('section')

<table class="table">
        <thead>
            <th>#</th>
            <th>Assunto</th>
            <th>Carreira</th>
            <th>Profissão</th>
            <th>Criado por</th>
            <th>Criado em</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($assuntos as $assunto)
                <tr><td>{{$assunto->id_assunto}}</td>
                <td><a href="{{route('admin.assunto.show', $assunto->id_assunto)}}">{{$assunto->nm_assunto}}</a></td>
                <td><a href="{{route('admin.carreira.show', $assunto->carreira->id_carreira)}}">{{$assunto->carreira->nm_carreira}}</a></td>
                <td><a href="{{route('admin.profissao.show', $assunto->carreira->profissao->id_profissao)}}">{{$assunto->carreira->profissao->nm_profissao}}</a></td>
                <td>{{$assunto->assunto_log}}</td>
                <td>{{date('d/m/Y H:i:s', strtotime($assunto->created_at))}}</td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-warning">{{$assunto->ds_active_assunto ? 'Desativar' : 'Ativar'}}</button>
                        <button class="btn btn-primary">Alterar</button>
                        <button class="btn btn-danger">Deletar</button>
                    </div>
                </td></tr>
            @endforeach
        </tbody>
    </table>
@include('admin.includes.scripts')
@stop
