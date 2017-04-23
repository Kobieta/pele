<div class="sticky">
    <div class="small_device_fluid"></div>
    <div id="menuActivator">
    </div>
    <div class="ui container small_device_buttons buttons_overwrite">

        @if(!Auth::check())
            <div class="ui centered grid first">
                <a class="ui mini purple button sticky_interface_button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
            </div>
            <div class="ui centered grid">
                <a class="ui mini blue button sticky_interface_button" href="{{ route('login') }}">Zaloguj się</a>
            </div>
            <div class="ui centered grid">
                <a class="ui mini violet button sticky_interface_button" href="{{ route('register') }}">Zarejestruj</a>
            </div>
            <div class="ui centered grid login_info">Nie jesteś zalogowany.</div>
        @else
            <div class="ui centered grid first">
                <a class="ui mini purple button sticky_interface_button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
            </div>
            <div class="ui centered grid">
                <a class="ui mini blue button sticky_interface_button" href="{{ route('account.show') }}">Moje konto</a>
            </div>
            <div class="ui centered grid">
                {!! Form::open(['route' => 'logout']) !!}
                <button class="ui mini violet button sticky_interface_button" type="submit">Wyloguj</button>
                {{ csrf_field() }}
                {!! Form::close() !!}
            </div>
            <div class="ui centered grid login_info">Zalogowany jako: <span>{{ Auth::user()->name }}</span></div>

        @endif

    </div>
</div>