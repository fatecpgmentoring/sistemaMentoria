@extends('site.layouts.master')

@section('meta-title', 'Consultores | Tarot Nova Era')
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
        @php
        $cfiltered = [];
        foreach ($mentores as $c) {
            $cfiltered[] = $c;
        }
        @endphp
        <all-mentores :mentores="{{ json_encode($cfiltered) }}"></all-mentores>

    </div>
</section>
@endsection