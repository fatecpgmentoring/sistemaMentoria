<!DOCTYPE html>
<html lang="pt">
<head>
    @include('site.painel-mentor.includes.header')
</head>
<body>
    @include('site.painel-mentor.includes.navbar')
    @include('site.painel-mentor.includes.sidebar')

    <div id="vue-app">
        @yield('content')
    </div>
    @include('site.painel-mentor.includes.footer')
</body>
</html>
