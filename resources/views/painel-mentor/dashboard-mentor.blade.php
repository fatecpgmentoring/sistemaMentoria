@extends('painel-mentor.layouts.master')

@section('meta-title', 'Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li>Home</li>
    <li>Painel Mentor</li>
</ul>
@endsection

@section('content')
<section class="connections-infos">
    <!--
    <div id="vue-app">
        <consultant-notification consultantid="{{--Auth::user()->cd_usuario_fk--}}"></consultant-notification>
    </div>
    -->
    <div class="row r-m">
        <div class="col-md-6">
            <div class="wrap-rounded-column">
                <h4>Seu status</h4>
                <div class="status-radio-box">
                    <div class="btn-box online">
                        <input type="radio" name="status" id="statusOnline" checked='true' value="online">
                        <div class="text">Online</div>
                    </div>
                    <div class="btn-box ocupado">
                        <input type="radio" name="status" id="statusOcupado" checked='true' value="ocupado">
                        <div class="text">ocupado</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wrap-rounded-column">
                <h4>Seus créditos</h4>
                <p class="color-green paragraph text-uppercase mb-1">Créditos disponíveis</p>
                    <span class="total-credit">24 Pila</span>
                <div class="text-center">
                    <a href=#" class="btn-consult"><i class="fa fa-search" aria-hidden="true"></i> Consultar relatórios</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section id="search-hangs">
    <div class="container-fluid">
        <label for="search" class="mb-0">Últimos atendimentos</label>
        <form action="" method="post" id="formularioPesquisa">
            <div class="search-wrap">
                <input type="text" id="search" name="search">
                <button id="pesquisa" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>


        <a href="/mentor/atendimento/relatorios" class="btn-consult">ver todos atendimentos</a>
    </div>
</section>

<!-- table listing -->
<div id="table-block">
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Visitante</th>
                        <th>Data</th>
                        <th>Duração</th>
                        <th>Comissão Ganha</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>Aroldo</td>
                            <td>10/04/2019</td>
                            <td>20 dias</td>
                            <td>50 Pila</td>
                        <td><a href="/mentor/atendimento/visualizar/1" class="btn-details"><i class="fa fa-search" aria-hidden="true"></i><div>Ver Detalhes</div></a></td>
                        </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
@section('js')

@endsection
