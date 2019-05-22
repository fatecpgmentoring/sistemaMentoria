@extends('painel-mentor.layouts.master')

@section('meta-title', 'Cadastrar Assuntos - Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li>Home</li>
    <li>Painel Mentor</li>
    <li>Cadastrar Assuntos</li>
</ul>
@endsection

@section('content')

<div class="assuntos-cad">
	<select name="profissao" id="profissao" class="assuntos-sel">
			<option value="1">Profissão 1</option>
			<option value="2">Profissão 2</option>
			<option value="3">Profissão 3</option>
	</select>
	<select name="carreira" id="carreira" class="assuntos-sel">
			<option value="1">Carreira 1</option>
			<option value="2">Carreira 2</option>
			<option value="3">Carreira 3</option>
	</select>	
</div>

<div class="row">
	<div class="col-xl-5">
		<select name="from[]" id="multiselect1" class="form-control" size="8" multiple="multiple">
			<option value="1">Item 1</option>
			<option value="3">Item 3</option>
			<option value="2">Item 2</option>
		</select>
	</div>
	
	<div class="col-xl-2">
		<button type="button" id="multiselect1_rightAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-forward"></i></button>
		<button type="button" id="multiselect1_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
		<button type="button" id="multiselect1_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
		<button type="button" id="multiselect1_leftAll" class="btn btn-default btn-block"><i class="glyphicon glyphicon-backward"></i></button>
	</div>
	
	<div class="col-xl-5">
		<select name="to[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple"></select>
	</div>
</div>
@endsection

@section('js')
<script>

$(document).ready(function() {   
    $('#multiselect1').multiselect();
    $('#multiselect2').multiselect();
});

</script>
@endsection