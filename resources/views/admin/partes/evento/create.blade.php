@extends('admin.layouts.dashboard')
@section('page_heading','Cadastrar Evento')
@section('section')

<form action="{{route('admin.evento.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="label-control" for="titulo">Titulo do Evento:</label>
        <input type="text" class="form-control" name="titulo" id="nm_titulo">
    </div>
    <div class="form-group">
        <label class="label-control" for="local">Local do Evento:</label>
        <input type="text" class="form-control" name="local" id="local">
    </div>
    <div class="form-group">
        <label class="label-control" for="evento">Descrição do Evento: </label>
        <input type="text" class="form-control" name="evento" id="evento">
    </div>
    <div class="form-group">
        <label class="label-control" for="inicio">Data de Inicio: </label>
        <input type="text" class="form-control date" name="inicio" id="inicio">
    </div>
    <div class="form-group">
        <label class="label-control" for="fim">Data de Termino: </label>
        <input type="text" class="form-control date" name="fim" id="fim">
    </div>
    <div class="form-group">
        <label class="label-control" for="inicio_hr">Hora de Inicio: </label>
        <input type="text" class="form-control time" name="inicio_hr" id="inicio_hr">
    </div>
    <div class="form-group">
        <label class="label-control" for="fim_hr">Hora de Termino: </label>
        <input type="text" class="form-control time" name="fim_hr" id="fim_hr">
    </div>
    <div class="form-group">
        <label class="label-control" for="max_inscritos">Quantidade Maxima de Inscritos: </label>
        <input type="number" class="form-control" name="max_inscritos" id="max_inscritos">
    </div>
    <div class="form-group">
        <label class="label-control" for="valor">Valor da Entrada: </label>
        <input type="text" class="form-control valor" name="valor" id="valor">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Cadastrar</button>
    </div>
</form>
@include('admin.includes.scripts')

@stop

