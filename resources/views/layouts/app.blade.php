<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <script>
        var csrfToken = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>;
        window.Laravel = csrfToken;
    </script>
</head>
<body>
    <div id="app">
        @if (Auth::guest())
            <nav-bar 
                auth="{{ Auth::guest() }}">
            </nav-bar>
        @else 
            <nav-bar 
                auth="{{ Auth::guest() }}"
                token="{{ csrf_token() }}"
                name="{{ Auth::user()->name }}">
            </nav-bar>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
