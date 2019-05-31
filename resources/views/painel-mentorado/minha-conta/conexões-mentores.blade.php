@extends('painel-mentorado.layouts.master')

@section('meta-title', 'Minhas Conexões - Painel Mentorado | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentorado" class="link-breadcrumb">Painel Mentorado</a></li>
    <li><a href="/mentorado/conexoes" class="link-breadcrumb">Conexões</a></li>
</ul>
@endsection

@section('content')

<conexoes-mentores></conexoes-mentores>

@endsection
