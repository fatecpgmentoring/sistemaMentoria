<!DOCTYPE html>
<html lang="pt">
<head>
    @include('admin.includes.header')
</head>
<body>
    @include('admin.includes.navbar')
    @include('admin.includes.sidebar')

    <div id="vue-app">
        @yield('content')
    </div>
    
    @include('admin.includes.footer')
</body>
</html>
