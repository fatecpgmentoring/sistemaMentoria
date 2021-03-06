@extends('site.layouts.master')

@section('meta-title', 'Mentores | Sisscon')
@section('meta-desc', '')

@section('content')
<section id="breadcrumb">
    <div class="container">
        <h1>Mentores</h1>
        <ul>
            <li>Você está em</li>
            <li><a href="/">Home</a></li>
            <li><a href="/mentores">Mentores</a></li>
        </ul>
    </div>
</section>

<section id="consultants" class="inside">
    <div class="container">
        <all-mentores :mentores="{{$mentores}}"></all-mentores>
        {{-- @include('site.includes.listagemMentores') --}}
    </div>
</section>
@endsection
