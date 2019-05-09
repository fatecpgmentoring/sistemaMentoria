@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Profissão')
@section('section')

<form>
    <div class="form-group">
        <label class="label-control" for="profissao">Descrição:</label>
        <input type="text" class="form-control" value="{{$profissao->nm_profissao}}" readonly>
    </div>
    <div class="form-group">
            <label class="label-control" for="carreira">Assuntos:</label>
            <ul>
                @foreach ($profissao->carreiras as $carreira)
                    <li>{{$carreira->nm_carreira}}</li>
                @endforeach
            </ul>
        </div>
</form>
@include('admin.includes.scripts')

@stop
