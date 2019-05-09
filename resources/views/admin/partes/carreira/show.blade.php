@extends('admin.layouts.dashboard')
@section('page_heading','Carreira')
@section('section')

<form>
    <div class="form-group">
        <label class="label-control" for="carreira">Descrição:</label>
        <input type="text" class="form-control" value="{{$carreira->nm_carreira}}">
    </div>
    <div class="form-group">
        <label class="label-control" for="profissao">Carreira:</label>
        <input type="text" class="form-control" value="{{$carreira->profissao->nm_profissao}}">
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Assuntos:</label>
        <ul>
            @foreach ($carreira->assuntos as $assunto)
                <li>{{$assunto->nm_assunto}}</li>
            @endforeach
        </ul>
    </div>
</form>
@include('admin.includes.scripts')

@stop
