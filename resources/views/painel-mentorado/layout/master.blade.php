<!DOCTYPE html>
<html lang="pt">
<head>
    @include('painel-mentorado.includes.head')
</head>
<body>
    @include('painel-mentorado.includes.navbar')
    @include('painel-mentorado.includes.sidebar')

    <div id="vue-app">
        @yield('content')
    </div>
    @include('painel-mentorado.includes.footer')
</body>
</html>

