<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <style>
	.navbar-mentorado { 
		background-color:rgb(0,177,177);
}		

	.nav-link-mentorado {
		color:white;
}

	#menu-principal {
	background:lime;
	height:100px;
	width:100px;
	
}
</style>
  
  
  
</head>
<script> 
$(document).ready(function(){
	$("#menu-principal").hide();
  
	$("#botao").click(function(){
		if (document.getElementById("menu-principal").style.width == '0px') {
	//   $("div").animate({left: '250px'});
	$("menu-principal").animate({width: '100px'});
	$(".menu-link").show(400);
  } else {
		//$("div").animate({left: '0px'});
		$("#menu-principal").animate({width: '0px'});
		$(".menu-link").hide();
		}
  });
});menu-principal

</script> 

</head>
<body> -->

<header>
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#"><img src="" alt="Logo" style="width:40px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color:red; background-color:red;"></span>
  </button>
	
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown  
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Sair</a>
        </div>
		
		</div>
      </li>
</nav>
</header>

<!--
<button id="botao">V</button>
<br><br>

<div id="menu-principal">
<a class="menu-link" href="#">link</a><br>
<a class="menu-link" href="#">link</a><br>
<a class="menu-link" href="#">link</a><br>
</div>




</body>
</html> -->