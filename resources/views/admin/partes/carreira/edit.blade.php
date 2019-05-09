@extends('admin.layouts.dashboard')
@section('page_heading','Editar Carreiras')
@section('section')

<form action="{{route('admin.carreira.update', $carreira->id_carreira)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="label-control" for="carreira">Descrição:</label>
        <input type="text" class="form-control" value="{{$carreira->nm_carreira}}" name="carreira" id="carreira">
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Carreira:</label>
        <select class="form-control" name="carreira" id="carreira">
            <option value="">Selecione...</option>
            @foreach ($profissoes as $profissao)
                <option value="{{$profissao->id_profissao}}" {{$carreira->profissao_id_profissao == $profissao->id_profissao ? 'selected' : ''}}>{{$profissao->nm_profissao}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Alterar</button>
    </div>
</form>
@include('admin.includes.scripts')

@stop
