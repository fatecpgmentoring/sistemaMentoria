@extends('site.layouts.master')

@section('meta-title', 'Mentores | SISCCON')
@section('meta-desc', '')

@section('content')
<meta property="og:url"                content="{{url('/consultores/show/'.$mentor->id_mentor)}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Venha ter um mentor no SISCCON" />
<meta property="og:description"        content="Venha ser mentorado do {{$mentor->nm_mentor}} no site SISCCON" />
<meta property="og:image"              content="{{url('/images/especialistas/'.$mentor->ds_foto)}}" />
<section id="breadcrumb">
    <div class="container" >
        <h1>Mentores</h1>
        <ul>
            <li>Você está em</li>
            <li><a href="/">Home</a></li>
            <li><a href="/mentores">Mentores</a></li>
        </ul>
    </div>
</section>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<section id="consultants-show">
    <!-- Perfil -->
    @php
        $assuntos = "";
        $cont = 0;
        foreach ($mentor->usuario->assuntos as $c) {
            if($cont == 0) $assuntos.=$c->nm_assunto;
            else if($mentor->usuario->assuntos->count() == $cont+1) $assuntos.=", ".$c->nm_assunto.".";
            else $assuntos.=", ".$c->nm_assunto;
            $cont++;
        }
        @endphp
    <show-mentor :mentor="{{ $mentor }}" assuntos="{{$assuntos}}" contatos="{{$mentor->contatos}}"></show-mentor>
</section>
@endsection

@section('js')

<script>
    //MainObj.events.ratingstar();
</script>
@endsection
