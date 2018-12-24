<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-root" content="/">
    <meta http-equiv="X-DNS-Prefetch-Control" content="on"/>
    <title>@yield('title','ORCHID') - @yield('description','Admin')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class=" bg-white border-bottom shadow-sm">
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-center pt-3 pb-3">
            <a class="p-2 text-dark mr-md-auto  my-md-0" href="#">Безумный веб</a>
            <a class="p-2 text-dark mr-md-auto ml-md-auto my-md-0" href="#">Чебурнет</a>

            <a href="{{ url('/') }}" class="my-0 mr-md-auto  ml-md-auto font-weight-normal">
                <img src="/img/logo.png" alt="7bit">
            </a>

            <a class="p-2 text-dark mr-md-auto ml-md-auto my-md-0" href="#">Красные глазики</a>
            <a class="p-2 text-dark ml-md-auto my-md-0" href="#">Треш и угар</a>
        </div>
    </div>
</div>


<div class="container flex-lg-row">

    @yield('content')

    @stack('scripts')

</div>
</body>
</html>
