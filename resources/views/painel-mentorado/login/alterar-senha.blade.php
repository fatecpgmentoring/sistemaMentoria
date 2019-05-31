@extends('painel-mentor.layouts.master')

@section('meta-title', 'Alterar Senha - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li><a href="/" class="link-breadcrumb">Home</a></li>
    <li><a href="/mentorado" class="link-breadcrumb">Painel Mentorado</a></li>
    <li><a href="/mentorado/alterar-senha" class="link-breadcrumb">Alterar Senha</a></li>
</ul>
@endsection

@section('content')
<section id="minha-conta">
    <div class="wrap-rounded-column">
        <div class="col-md-6 p-0">
            <div class="form-box pwd">
            @include('site.includes.msgs')
                <h2 class="title">Alterar Senha</h2>
                <form action="#" method="post" class="default">
                @csrf
                    <div class="form-group">
                        <label for="password1">Senha Atual</label>
                        <input type="password" id="password1" name="senha_atual" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_check">Nova Senha</label>
                        <input type="password" id="password_check" name="nova_senha" class="form-control" required>
                        <div class="forca-senha">
                            Dificuldade de senha: <span>aae</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password3">Confirmar Nova Senha</label>
                        <input type="password" id="password3" name="nova_senha_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="mt-3">Alterar Senha</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
