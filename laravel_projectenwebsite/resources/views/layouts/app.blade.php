<!doctype html>
<html lang="en" class="no-js">
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
{{--    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>--}}

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href={{ asset('css/reset.css') }}> <!-- CSS reset -->--}}
{{--    <link rel="stylesheet" href={{ asset('css/style.css') }}> <!-- Resource style -->--}}
{{--    <link rel="stylesheet" type="text/css" href={{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}>--}}
{{--    <link rel="stylesheet" type="text/css" href={{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}>--}}
{{--    <link rel="stylesheet" type="text/css" href={{ asset('css/util_Student.css') }}>--}}
{{--    <link rel="stylesheet" type="text/css" href={{ asset('css/main_Student.css') }}>--}}
{{--    <link rel="stylesheet" href={{ asset('css/formstyle.css') }}>--}}

    <!-- Scripts -->
    <script src="{{ asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
    <script src="{{ asset('js/app.js') }}"></script>
    <title>{{ config('app.name', 'Projectenwebsite ICTEO14') }}</title>
</head>
<body>
    <main id="app" class="content">
        @if (isset($user))
            <header_vue :user="{{ $user }}"></header_vue>
        @else
        @endif

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        @yield('content')

        <footer_vue></footer_vue>
    </main>
    <script src={{ asset('js/jquery-2.1.1.js') }}></script>
    <script src={{ asset('js/jquery.mixitup.min.js') }}></script>
    <script src={{ asset('js/main.js') }}></script> <!-- Resource jQuery -->
</body>
</html>

