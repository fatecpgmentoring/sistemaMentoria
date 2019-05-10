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
                                <a href="{{ route('admin.carreira.status', $carreira->id_carreira) }}" class="btn {{$carreira->ds_active_carreira ? 'btn-warning fa fa-times' : 'btn-success fa fa-check'}}">{{$carreira->ds_active_carreira ? '' : ''}}</a>
                                <a href="{{ route('admin.carreira.edit', $carreira->id_carreira) }}" class="btn btn-primary fa fa-edit"></a>
                                <button class="btn btn-danger fa fa-trash"></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@include('admin.includes.scripts')
@stop
