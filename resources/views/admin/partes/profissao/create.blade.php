@extends('admin.layouts.dashboard')
@section('page_heading','Cadastrar Profissão')
@section('section')
<form action="{{route('admin.profissao.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="label-control" for="profissao">Descrição:</label>
        <input type="text" class="form-control" name="profissao" id="profissao">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Cadastrar</button>
    </div>
</form>

@include('admin.includes.scripts')
@stop
