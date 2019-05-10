@extends('admin.layouts.dashboard')
@section('page_heading','Cadastrar Mentor')
@section('section')

<form action="{{route('admin.mentor.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="label-control" for="assunto">Nome:</label>
            <input type="text" class="form-control" name="assunto" id="assunto">
        </div>
        <div class="form-group">
                <label class="label-control" for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
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
