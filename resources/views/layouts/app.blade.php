<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kumana') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">

    @include('libraries.styles')

    <style>
        html, body {
            height: 100% !important;
            margin: 0;
            padding: 0;
            background: rgba(225, 236, 250, 1);
        }

        .page-wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
        }

        .footer-wrapper {
            flex-shrink: 0;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body style="height: 100% !important;">
    <div class="page-wrapper">
        @include('components.nav-bar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        <div class="footer-wrapper">
            @include('components.footer')
        </div>
    </div>

    @include('libraries.scripts')
</body>
</html>
