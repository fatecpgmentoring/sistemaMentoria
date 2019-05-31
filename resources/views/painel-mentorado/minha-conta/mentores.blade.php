@extends('painel-mentorado.layouts.master')

@section('meta-title', 'Mentores - Painel Mentorado | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentorado" class="link-breadcrumb">Painel Mentorado</a></li>
    <li><a href="/mentorado/mentores" class="link-breadcrumb">Mentores</a></li>
</ul>
@endsection

@section('content')

<mentores></mentores>

@endsection
