@extends('site.layouts.master')

@section('meta-title', ' Home | Sisscon')
@section('meta-desc', '')

@section('content')

<!-- HEADER -->
@include('site.homepage.sections.header')

<!-- CONSULTANTS -->
@include('site.homepage.sections.consultants')

@include('site.homepage.sections.how-it-works')

@endsection
