@extends('admin.layouts.dashboard')
@section('page_heading','Listar Profissão')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Descrição</th>
        <th>Carreiras</th>
        <th>Criado por</th>
        <th>Criado em</th>
        <th colspan="2">Ações</th>
    </thead>
    <tbody>
        @foreach ($profissoes as $profissao)
            <td>{{$profissao->id_profissao}}</td>
            <td>{{$profissao->nm_profissao}}</td>
            <td>
                <select>
                    <option>Lista de carreiras</option>
                    @foreach ($profissao->carreiras as $carreira)
                        <option>{{$carreira->nm_carreira}}</option>
                    @endforeach
                </select>
            </td>
            <td>{{$profissao->profissao_log}}</td>
            <td>{{$profissao->created_at}}</td>
            <td><button></button></td>
            <td><button></button></td>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')
@stop
