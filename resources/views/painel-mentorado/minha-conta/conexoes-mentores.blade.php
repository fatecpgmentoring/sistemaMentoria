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

<div id="consultants">
    <conexoes-mentores :mentores="{{ json_encode($mentores['dados']) }}" :quantidade="{{ json_encode($mentores['qtd']) }}"></conexoes-mentores>
</div>

@endsection
