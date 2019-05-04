@extends('admin.layouts.dashboard')
@section('page_heading','Carreiras')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Descrição</th>
        <th>Criado por</th>
        <th>Criado em</th>
        <th colspan="2">Ações</th>
    </thead>
    <tbody>
        @foreach ($profissoes as $profissao)
            <td>{{$profissao->id_profissao}}</td>
            <td>{{$profissao->id_profissao}}</td>
            <td>{{$profissao->id_profissao}}</td>
            <td>{{$profissao->id_profissao}}</td>
            <td>{{$profissao->id_profissao}}</td>
            <td>{{$profissao->id_profissao}}</td>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')
@stop
