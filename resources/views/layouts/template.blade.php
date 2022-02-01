<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='noindex,nofollow'>
    <title>住宅見積シミュレーション</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css">
    <link rel="stylesheet" href="{{ asset('css/odometer-theme-default.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @stack('css')
</head>

<body>
    <header>
        <div class='top'>
            <div class='header-container'>
                <h1><a>ロゴが入ります</a></h1>
            </div>
        </div>
        <div class='bottom'>
            <div class='header-container'>
                <ul>
                    <li>
                        <a>ナビゲーション</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    @stack('js')
    <script src="{{ asset('js/simulation.js') }}" defer></script>
</body>

</html>