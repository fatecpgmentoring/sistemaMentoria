@extends('painel-mentor.layouts.master')

@section('meta-title', 'Listar Comentários - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentor" class="link-breadcrumb">Painel Mentor</a></li>
    <li><a href="/mentor/comentarios" class="link-breadcrumb">Listar Comentários</a></li>
</ul>
@endsection

@section('content')

<listar-comentarios :comentarios="{{json_encode($comentarios)}}" :quantidade="{{$count}}"></listar-comentarios>

@endsection
