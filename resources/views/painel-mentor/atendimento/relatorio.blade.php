@extends('painel-mentor.layouts.master')

@section('meta-title', 'Relatório Atendimento - Mentor | Sisscon')
@section('meta-desc', '')

@section('meta-desc', '')

@section('breadcrumb')
<ul class="breadcrumb-list">
    <li>Você está em</li>
    <li>Home</li>
    <li>Relatório</li>
    <li>Atendimento</li>
</ul>
@endsection

@section('content')
<section id="credito-transferencias">
    <div class="search-date-box ml-0 mr-0">
        <div class="wrap-search w-100">
            <form action="" method="get">
                <label for="inicio">Buscar por data</label>
                <div class="wrap-input search">
                    <input type="text" id="search" name="termo" value="" placeholder="Buscar Atendimento">
                </div>
                <div class="wrap-input">                    
                    <input type="text" id="data-inicio" name="dt_inicio" placeholder="Início" value="2000-12-12">
                    <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                </div>
                <div class="wrap-input">                    
                    <input type="text" id="data-fim" name="dt_final" placeholder="Fim" value="2050-12-12">
                    <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                </div>
                <button type="submit">Filtrar</button>
                <a id="limpar" class="filtroRemover">limpar filtros</a>
            </form>
        </div>
    </div>

    <div class="wrap-rounded-column pt-0 pl-0 pr-0 mb-5">        
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
                                <th>Comissão</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>1</td>
                                <td>Calvin</td>
                                <td>14:23:45</td>
                                <td>--:--:-- </td>
                                <td>R$ 24,34</td>
                                <td><a href="/mentor/atendimento/visualizar/1" class="btn-details"><i class="fa fa-search" aria-hidden="true"></i><div class="text-uppercase">Ver Detalhes</div></a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--
        <div id="paginator" class="mt-5">
            {{--$lista->links('painel-consultor.paginacao')--}}
        </div>
        -->
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        var spl = (window.location.href).split('?');
        $(document).ready(function(){
            $('#limpar').attr('href', spl[0]);
        });
    </script>
</section>
@endsection