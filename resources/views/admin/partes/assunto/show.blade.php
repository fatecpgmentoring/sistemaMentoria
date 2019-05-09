@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Assunto')
@section('section')

<form>
    <div class="form-group">
        <label class="label-control" for="assunto">Assunto:</label>
        <ul>
            <li>{{$assunto->nm_assunto}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Carreira:</label>
        <ul>
            <li><a href="{{route('admin.carreira.show', $assunto->carreira->id_carreira)}}">{{$assunto->carreira->nm_carreira}}</a></li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Profissao:</label>
        <ul>
            <li><a href="{{route('admin.profissao.show', $assunto->carreira->profissao->id_profissao)}}">{{$assunto->carreira->profissao->nm_profissao}}</a></li>
        </ul>
    </div>
</form>
@include('admin.includes.scripts')

@stop
