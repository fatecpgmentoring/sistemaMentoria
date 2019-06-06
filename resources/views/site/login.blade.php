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
                                <label for="nomeusuario">E-mail</label>
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

                    <form action="{{route('cadastrar.site')}}" method="post" class="default" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                    <label for="email">E-mail <span>(Será usado como login)</span></label>
                                    <input type="email" name="email" id="email" class="form-control" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto<span></span></label>
                                <input type="file" name="foto" id="foto" class="form-control" value="" required>
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
                                        <input type="password" name="senha_confirmation" id="pwdcad" class="form-control" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwdcad">Deseja ser Mentor?</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="qrosermentor" value="true" name="queroser">
                                    <label class="custom-control-label" for="qrosermentor">Sim</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="naoqrosermentor" value="false" name="queroser" checked>
                                    <label class="custom-control-label" for="naoqrosermentor">Não</label>
                                </div>
                            </div>
                            <div class="form-group" id="divMentor" hidden="hidden">
                                <label for="conhecimento">Conhecimento</label>
                                <select name="conhecimento" id="conhecimento" class="form-control" value="">
                                    <option value="">Selecione...</option>
                                    <option value="1">menos de 1 ano</option>
                                    <option value="2">de 1 a 3 anos</option>
                                    <option value="3">de 3 a 6 anos</option>
                                    <option value="4">de 6 a 10 anos</option>
                                    <option value="5">de 10 a 15 anos</option>
                                    <option value="6">de 15 a 20 anos</option>
                                    <option value="7">mais de 20 anos</option>
                                </select>
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

@endsection

@section('js')
<script>
    $(document).ready(function()
    {
        $("input[name=queroser]").change(function()
        {
            if($(this).val() == 'true')
            {
                $("#divMentor").prop('hidden', false);
            }
            else
            {
                $("#divMentor").prop('hidden', true);
            }
        });
    });
</script>
@endsection
