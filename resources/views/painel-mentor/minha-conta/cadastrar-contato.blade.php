@extends('painel-mentor.layouts.master')

@section('meta-title', 'Cadastrar Contato - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentor" class="link-breadcrumb">Painel Mentor</a></li>
    <li><a href="/mentor/cadastrar-contato" class="link-breadcrumb">Cadastrar Contato</a></li>
</ul>
@endsection

@section('content')

<div class="container">
	<div class="row">    
    <div class="col-sm-3">
      <form>
    <div class="form-group">
      <label for="tipo-contato">Tipo de Contato</label>
      <select class="form-control" id="tipo-contato" name="tipo-contato">
             <option></option>
             <option></option>
           </select>
          </div>
        </div>

		<div class="col-sm-3">			
  				<div class="form-group">
    			<label for="Nome">Nome</label>
    			<input type="text" class="form-control" id="nome-contato" placeholder="Nome">
  				</div>  			
		</div>	
		
      	</form>
      </div>    
    </div>    
   

@endsection

