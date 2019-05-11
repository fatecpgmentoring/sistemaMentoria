@extends('admin.layouts.dashboard')
@section('page_heading','Cadastrar Mentorado')
@section('section')
<form action="{{route('admin.mentorado.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="label-control" for="mentorado">Nome:</label>
            <input type="text" class="form-control" name="mentorado" id="mentorado">
        </div>
        <div class="form-group">
            <label class="label-control" for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <input type="hidden" name="status" value="1" id="status">
        <input type="hidden" name="role" value="1" id="role">
        <div class="form-group">
            <label class="label-control" for="carreira">Senha:</label>
            <input type="password" class="form-control" name="senha" id="senha">
        </div>
        <div class="form-group">
            <label class="label-control" for="carreira">Confirmação de Senha:</label>
            <input type="password" class="form-control" name="senha_confirmation" id="senha_confirmation">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Cadastrar</button>
        </div>
    </form>
@stop
