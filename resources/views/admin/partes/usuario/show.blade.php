@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Usuario')
@section('section')

    <label class="label-control">Nome: </label>
    {{$usuario->nm_mentorado != null ? $usuario->nm_mentorado : $usuario->nm_mentor != null ? $usuario->nm_mentor : $usuario->cd_role == 3 ? 'Administrador': 'Desevolvedor'}} <br>
    <label class="label-control">E-mail:</label>
    {{$usuario->email}}<br>
    <label class="label-control">Permissão:</label>
    {{$usuario->cd_role == 1 ? 'Mentorado' : $usuario->cd_role == 2 ? 'Mentor' : $usuario->cd_role == 3 ? 'Administrador' : 'Desevolvedor'}}<br>
    <label class="label-control">Vinculo:</label>
    {{$usuario->nm_mentorado != null ? 'Mentorado' : $usuario->nm_mentor != null ? 'Mentor' : $usuario->cd_role == 3 ? 'Administrador': 'Desevolvedor'}}<br>
    @include('admin.includes.scripts')

@stop
