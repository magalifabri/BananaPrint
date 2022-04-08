<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet'/>

    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <script defer src="{{ mix('js/index.js') }}"></script>

    <title>{{ config('app.name') }}</title>
</head>
<body>

<script>
    document.body.className = "hidden";
</script>

@if (session()->has('status'))
    <div class="flash-message">
        {{ session('status') }}
    </div>
@endif

<header>
    <h1>{{ config('app.name') }}</h1>

    <nav>
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <span>|</span>
{{--            <a href="{{ route('logout') }}">log out</a>--}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('log out') }}
                </x-responsive-nav-link>
            </form>
        @else
            <a href="{{ route('login') }}">log in</a>
            <span>|</span>
            <a href="{{ route('register') }}">register</a>
        @endauth
    </nav>
</header>

<hr>

<main>

    {{ $slot }}

</main>

<hr>

<footer>
    <p>footer</p>
</footer>

<script>
    document.body.className = "visible";
</script>

</body>
</html>
