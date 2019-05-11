@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Mentorado')
@section('section')

<div class="form-group">
        <label class="label-control" for="mentorado">Mentorado:</label>
        <ul>
            <li>{{$mentorado->nm_mentorado}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="mentorado">Email:</label>
        <ul>
            <li>{{$mentorado->usuario->email}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="mentorado">Status:</label>
        <ul>
            <li>{{$mentorado->usuario->cd_status == 1 ? "Ativo" : "Inativo"}}</li>
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="assunto">Assuntos:</label>
        <ul>
            @foreach ($mentorado->assuntos as $assunto)
                <li><a href="{{route('admin.assunto.show', $assunto->id_assunto)}}">{{$assunto->nm_assunto}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="form-group">
        <label class="label-control" for="assunto">Conexões:</label>
        <ul>
            @foreach ($mentorado->conexoes as $conexao)
                <li>
                    <a href="{{route('admin.conexao.show', $conexao->id_conexao)}}">
                        {{'Mentor: '.$conexao->nm_mentor}} <br>
                        {{'Mentorado: '.$conexao->nm_mentorado}} <br>
                        {{'Assunto: '.$conexao->nm_assunto}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

@stop
