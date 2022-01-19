<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='noindex,nofollow'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>管理画面</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/manage.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class='row mr-0 ml-0' style='width:100%;'>
                <div class="d-flex flex-column p-3 text-white" style="width: 280px; min-height: 100vh; background-color:#2B3F54;">
                        <a class="text-white d-block text-center mb-3 border-bottom border-3 border-white py-2 text-decoration-none" href="{{ url('/') }}" style='font-size: 20px;'>
                            株式会社タカケン
                        </a>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('manage.home') }}" class="nav-link text-white @stack('nav1')" aria-current="page">
                            <i class="fa fa-plus-circle" aria-hidden="true" style='width:20px; text-align:center;'></i>
                            小項目追加・編集
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('manage.sort') }}" class="nav-link text-white @stack('nav2')">
                            <i class="fa fa-sort" aria-hidden="true" style='width:20px; text-align:center;'></i>
                            項目並び替え
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('manage.parent') }}" class="nav-link text-white @stack('nav3')">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" style='width:20px; text-align:center;'></i>
                            大項目名編集
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('manage.config') }}" class="nav-link text-white @stack('nav4')">
                            <i class="fa fa-cog" aria-hidden="true" style='width:20px; text-align:center;'></i>
                            単価設定
                        </a>
                    </li>
                    <li class="nav-item mt-5">
                        <a href="{{ route('manage.contact') }}" class="nav-link text-white @stack('nav5')">
                            <i class="fa fa-folder-open" aria-hidden="true" style='width:20px; text-align:center;'></i>
                            お問い合わせ一覧
                        </a>
                    </li>
                </ul>
            </div>
            <div class='px-0 mx-0' style='width:calc(100% - 280px);'>
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto ml-5">
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @auth
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-user-circle-o" aria-hidden="true" style='font-size: 30px'></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>

                <main class="py-4 container bg-light">
                    @yield('content')
                </main>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ asset('js/manage.js') }}" defer></script>
</body>

</html>