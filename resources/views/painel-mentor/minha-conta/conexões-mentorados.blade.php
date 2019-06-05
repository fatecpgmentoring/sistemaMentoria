@extends('painel-mentor.layouts.master')

@section('meta-title', 'Minhas Conexões - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentor" class="link-breadcrumb">Painel Mentor</a></li>
    <li><a href="/mentor/conexoes" class="link-breadcrumb">Conexões</a></li>
</ul>
@endsection

@section('content')
<<<<<<< HEAD
{{--
@php
    $cfiltered = [];
    foreach ($mentores as $c) {
      $cfiltered[] = $c;
    }
@endphp
--}}
=======
>>>>>>> bf366be3e0f4a1998941c1228bb3f3cac181de53
<div id="consultants">
	<conexoes-mentorados :mentorados="{{ json_encode($mentorados) }}"></conexoes-mentorados>
</div>
@endsection
