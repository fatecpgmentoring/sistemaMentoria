<!-- Fav -->
<link rel="icon" type="image/png" href="/images/icone-azul.png" sizes="32x32" />
<link rel="icon" type="image/png" href="/images/icone-azul.png" sizes="16x16" />

<!-- CSS -->
<link rel="stylesheet" href="/css/style.min.css" type="text/css">
<link rel="stylesheet" href="/css/vendor.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- META TAGS -->
<meta name="description" content="@yield('meta-desc', '')" />
<meta name="keywords" content="@yield('meta-keywords', '')">
<meta name="author" content="Sisscon">
<meta name="copyright" content="">
<meta name="application-name" content="">
<meta name="Robots" content="index, follow">
<meta name="distribution" content="Global">
<meta name="rating" content="General">
<meta name="revisit-after" content="5">
<meta http-equiv="expires" content="0">

<!-- for Facebook -->
<meta property="og:title" content="@yield('meta-title','')">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="@yield('site-name', 'Sisscon | Mentoring')">
<meta property="og:description" content="@yield('meta-desc', '')">
<meta property="og:image" content="{{ url('/') }}@yield('meta-image', '')">

<!-- for Twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="@yield('meta-title','Sisscon | Mentoring')" />
<meta property="twitter:description" content="@yield('meta-desc', '')">
<meta property="twitter:image" content="{{ url('/') }}@yield('meta-image', '')">

<!-- for Google+ -->	
<meta itemprop="name" content="@yield('meta-title','Sisscon | Mentoring')">
<meta name="csrf-token" content="{{ csrf_token() }}">


<title>@yield('meta-title', 'Sisscon | Mentoring')</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

