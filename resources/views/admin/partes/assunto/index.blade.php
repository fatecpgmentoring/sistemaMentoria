@extends('admin.layouts.dashboard')
@section('page_heading','Assunto')
@section('section')

<table class="table">
        <thead>
            <th>#</th>
            <th>Descrição</th>
            <th>Carreira</th>
            <th>Profissão</th>
            <th>Criado por</th>
            <th>Criado em</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            @foreach ($assuntos as $assunto)
                <td>{{$assunto->id_assunto}}</td>
                <td>{{$assunto->nm_assunto}}</td>
                <td>{{$assunto->carreira->nm_carreira}}</td>
                <td>{{$assunto->carreira->profissao->nm_profissao}}</td>
                <td>{{$assunto->assunto_log}}</td>
                <td>{{$assunto->created_at}}</td>
                <td><button></button></td>
                <td><button></button></td>
            @endforeach
        </tbody>
    </table>
@stop
