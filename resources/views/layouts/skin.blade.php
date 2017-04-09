<!DOCTYPE html>
<!-- saved from url=(0047)http://semantic-ui.com/examples/responsive.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Standard Meta -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Responsive Elements - Semantic</title>



    <link rel="stylesheet" type="text/css" href="/css/semantic.css">

    <link id="skin" rel="stylesheet" type="text/css" href="/css/style0.css">



    <script src="/js/jquery.min.js"></script>
    <script src="/js/semantic.js"></script>

    <script src="/js/shareDialog.js"></script>
    <script src="/js/main.js"></script>


    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
<div class="top_info">
    @yield('top-info')
</div>

<div class="ui container margin_container">
    @yield('content')
</div>

<div class="sticky">
    <div class="small_device_fluid"></div>
    <div id="menuActivator">
    </div>
    <div class="ui container small_device_buttons">

        @if(!Auth::check())
            <div class="ui centered grid first">
                <a class="ui mini inverted purple button sticky_interface_button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
            </div>
            <div class="ui centered grid">
                <a class="ui mini inverted violet button sticky_interface_button" href="{{ route('login') }}">Zaloguj się</a>
            </div>
            <div class="ui centered grid">
                <a class="ui mini inverted purple button sticky_interface_button" href="{{ route('register') }}">Zarejestruj</a>
            </div>
        @else
            <div class="ui centered grid first">
                <a class="ui mini inverted purple button sticky_interface_button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
            </div>
            <div class="ui centered grid">
                <a class="ui mini inverted violet button sticky_interface_button" href="{{ route('account.show') }}">Moje konto</a>
            </div>
            <div class="ui centered grid">
                {!! Form::open(['route' => 'logout']) !!}
                <button class="ui mini inverted purple button sticky_interface_button" type="submit">Wyloguj</button>
                {!! Form::close() !!}
            </div>
            <div class="ui centered grid login_info">Zalogowany jako: <span>{{ Auth::user()->name }}</span></div>
        @endif

    </div>
</div>

</body>
</html>