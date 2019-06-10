@extends('site.layouts.master')

@section('meta-title', ' Home | Sisscon')
@section('meta-desc', '')


@section('content')

<!-- HEADER -->

<section id="breadcrumb">
    <div class="container">
        <h1>Fale Conosco</h1>
        <ul>
            <li>Você está em</li>
            <li><a href="/">Home</a></li>
            <li><a href="/contato">Fale Conosco</a></li>
        </ul>
    </div>
</section>

<!--Fale Conosco -->
@include('site.includes.faleConosco')



@endsection
