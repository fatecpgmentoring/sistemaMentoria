<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('painel-mentor.includes.head')
</head>
<body>
    @php
    $usuario = session('usuario.0');
    @endphp
    <header id="consultor-header">
        <div class="wrap-content">
            <div class="logo-box">
                <a href="/" class="logo">
                    <img src="/images/logos/icone-branco.png" alt="Logo" class="img-fluid">
                </a>
            </div>
            <div class="col pl-0 user-box">
                <div class="user-info">
                    <h5 class="name">Olá, {{$usuario->nm_mentor}}
                    </h5>
                    <div class="user-photo">
                        <figure class="img-frame">
                            <img src="/{{$usuario->ds_foto}}">
                        </figure>
                    </div>
                </div>

                <div class="breadcrumb-wrapper">
                    @yield('breadcrumb')
                    <div class="link" id="dropdown-nav">
                        <a class="option-nav">Opções</a>
                    </div>
                    <div class="dropdown-nav">
                         <ul>
                             <li><a href="#">Alterar Dados</a></li>
                             <li><a href="#">Alterar Senha</a></li>
                             <li><a href="#">Sair</a></li>
                         </ul>  
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div id="main-panel-wrap" class="active">
        @include('painel-mentor.includes.aside-nav')

        <!-- CONTENT -->
        <main id="main-box">
            <div class="container-fluid mt-4">
                <div id="vue-app">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <!-- This Global Component Listen For Notification

    <div id="global-notifier">
        <generic-consultant-notifier consultantid="{{--Auth::user()->cd_usuario_fk--}}"></generic-consultant-notifier>
    </div> -->


    <!-- WS URL && Socket Lib -->
    <script>window.WS_URL = "http://chat-mentoring-com.umbler.net"</script>
    <script src="{{ asset('js/socket.io.js') }}"></script>

    <script type="text/javascript" src="/vuejs/app.js"></script>
    <!--
    <script type="text/javascript" src="{{-- mix('vuejs/app.js') --}}"></script>
    -->
    <!-- SCRIPTS -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/jquery-mobile-events.min.js"></script>
    <script type="text/javascript" src="/js/vendor.js"></script>
    <script type="text/javascript" src="/js/maskedinput1.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/Multiselect/multiselect.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script>
        $(document).ready(function()
        {
            $('.select2').select2();

            $('#dropdown-nav').click(function(){
                $('.dropdown-nav').toggleClass('active', 500);
            });

           $(document).click(function(e) {
                $('#dropdown-nav')
                .not($('#dropdown-nav').has($(e.target)))
                    .children('.dropdown-nav').removeClass('active');    
           });
        });
    </script>
    @yield('js')

</body>
</html>
