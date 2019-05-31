@extends('painel-mentor.master')

@section('meta-title', ' Home | Sisscon')
@section('meta-desc', '')

@section('content')

<!-- HEADER -->
@include('site.homepage.sections.header')

<!-- CONSULTANTS -->
@include('site.homepage.sections.consultants')


@endsection
