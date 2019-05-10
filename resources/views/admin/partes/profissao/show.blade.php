@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Profissão')
@section('section')

<div class="form-group">
    <label class="label-control" for="profissao">Profissão:</label>
    <ul>
        <li>{{$profissao->nm_profissao}}</li>
    </ul>
</div>
<div class="form-group">
        <label class="label-control" for="carreira">Carreiras e Assuntos:</label>
        <ul>
            @foreach ($profissao->carreiras as $carreira)
                <li><a href="{{route('admin.carreira.show', $carreira->id_carreira)}}">{{$carreira->nm_carreira}}</a></li>
                <ul>
                @foreach($carreira->assuntos as $assunto)
                <li><a href="{{route('admin.assunto.show', $assunto->id_assunto)}}">{{$assunto->nm_assunto}}</a></li>
                @endforeach
                </ul>
            @endforeach
        </ul>
    </div>
@include('admin.includes.scripts')

@stop
