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
                <td>{{$assunto->nm_assunto}}</td>
                <td>{{$assunto->carreira->nm_carreira}}</td>
                <td>{{$assunto->carreira->profissao->nm_profissao}}</td>
                <td>{{$assunto->assunto_log}}</td>
                <td>{{$assunto->created_at}}</td>
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
