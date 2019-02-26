<html lang="{{ app()->getLocale() }}">
<head>
    @if($__env->yieldContent('title') === '')
        <title>gekita</title>
    @else
        <title>@yield('title') - gekita</title>
    @endif

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">
                GEKITA
            </a>
            <form class="form-inline mr-auto col-sm-6" style="margin-top: 5px; margin-bottom: 5px;">
                <input class="form-control mr-sm-6" style="width: 100%;" placeholder="タイトル" aria-label="タイトル">
            </form>
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
