<!DOCTYPE html>
<html lang="pt">
<head>
    @include('painel-mentor.includes.header')
</head>
<body>
    @include('painel-mentor.includes.navbar')
    @include('painel-mentor.includes.sidebar')

    <div id="vue-app">
        @yield('content')
    </div>
    @include('painel-mentor.includes.footer')
</body>
</html>
