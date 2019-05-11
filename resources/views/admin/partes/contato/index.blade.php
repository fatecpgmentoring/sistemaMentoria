@extends('admin.layouts.dashboard')
@section('page_heading','Listar Contatos')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Tipo</th>
        <th>Contato</th>
        <th>Mentor</th>
        <th>Criado em</th>
    </thead>
    <tbody>
        @foreach ($contatos as $contato)
            <tr><td>{{$contato->id_contato}}</a></td>
            <td><a href="{{route('admin.contato.show', $contato->id_contato)}}">{{$contato->tipo_contato}}</a></td>
            <td>{{$contato->ds_contato}}</td>
            <td>{{$contato->mentor->nm_mentor}}</td>
            <td>{{date('d/m/Y', strtotime($contato->created_at))}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')

@stop
