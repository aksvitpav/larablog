<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'LaraBlog') }} - @yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/mdb.js') }}" defer></script>
    <!-- Favicon -->
    <link rel='shortcut icon' href='{{ asset('favicon.ico') }}' type='image/x-icon'>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('partials.navbar')
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                    <div class="col-md-3">
                        @yield('navigation')
                        <contact-component></contact-component>
                    </div>
                </div>
            </div>
        </main>
        @include('partials.footer')
    </div>
</body>
</html>
