@extends('admin.layouts.dashboard')
@section('page_heading','Listar Comentarios')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Comentario</th>
        <th>Mentor</th>
        <th>Mentorado</th>
        <th>Publicado em</th>
    </thead>
    <tbody>
        @foreach ($comentarios as $comentario)
            <tr><td>{{$comentario->id_comentario}}</td>
            <td><a href="{{route('admin.comentario.show', $comentario->id_comentario)}}">{{$comentario->ds_comentario}}</a></td>
            <td>{{$comentario->mentor->nm_mentor}}</td>
            <td>{{$comentario->mentorado->nm_mentorado}}</td>
            <td>{{date('d/m/Y H:i:s', strtotime($comentario->created_at))}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')

@stop
