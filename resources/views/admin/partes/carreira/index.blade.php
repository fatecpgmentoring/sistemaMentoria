@extends('admin.layouts.dashboard')
@section('page_heading','Listar Carreiras')
@section('section')

<table class="table">
        <thead>
            <th>#</th>
            <th>Carreira</th>
            <th>Profissão</th>
            <th>Criado por</th>
            <th>Criado em</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($carreiras as $carreira)
                <tr>
                    <td>{{$carreira->id_carreira}}</td>
                    <td><a href="{{route('admin.carreira.show', $carreira->id_carreira)}}">{{$carreira->nm_carreira}}</a></td>
                    <td><a href="{{route('admin.profissao.show', $carreira->profissao->id_profissao)}}">{{$carreira->profissao->nm_profissao}}</a></td>
                    <td>{{$carreira->carreira_log}}</td>
                    <td>{{date('d/m/Y H:i:s', strtotime($carreira->created_at))}}</td>
                    <td>
                        <form action="{{route('admin.carreira.destroy', $carreira->id_carreira)}}" method="post">
                            @csrf
                            @method('DELETE')
                                <div class="btn-group">
                                <a href="{{ route('admin.carreira.status', $carreira->id_carreira) }}" class="btn {{$carreira->ds_active_carreira ? 'btn-warning fa fa-times' : 'btn-success fa fa-check'}}" data-toggle="tooltip" title="{{$carreira->ds_active_carreira ? 'Inativar' : 'Ativar'}}">{{$carreira->ds_active_carreira ? '' : ''}}</a>
                                <a href="{{ route('admin.carreira.edit', $carreira->id_carreira) }}" class="btn btn-primary fa fa-edit"  data-toggle="tooltip" title="Editar"></a>
                                <button class="btn btn-danger fa fa-trash"  data-toggle="tooltip" title="Excluir"></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@include('admin.includes.scripts')
@stop
