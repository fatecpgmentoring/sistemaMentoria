<!DOCTYPE html>
<html lang="pt">
<head>
    @include('site.painel-mentorado.includes.header')
</head>
<body>
    @include('site.painel-mentorado.includes.navbar')
    @include('site.painel-mentorado.includes.sidebar')

    <div id="vue-app">
        @yield('content')
    </div>
    @include('site.painel-mentorado.includes.footer')
</body>
</html>
