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
                    <form action="{{route('admin.assunto.destroy', $assunto->id_assunto)}}" method="post">
                            @csrf
                            @method('DELETE')
                                <div class="btn-group">
                                <a href="{{ route('admin.assunto.status', $assunto->id_assunto) }}" class="btn {{$assunto->ds_active_assunto ? 'btn-warning fa fa-times' : 'btn-success fa fa-check'}}">{{$assunto->ds_active_assunto ? '' : ''}}</a>
                                <a href="{{ route('admin.assunto.edit', $assunto->id_assunto) }}" class="btn btn-primary fa fa-edit"  data-toggle="tooltip" title="Editar"></a>
                                <button class="btn btn-danger fa fa-trash"  data-toggle="tooltip" title="Excluir"></button>
                            </div>
                        </form>
                </td></tr>
            @endforeach
        </tbody>
    </table>
@include('admin.includes.scripts')
@stop
