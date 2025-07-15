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
        body, html {
            height: 100%;
        }
        .page-wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1;
        }
        /* .row>* {
            padding-right: 0 !important;
            padding-left: 0 !important;
        } */
    </style>
</head>

<body style="height: 100% !important;">
    <div class="page-wrapper">

        @include('components.nav-bar')

        <div class="container-fluid content-wrapper dashboard-content-wrapper">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-12 col-md-3">
                    @include('components.side-bar')
                </div>

                <!-- Main Content -->
                <div class="col-12 col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>

        <div class="footer-wrapper">
            {{-- @include('components.footer') --}}
        </div>
    </div>

    @include('libraries.scripts')
</body>
</html>
