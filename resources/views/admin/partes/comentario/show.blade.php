@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Comentario')
@section('section')

    <div class="form-group">
        <label class="label-control">Comentario:</label>
        <ul>
            <li>{{$comentario->ds_comentario}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control">Mentor:</label>
        <ul>
            <li><a href="{{route('admin.mentor.show', {{$comentario->mentor->id_mentor}})}}">{{$comentario->mentor->nm_mentor}}</a></li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control">Mentorado:</label>
        <ul>
            <li><a href="{{route('admin.mentorado.show', {{$comentario->mentorado->id_mentorado}})}}">{{$comentario->mentorado->nm_mentorado}}</a></li>
        </ul>
    </div>
@include('admin.includes.scripts')


@stop
