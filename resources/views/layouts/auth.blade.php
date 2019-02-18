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

    @section('style')
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link href="{{ URL::asset('build/css/vendor.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('build/css/app.css') }}" rel="stylesheet" type="text/css">
    @show
</head>

<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-block">

            <h3 class="text-center mt-0 m-b-15">
                <a href="javascript:void(0);" class="logo logo-admin">
                    <img src="{{ asset('assets/images/logo.png') }}" height="54" alt="logo">
                </a>
            </h3>

            @yield('content')

        </div>
    </div>
</div>

@section('script')

    <script src="{{ URL::asset('build/js/vendor.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@show
</body>
</html>