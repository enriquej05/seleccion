<!DOCTYPE html>
<html lang="es-MX">

<head>
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;500;700;800&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    @yield('styles')
</head>

<body class="@yield('color')">

    <div id="app">

        @yield('content')

    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
