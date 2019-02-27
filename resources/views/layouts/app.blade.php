<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Admin Dashboard" name="description"/>
    <meta content="ThemeDesign" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ URL::asset('build/css/vendor.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('build/css/app.css') }}" rel="stylesheet" type="text/css">

    @yield('css')

</head>

<body class="fixed-left">

<script src="{{ URL::asset('build/js/vendor.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>

<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<div id="wrapper" class="wrapper-fixed-height">
    @include('layouts.sidebar')

    <div class="content-page">
        <div class="content">
            @include('layouts.topbar')

                @yield('content')

        </div>

        <footer class="footer">
            {{date('Y')}} {{config('app.name')}}
        </footer>

    </div>

</div>

@yield('script')

</body>
</html>