@extends('painel-mentor.layouts.master')

@section('meta-title', 'Atendimento Finalizado - Painel Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li>Home</li>
    <li>Relatório</li>
    <li>Atendimento 1</li>
</ul>
@endsection
@section('content')

<section id="atendimento">
    <div class="row">
        <aside class="col-md-3 atendimento-info-box">
            <div class="wrap">
                <h3 class="title">Atendimento</h3>
                <ul class="atendimento-list">
                    <li>
                        <span class="lbl">ID</span>
                        <span class="value">1</span>
                    </li>
                    <li>
                        <span class="lbl">Início</span>
                        <span class="value">10/04/2019 14:23:45</span>
                    </li>
                    
                    <li>
                        <span class="lbl">Cobrança iniciada?</span>
                        <span class="value">sim</span>
                    </li>
                    <li>
                        <span class="lbl">início da cobrança</span>
                        <span class="value">10/04/2019 14:23:45</span>
                    </li>
                    <li>
                        <span class="lbl">Término do atendimento</span>
                        <span class="value">10/04/2019 14:23:45</span>
                    </li>
                    <li>
                        <span class="lbl">Duração</span>
                        <span class="value">14:23:45</span>
                    </li>
                    <li>
                        <span class="lbl">Comissão</span>
                        <span class="value">R$ 34,43</span>
                    </li>
                  
                </ul>
                <h3 class="title">Cliente</h3>
                <span class="name">Aroldo</span>
            </div>
        </aside>

        <div class="col-md-9">
            

            <div class="status-box finalizado-cliente wrap">
                <div class="padded">
                    <div class="main">
                        <div class="icon"></div>
                        <p>
                            Atendimento finalizado por
                            <span>Cliente</span>
                        </p>
                    </div>
                </div>
                <div class="watchout">
                    <h5>Atenção</h5>
                    <p>Atendimento Finalizado</p>
                </div>
            </div>

            <!-- Table Starts here -->
            <div class="chat-talk-box wrap">
                <h4>Mensagens Enviadas:</h4>
                <!-- TABLE -->
                
                <div id="table-block" class="mt-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Origem</th>
                                    <th>Data</th>
                                    <th>Mensagem</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td><span class="user-cliente">Cliente</span></td>
                                    <td>14:23:45</td>
                                    <td>Alguma coisa</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div><!-- FIM TABLE -->
                
            </div>
        </div>
    </div>
</section>

@endsection
