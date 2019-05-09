@extends('admin.layouts.dashboard')
@section('page_heading','Assunto')
@section('section')

<form action="{{route('admin.assunto.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="label-control" for="assunto">Descrição:</label>
        <input type="text" class="form-control" name="assunto" id="assunto">
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Carreira:</label>
        <select class="form-control" name="carreira" id="carreira">
            <option value="">Selecione...</option>
            @foreach ($carreiras as $carreira)
                <option value="{{$carreira->id_carreira}}">{{$carreira->nm_carreira - $carreira->profissao->nm_profissao}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Cadastrar</button>
    </div>
</form>
@include('admin.includes.scripts')

@stop
