@extends('admin.layouts.dashboard')
@section('page_heading','Cadastrar  Assunto e seu Usuario')
@section('section')
<form action="{{route('admin.usuario.assunto.add')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="label-control" for="usuario">Usuario:</label>
            <select class="form-control" name="usuario" id="usuario">
                <option value="">Selecione...</option>
                @foreach ($mentores as $mentor)
                    <option value="{{ $mentor->usuario_id_usuario }}">{{ $mentor->nm_mentor }}</option>
                @endforeach
                @foreach ($mentorados as $mentorado)
                    <option value="{{ $mentorado->usuario_id_usuario }}">{{ $mentorado->nm_mentorado }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="label-control" for="assunto">Assunto:</label>
            <select class="form-control" name="assunto" id="assunto">
                <option value="">Selecione...</option>
                @foreach ($assuntos as $assunto)
                    <option value="{{ $assunto->id_assunto }}">{{ $assunto->nm_assunto }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Cadastrar</button>
        </div>
    </form>
@stop
