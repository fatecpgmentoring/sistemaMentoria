@extends('admin.layouts.dashboard')
@section('page_heading','Editar Assunto')
@section('section')

<form action="{{route('admin.assunto.update', $assunto->id_assunto)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="label-control" for="assunto">Descrição:</label>
        <input type="text" class="form-control" value="{{$assunto->nm_assunto}}" name="assunto" id="assunto">
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Carreira:</label>
        <select class="form-control" name="carreira" id="carreira">
            <option value="">Selecione...</option>
            @foreach ($carreiras as $carreira)
                <option value="{{$carreira->id_carreira}}" {{$assunto->carreira_id_carreira == $carreira->id_carreira ? 'selected' : ''}}>{{$carreira->nm_carreira.' - '.$carreira->profissao->nm_profissao}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Alterar</button>
    </div>
</form>
@include('admin.includes.scripts')

@stop
