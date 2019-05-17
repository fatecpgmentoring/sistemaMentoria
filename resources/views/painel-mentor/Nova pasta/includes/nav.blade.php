<nav id="main-nav">
      <div class="top-line color-theme">
         <div class="container">
            <div class="row">
                
                <div class="col-lg-5 col-md-6 right-move">
                    <form action="{{url('login')}}" class="form-login" method="Post">                        
                        <div class="wrap-input mr-1">
                            <span class="spriting centerY sprite-user1"></span>
                            <input type="text" name="nm_login" placeholder="Login" required>
                        </div>
                        <div class="wrap-input">
                            <span class="spriting centerY sprite-key1"></span>
                            <input type="password" name="cd_senha" placeholder="Senha" required>
                        </div>
                        <button type="submit">ok</button>
                        <a href="/login" class="pwd-forget">Esqueceu sua senha?</a>
                    </form>
                </div>
                <div class="col-lg-2 col-md-3">
                    <a href="/login" class="register-link link-l">
                        cadastro
                    </a>
                </div>

            </div>
         </div>   
      </div>  

      <div class="main-part w-100 navbar-expand-md color-subtheme">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo-box">
                    <a href="/" class="logo">
                        <img src="images/logos/icone-branco.png" class="img-fluid" alt="Logo Tarot Nova Era">

                    </a>
                    <a href="/" class="logo-mobile">
                        <img src="images/logos/icone-branco.png" class="img-fluid" alt="Logo Tarot Nova Era">
                    </a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#navigationComponent">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-md-9 center-auto">
                    <div class="collapse navbar-collapse" id="navigationComponent">
                        <ul class="navbar-nav">
                            <li class="nav-item is-sm">
                                <a class="nav-link" href="/login">Cadastro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/mentores">Mentores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/sobre">Sobre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#how-it-works">Como Funciona</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contato">Contato</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>
