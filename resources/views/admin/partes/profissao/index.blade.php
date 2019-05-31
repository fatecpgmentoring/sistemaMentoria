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
                        <form action="{{route('admin.profissao.destroy', $profissao->id_profissao)}}" method="post">
                                @csrf
                                @method('DELETE')
                                    <div class="btn-group">
                                    <a href="{{ route('admin.profissao.status', $profissao->id_profissao) }}" class="btn {{$profissao->ds_active_profissao ? 'btn-warning fa fa-times' : 'btn-success fa fa-check'}}">{{$profissao->ds_active_profissao ? '' : ''}}</a>
                                    <a href="{{ route('admin.profissao.edit', $profissao->id_profissao) }}" class="btn btn-primary fa fa-edit" data-toggle="tooltip" title="Editar"></a>
                                    <button class="btn btn-danger fa fa-trash" data-toggle="tooltip" title="Excluir"></button>
                                </div>
                            </form>
                </div>
            </td></tr>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')
@stop
