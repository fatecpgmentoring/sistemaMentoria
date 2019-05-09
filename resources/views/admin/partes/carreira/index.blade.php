@extends('admin.layouts.dashboard')
@section('page_heading','Listar Carreiras')
@section('section')

<table class="table">
        <thead>
            <th>#</th>
            <th>Carreira</th>
            <th>Profissão</th>
            <th>Assuntos</th>
            <th>Criado por</th>
            <th>Criado em</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($carreiras as $carreira)
                <tr>
                    <td>{{$carreira->id_carreira}}</td>
                    <td>{{$carreira->nm_carreira}}</td>
                    <td>{{$carreira->profissao->nm_profissao}}</td>
                    <td>
                        <ul>
                            @foreach ($carreira->assuntos as $assunto)
                                <li>{{$assunto->nm_assunto}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$carreira->carreira_log}}</td>
                    <td>{{$carreira->created_at}}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-warning">{{$carreira->ds_active_carreira ? 'Desativar' : 'Ativar'}}</button>
                            <button class="btn btn-primary">Alterar</button>
                            <button class="btn btn-danger">Deletar</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@include('admin.includes.scripts')
@stop
