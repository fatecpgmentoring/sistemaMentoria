@extends('admin.layouts.dashboard')
@section('page_heading','Carreiras')
@section('section')
<form action="{{route('admin.profissao.update', $profissao->id_profissao)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="label-control" for="profissao">Descrição:</label>
        <input type="text" class="form-control" value="{{$profissao->nm_profissao}}" name="profissao" id="profissao">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Enviar</button>
    </div>
</form>

@include('admin.includes.scripts')
@stop
