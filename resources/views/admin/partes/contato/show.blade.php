@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Contato')
@section('section')

<div class="form-group">
    <label class="label-control" for="carreira">Mentor:</label>
    <ul>
        <li><a href="{{route('admin.mentor.show', $contato->mentor->id_mentor)}}">{{$contato->mentor->nm_mentor}}</a></li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control" for="carreira">Tipo:</label>
    <ul>
        <li>{{$contato->tipo_contato}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control" for="profissao">Contato:</label>
    <ul>
        <li>{{$contato->ds_contato}}</li>
    </ul>
</div>
@include('admin.includes.scripts')

@stop
