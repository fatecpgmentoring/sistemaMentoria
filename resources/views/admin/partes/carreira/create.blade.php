@extends('admin.layouts.dashboard')
@section('page_heading','Cadastrar Carreira')
@section('section')

<form action="{{route('admin.carreira.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="label-control" for="carreira">Descrição:</label>
        <input type="text" class="form-control" name="carreira" id="carreira">
    </div>
    <div class="form-group">
        <label class="label-control" for="profissao">Carreira:</label>
        <select class="form-control" name="profissao" id="profissao">
            <option value="">Selecione...</option>
            @foreach ($profissoes as $profissao)
                <option value="{{$profissao->id_profissao}}">{{$profissao->nm_profissao}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Cadastrar</button>
    </div>
</form>
@include('admin.includes.scripts')

@stop
