@extends('painel-mentor.layouts.master')

@section('meta-title', 'Cadastrar Assuntos - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentor" class="link-breadcrumb">Painel Mentor</a></li>
    <li><a href="/mentor/cadastrar-assuntos" class="link-breadcrumb">Cadastrar Assuntos</a></li>
</ul>
@endsection

@section('content')
<adicionar-assuntos
    :meus="{{Auth::user()->assuntos}}"
    :assuntos="{{$assuntos}}"
    :profissoes="{{$profissoes}}"
    :carreiras="{{$carreiras}}"
    :user="{{Auth::user()}}"
></adicionar-assuntos>
@endsection
