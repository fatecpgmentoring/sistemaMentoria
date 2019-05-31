@extends('painel-mentor.layouts.master')

@section('meta-title', 'Chat - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentor"class="link-breadcrumb">Painel Mentor</a></li>
    <li><a href="/mentor/chat"class="link-breadcrumb">Chat</a></li>
</ul>
@endsection
@section('content')
<chat-mentor></chat-mentor>

@endsection
