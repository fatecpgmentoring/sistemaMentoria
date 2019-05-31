@extends('site.layouts.master')

@section('meta-title', 'Acesso Restrito | Sisscon')
@section('meta-desc', '')

@section('content')
<section id="breadcrumb">
      <div class="container">
        <h1>Acesso Restrito</h1>
        <ul>
            <li>Você está em</li>
            <li><a href="/">Home</a></li>
            <li><a href="/login">Acesso Restrito</a></li>
        </ul>
      </div>
    </section>

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="wrap">
                        <h2>Já possui cadastro?</h2>
                        <p>Entre para continuar e ter acesso a sua conta.</p>


                        <form action="{{route('login')}}" method="post" class="default">
                            @csrf
                            <div class="form-group">
                                <label for="nomeusuario">Nome</label>
                                <input type="text" name="email" id="nomeusuario" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="pwduser">Senha</label>
                                <input type="password" name="password" id="pwduser" class="form-control" value="" required>
                            </div>
                            <div class="forgot">
                                <p>Esqueceu sua senha? <a href="/recuperar-senha">Clique aqui</a></p>
                            </div>
                            <input type="hidden" value="1" name="telaComprar"/>
                            <div class="text-center">
                                <button type="submit">entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="wrap">
                        <h2>Primeira Vez?</h2>
                        <p>Realize seu cadastro</p>

                    <form action="{{url('cadastrar')}}" method="post" class="default">

                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nm_visitante" id="nome" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                        <label for="emailcad">E-mail</label>
                                        <input type="email" name="email" id="emailcad" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                        <label for="nomeusuario">Nome de Usuário <span>(Será usado como login)</span></label>
                                        <input type="text" name="nm_user_login" id="nomeusuario" class="form-control" value="" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pwdcad">Senha</label>
                                        <input type="password" name="senha" id="pwdcad" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pwdcad">Senha <span>(Confirmar)</span></label>
                                        <input type="password" name="senha" id="pwdcad" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpf_user">CPF</label>
                                        <input type="text" name="cpf" id="cpf_user" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rg_user">RG</label>
                                        <input type="text" name="rg" id="rg_user" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tel_user">Telefone</label>
                                        <input type="tel" name="telefone" id="tel_user" class="form-control" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cel_user">Celular</label>
                                        <input type="tel" name="celular" id="cel_user" class="form-control" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwdcad">Deseja ser Mentor?</label>
                                <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                                        <label class="custom-control-label" for="defaultGroupExample1">Sim</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                                <label class="custom-control-label" for="defaultGroupExample2">Não</label>
                                </div>
                            </div>
                            <input type="hidden" value="1" name="telaComprar"/>
                            <div class="text-center mt">
                                <button type="submit">cadastrar</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
               $("#rg_user").mask('99.999.999-9');
               $("#cpf_user").mask('999.999.999-99');
               $("#tel_user").mask('(99) 9999-9999');
               $("#cel_user").mask('(99) 9999-99999');
               $("#cel_user").blur(function(event){
                   if ($(this).val().length == 15){
                       $("#cel_user").mask('(99) 99999-9999');
                   } else {
                       $("#cel_user").mask('(99) 9999-99999');
                   }
                    });

            });
</script>
@endsection

@section('js')
<script>
    MainObj.events.closedRegisterTab();
</script>
@endsection
