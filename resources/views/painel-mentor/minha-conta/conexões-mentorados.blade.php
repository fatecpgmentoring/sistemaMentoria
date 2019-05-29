@extends('painel-mentor.layouts.master')

@section('meta-title', 'Conexões - Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li>Home</li>
    <li>Painel Mentor</li>
    <li>Conexões</li>
</ul>
@endsection

@section('content')
{{--
@php
    $cfiltered = [];
    // foreach ($mentores as $c) {
    //     $cfiltered[] = $c;
    // }
@endphp
--}}
<div id="consultants">
{{--	<conexoes-mentorados :mentoresConexao="{{ json_encode($cfiltered) }}"></conexoes-mentorados> --}}
        <conexoes-mentorados-test></conexoes-mentorados-test>
</div>
@endsection
