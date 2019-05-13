@extends('admin.layouts.dashboard')
@section('page_heading','Listar Assuntos e seus Usuarios')
@section('section')

<table class="table">
    <thead>
        <th>Nome</th>
        <th>Assunto</th>
    </thead>
    <tbody>
        @foreach ($mentorados as $mentorado)
            @foreach ($mentorado->usuario->assuntos as $assunto)
                <tr>
                    <td><a href="{{route('admin.mentorado.show', $mentorado->id_mentorado)}}">{{$mentorado->nm_mentorado}}</a></td>
                    <td><a href="{{route('admin.assunto.show', $assunto->id_assunto)}}">{{$assunto->nm_assunto}}</a></td>
                </tr>
            @endforeach
        @endforeach
        @foreach ($mentores as $mentor)
            @foreach ($mentor->usuario->assuntos as $assunto)
                <tr>
                    <td><a href="{{route('admin.mentor.show', $mentor->id_mentor)}}">{{$mentor->nm_mentor}}</a></td>
                    <td><a href="{{route('admin.assunto.show', $assunto->id_assunto)}}">{{$assunto->nm_assunto}}</a></td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')

@stop
