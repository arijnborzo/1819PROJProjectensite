<!doctype html>
<html lang="en" class="no-js">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/reset.css') }}> <!-- CSS reset -->
    <link rel="stylesheet" href={{ asset('css/style.css') }}> <!-- Resource style -->
{{--    <link rel="stylesheet" type="text/css" href={{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}>--}}
{{--    <link rel="stylesheet" type="text/css" href={{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}>--}}
    <link rel="stylesheet" type="text/css" href={{ asset('css/util_Student.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/main_Student.css') }}>
    <link rel="stylesheet" href={{ asset('css/formstyle.css') }}>

    <!-- Scripts -->
    <script src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
{{--    <script src="'../../js/app.js"></script>--}}
    <script src="{{ asset('js/app.js') }}"></script>
    <title>{{ config('app.name', 'Projectenwebsite ICTEO14') }}</title>
</head>
<body>
    <header class="cd-header">
    </header>
    <div class="headerFixedBar">
        <div class="row">
            <div class="col-lg-12">
                <div id='cssmenu'>
                    <div class="pullLeft">
                        <a href="{{ url('/') }}" title="ProjectenWebsite.com"><img class="headerLogoImage" src="img/odiseelogo.png"></a>
                    </div>
                    <ul>
                        <li ><a href="{{ url('/') }}"><span>Overzicht</span></a></li>
                        <li class='active' ><a href='/students'><span>Studenten</span></a></li>
                        <li ><a href='/archief'><span>Archief</span></a></li>
                        <li ><a href='/belbin'><span>Belbintest</span></a></li>
                        <li class='last'><a href='/nieuwProject'><span>Nieuw Project</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <main id="app" class="content">
        <header_vue></header_vue>
        @yield('content')
        <footer_vue></footer_vue>

    </main>
{{--    <div id="app">--}}
{{--        <footer_vue></footer_vue>--}}
{{--    </div>--}}
    <script src={{ asset('js/jquery-2.1.1.js') }}></script>
    <script src={{ asset('js/jquery.mixitup.min.js') }}></script>
    <script src={{ asset('js/main.js') }}></script> <!-- Resource jQuery -->
</body>
</html>

