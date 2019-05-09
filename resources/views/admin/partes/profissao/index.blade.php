@extends('admin.layouts.dashboard')
@section('page_heading','Listar Profissão')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Profissao</th>
        <th>Criado por</th>
        <th>Criado em</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach ($profissoes as $profissao)
            <tr><td>{{$profissao->id_profissao}}</td>
            <td><a href="{{route('admin.profissao.show', $profissao->id_profissao)}}">{{$profissao->nm_profissao}}</a></td>
            <td>{{$profissao->profissao_log}}</td>
            <td>{{date('d/m/Y H:i:s', strtotime($profissao->created_at))}}</td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-warning">{{$profissao->ds_active_profissao ? 'Desativar' : 'Ativar'}}</button>
                    <button class="btn btn-primary">Alterar</button>
                    <button class="btn btn-danger">Deletar</button>
                </div>
            </td></tr>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')
@stop
