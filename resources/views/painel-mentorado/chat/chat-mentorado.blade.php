@extends('painel-mentorado.layouts.master')

@section('meta-title', 'Chat - Painel Mentorado | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentorado"class="link-breadcrumb">Painel Mentorado</a></li>
    <li><a href="/mentorado/chat"class="link-breadcrumb">Chat</a></li>
</ul>
@endsection
@section('content')
<chat-mentorado></chat-mentorado>

@endsection
