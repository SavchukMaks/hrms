<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">

    @hasSection('title')
        @yield('title')
    @else
        {{ config('app.name', 'HRMS')  }}
    @endif

    @hasSection('description')
        @yield('description')
    @else
        <meta name="description" content="">
    @endif

    @yield('head')

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:image" content="path/to/image.jpg">
    <link rel="shortcut icon" href="{{asset('img/favicon/favicon.ico')}}" type="image/x-icon">
    {{--<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">--}}
    {{--<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">--}}
    {{--<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">--}}

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <style>body { opacity: 0; overflow-x: hidden; } html { background-color: #fff; }</style>

    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">

    @yield('page-css')

    <link rel="stylesheet" href="{{asset('css/media.min.css')}}">

</head>

<body>

    @yield('sidebar')

    @yield('main')

    <script src="{{asset('js/scripts.min.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('page-js')

    @include('layouts.chunks.preloader')

</body>

</html>