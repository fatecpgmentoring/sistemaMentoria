@extends('admin.layouts.dashboard')
@section('page_heading','Listar Inscritos')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Pagamento</th>
        <th>Evento</th>
        <th>Criado em</th>
    </thead>
    <tbody>
        @foreach ($inscritos as $inscrito)
            <tr><td>{{$inscrito->id_inscrito}}</a></td>
            <td><a href="{{route('admin.inscrito.show', $inscrito->id_inscrito)}}">{{$inscrito->nm_inscrito}}</a></td>
            <td>{{$inscrito->nm_email}}</td>
            <td>{{$inscrito->ds_status_pagamento}}</td>
            <td>{{$inscrito->evento->nm_titulo}}</td>
            <td>{{date('d/m/Y', strtotime($inscrito->created_at))}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')

@stop
