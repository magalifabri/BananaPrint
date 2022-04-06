<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>
    <h1>header</h1>

    @auth
        <a href="{{ url('/dashboard') }}">Dashboard</a>
    @else
        <a href="{{ route('login') }}">log in</a>
        <span>|</span>
        <a href="{{ route('register') }}">register</a>
    @endauth
</header>

<hr>

<main>

    @yield('main')

</main>

<hr>

<footer>
    <p>footer</p>
</footer>
</body>
</html>