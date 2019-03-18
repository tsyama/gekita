<html lang="{{ app()->getLocale() }}">
<head>
    <title>gekita</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="gekiToast"></div>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">
                GEKITA
            </a>
            @yield('head_form')
            <ul class="navbar-nav ml-auto">
                @yield('head_button')
            </ul>
        </nav>
        <main class="py-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
