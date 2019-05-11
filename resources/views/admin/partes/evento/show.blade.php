@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Evento')
@section('section')

<ul>
    <label class="label-control" for="titulo">Titulo do Evento:</label>
    <li>{{$evento->nm_titulo}}</li>
    <label class="label-control" for="local">Local do Evento:</label>
    <li>{{$evento->ds_local}}</li>
    <label class="label-control" for="evento">Descrição do Evento: </label>
    <li>{{$evento->ds_evento}}</li>
    <label class="label-control" for="inicio">Data: </label>
    <li>{{$evento->dt_inicio." ".$evento->dt_fim}}</li>
    <label class="label-control" for="inicio_hr">Horario: </label>
    <li>{{$evento->hr_inicio." ".$evento->hr_fim}}</li>
    <label class="label-control" for="max_inscritos">Incritos (Atual/Max): </label>
    <li>{{$evento->qnt_inscritos." / ".$evento->qnt_max_inscritos}}</li>
    <label class="label-control" for="valor">Valor da Entrada: </label>
    <li>{{$evento->$evento->vl_inscricao}}</li>
</ul>

    @include('admin.includes.scripts')

@stop
