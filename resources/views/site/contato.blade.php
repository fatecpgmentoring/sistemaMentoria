@extends('site.layouts.master')

@section('meta-title', ' Home | Sisscon')
@section('meta-desc', '')

@section('content')

<!-- HEADER -->
@include('site.includes.nav')
@include('site.homepage.sections.header')



<!--Fale Conosco -->
@include('site.includes.faleConosco')



@endsection
