@extends('painel-mentorado.layouts.master')

@section('meta-title', 'Painel Mentorado | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li> <a href="/" class="link-breadcrumb">Home</a></li>
    <li> <a href="/mentorado" class="link-breadcrumb">Painel Mentorado</a></li>
</ul>
@endsection

@section('content')
<section id="consultants" class="mt-3">
    <mentores :mentores="{{json_encode($mentores)}}"></mentores>
</section>
@endsection
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
@section('js')

@endsection
