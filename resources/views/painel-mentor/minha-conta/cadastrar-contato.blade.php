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
      <select onchange="mostraLogo(this.value);" class="form-control" id="tipo-contato" name="tipo-contato">
             <option>LinkedIn</option>
             <option>Whatsapp</option>
             <option>Facebook</option>
             <option>Telegram</option>
             <option>Instagram</option>
             <option>Telefone</option>
             <option>Celular</option>
             <option>Email</option>
             <option>Outro</option>              
           </select>
          </div>
        </div>
		<div class="col-sm-3">			
  				<div class="form-group">
    			<label for="Nome">Nome</label>
    			<input type="text" class="form-control" id="nome-contato" placeholder="Nome">
  				</div>  			
		</div>	

      <div class="col-sm-6">
        <table class="table mentor">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img src="" id="logo-contato"></td>
        <td><button class="btn btn-warning">Alterar</button></td>
        <td><button class="btn btn-danger">Excluir</button></td>
      </tr>     
    </tbody>
  </table>

      </div>  
		
      	</form>
      </div>    
    </div>    
    </div>   

@endsection

@section('js') 
<script type="text/javascript">
  function mostraLogo(valor) {

    //valor = document.getElementById("tipo-contato").value;
    if (valor == "LinkedIn") {
      document.getElementById("logo-contato").src ="/images/icones/linkedin.png";
    } else if (valor == "Whatsapp") {
      document.getElementById("logo-contato").src ="/images/icones/zap.png";
      } else if (valor == "Facebook") {
        document.getElementById("logo-contato").src ="/images/icones/fb.png";        
        } else if (valor == "Telegram") {
          document.getElementById("logo-contato").src ="/images/icones/teleg.png";
        } else if (valor == "Instagram") {
          document.getElementById("logo-contato").src ="/images/icones/insta.png";
          } else if (valor == "Telefone") {
            document.getElementById("logo-contato").src ="/images/icones/tele.png";
              } else if (valor == "Celular") {
            document.getElementById("logo-contato").src ="/images/icones/cel.png";
          } else if (valor == "Email") {
            document.getElementById("logo-contato").src ="/images/icones/mail.png";
          } else {
              document.getElementById("logo-contato").src ="/images/icones/outro.png";
          }
    }





  


</script>
@endsection






