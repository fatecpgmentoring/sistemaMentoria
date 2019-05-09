@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Carreira')
@section('section')

<form>
    <div class="form-group">
        <label class="label-control" for="carreira">Carreira:</label>
        <ul>
            <li>{{$carreira->nm_carreira}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="profissao">Profissão:</label>
        <ul>
            <li><a href="{{route('admin.profissao.show', $carreira->profissao->id_profissao)}}">{{$carreira->profissao->nm_profissao}}</a></li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Assuntos:</label>
        <ul>
            @foreach ($carreira->assuntos as $assunto)
                <li><a href="{{route('admin.assunto.show', $assunto->id_assunto)}}">{{$assunto->nm_assunto}}</a></li>
            @endforeach
        </ul>
    </div>
</form>
@include('admin.includes.scripts')

@stop
