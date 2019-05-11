@extends('admin.layouts.dashboard')
@section('page_heading','Visualizar Inscrito')
@section('section')

<div class="form-group">
    <label class="label-control">Nome: </label>
    <ul>
        <li>{{$inscrito->nm_inscrito}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">CPF:</label>
    <ul>
        <li>{{$inscrito->cd_cpf}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">RG:</label>
    <ul>
        <li>{{$inscrito->cd_rg}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">CEP:</label>
    <ul>
        <li>{{$inscrito->cd_cep}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">Email:</label>
    <ul>
        <li>{{$inscrito->nm_email}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">Endereço:</label>
    <ul>
        <li>{{$inscrito->ds_endereco}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">Estado:</label>
    <ul>
        <li>{{$inscrito->nm_estado}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">Data de Nascimento:</label>
    <ul>
        <li>{{date('d/m/Y', strtotime($inscrito->dt_nascimento))}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">Status Pagamento:</label>
    <ul>
        <li>{{$inscrito->ds_status_pagamento == 0 ? "Aguardando pagamento" : $inscrito->ds_status_pagamento == 1 ? "Aceito" : "Cancelado"}}</li>
    </ul>
</div>
<div class="form-group">
    <label class="label-control">Evento:</label>
    <ul>
        <li>{{$inscrito->evento->nm_titulo}}</li>
    </ul>
</div>
@include('admin.includes.scripts')


@stop
