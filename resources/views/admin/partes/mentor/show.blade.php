@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Mentor')
@section('section')

<div class="form-group">
    <label class="label-control" for="mentor">Mentor:</label>
    <ul>
        <li>{{$mentor->nm_mentor}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control" for="mentorado">Email:</label>
    <ul>
        <li>{{$mentor->usuario->email}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control" for="mentorado">Status:</label>
    <ul>
        <li>{{$mentor->usuario->cd_status == 1 ? "Ativo" : "Inativo"}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control" for="assunto">Assuntos:</label>
    <ul>
        @foreach ($mentor->assuntos as $assunto)
            <li><a href="{{route('admin.assunto.show', $assunto->id_assunto)}}">{{$assunto->nm_assunto}}</a></li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    <label class="label-control" for="assunto">Conexões:</label>
    <ul>
        @foreach ($mentor->conexoes as $conexao)
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
