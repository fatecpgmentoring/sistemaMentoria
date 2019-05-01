@extends('painel-mentorado.master')

@section('meta-title', 'Sisscon | Mentoring')
@section('meta-desc', '')

@section('content')

<!-- HEADER --> 
@include('painel-mentorado.includes.header')

<!-- CONSULTANTS -->
@include('site.homepage.sections.consultants')


@endsection