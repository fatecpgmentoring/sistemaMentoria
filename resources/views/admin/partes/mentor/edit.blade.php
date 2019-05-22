@extends('admin.layouts.dashboard')
@section('page_heading','Editar Mentor')
@section('section')

<form action="{{route('admin.mentor.update',$mentor->id_mentor)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="label-control" for="mentor">Nome:</label>
        <input type="text" class="form-control" value="{{$mentor->nm_mentor}}" name="mentor" id="mentor">
    </div>
    <div class="form-group">
        <label class="label-control" for="email">E-mail:</label>
        <input type="email" class="form-control" value="{{$mentor->usuario->email}}" name="email" id="email">
    </div>
    <img src="{{asset($mentor->ds_foto)}}" width="10%" height="10%">
    <div class="form-group">
        <label class="label-control" for="foto">Foto: </label>
        <input type="file" class="form-control" name="foto" id="foto">
    </div>
    <div class="form-group">
        <label class="label-control" for="carreira">Conhecimento de Mercado:</label>
        <select class="form-control"  name="conhecimento" id="conhecimento">
            <option value="">Selecione...</option>
            <option value="1" {{$mentor->nv_conhecimento == 1 ? 'selected' : ''}}>menos de 1 ano</option>
            <option value="2" {{$mentor->nv_conhecimento == 2 ? 'selected' : ''}}>de 1 a 3 anos</option>
            <option value="3" {{$mentor->nv_conhecimento == 3 ? 'selected' : ''}}>de 3 a 6 anos</option>
            <option value="4" {{$mentor->nv_conhecimento == 4 ? 'selected' : ''}}>de 6 a 10 anos</option>
            <option value="5" {{$mentor->nv_conhecimento == 5 ? 'selected' : ''}}>de 10 a 15 anos</option>
            <option value="6" {{$mentor->nv_conhecimento == 6 ? 'selected' : ''}}>de 15 a 20 anos</option>
            <option value="7" {{$mentor->nv_conhecimento == 7 ? 'selected' : ''}}>mais de 20 anos</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Alterar</button>
    </div>
</form>

@stop
