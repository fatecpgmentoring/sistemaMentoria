@extends('admin.layouts.dashboard')
@section('page_heading','Editar Mentorado')
@section('section')

<form action="{{route('admin.mentorado.update', $mentorado->id_mentorado)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="label-control" for="mentorado">Nome:</label>
        <input type="text" class="form-control" value="{{$mentorado->nm_mentorado}}" name="mentorado" id="mentorado">
    </div>
    <!-- <div class="form-group">
        <label class="label-control" for="email">E-mail:</label>
        <input type="email" class="form-control" value="{{$mentorado->usuario->email}}" name="email" id="email">
    </div> -->
    <img src="{{asset($mentorado->ds_foto)}}" width="10%" height="10%">
    <div class="form-group">
        <label class="label-control" for="foto">Foto: </label>
        <input type="file" class="form-control" name="foto" id="foto">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Alterar</button>
    </div>
</form>

@stop
