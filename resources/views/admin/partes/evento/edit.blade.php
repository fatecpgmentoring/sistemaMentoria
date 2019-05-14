@extends('admin.layouts.dashboard')
@section('page_heading','Editar Evento')
@section('section')


<form action="{{route('admin.evento.update')}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="label-control" for="titulo">Titulo do Evento:</label>
        <input type="text" class="form-control" value="{{$evento->nm_titulo}}" name="titulo" id="nm_titulo">
    </div>
    <div class="form-group">
        <label class="label-control" for="evento">Descrição do Evento: </label>
        <input type="text" class="form-control" value="{{$evento->ds_evento}}" name="evento" id="evento">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Cadastrar</button>
    </div>
</form>
@include('admin.includes.scripts')

@stop
