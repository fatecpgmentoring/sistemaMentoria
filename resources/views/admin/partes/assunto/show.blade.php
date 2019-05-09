@extends('admin.layouts.dashboard')
@section('page_heading','Assunto')
@section('section')

<form>
    <div class="form-group">
        <label class="label-control" for="assunto">Descrição:</label>
        <input type="text" class="form-control" value="{{$assunto->nm_assunto}}" readonly>
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Carreira:</label>
        <input type="text" class="form-control" value="{{$assunto->carreira->nm_carreira}}" readonly>
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Profissao:</label>
        <input type="text" class="form-control" value="{{$assunto->carreira->profissao->nm_profissao}}" readonly>
    </div>
</form>
@include('admin.includes.scripts')

@stop
