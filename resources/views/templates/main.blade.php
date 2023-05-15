<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script src="{{asset('assets/js/bootstrap.min.js')}}" defer></script>
    <title>My first laravel site</title>
</head>
<body>
<header>
    <div class="container">
        @include('components.nav')
    </div>
</header>
<main>
    <div class="container">
        @yield('main')
    </div>
</main>
</body>
</html>
