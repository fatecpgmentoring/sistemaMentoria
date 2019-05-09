@extends('admin.layouts.dashboard')
@section('page_heading','Listar Carreiras')
@section('section')

<table class="table">
        <thead>
            <th>#</th>
            <th>Descrição</th>
            <th>Profissão</th>
            <th>Assuntos</th>
            <th>Criado por</th>
            <th>Criado em</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            @foreach ($carreiras as $carreira)
                <td>{{$carreira->id_carreira}}</td>
                <td>{{$carreira->nm_carreira}}</td>
                <td>{{$carreira->profissao->nm_profissao}}</td>
                <td>
                    <select>
                        <option>Lista de carreiras</option>
                        @foreach ($carreira->assuntos as $assunto)
                            <option>{{$assunto->nm_assunto}}</option>
                        @endforeach
                    </select>
                </td>
                <td>{{$carreira->carreira_log}}</td>
                <td>{{$carreira->created_at}}</td>
                <td><button></button></td>
                <td><button></button></td>
            @endforeach
        </tbody>
    </table>
@stop
