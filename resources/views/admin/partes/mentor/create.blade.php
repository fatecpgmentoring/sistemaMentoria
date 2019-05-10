@extends('admin.layouts.dashboard')
@section('page_heading','Cadastrar Mentor')
@section('section')

<form action="{{route('admin.mentor.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="label-control" for="mentor">Nome:</label>
            <input type="text" class="form-control" name="mentor" id="mentor">
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
            <label class="label-control" for="carreira">Conhecimento de Mercado:</label>
            <select class="form-control"  name="conhecimento" id="conhecimento">
                <option value="">Selecione...</option>
                <option value="1">menos de 1 ano</option>
                <option value="2">de 1 a 3 anos</option>
                <option value="3">de 3 a 6 anos</option>
                <option value="4">de 6 a 10 anos</option>
                <option value="5">de 10 a 15 anos</option>
                <option value="6">de 15 a 20 anos</option>
                <option value="7">mais de 20 anos</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Cadastrar</button>
        </div>
    </form>

@stop
