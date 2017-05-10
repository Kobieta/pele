@extends('layouts.skin')

@section('top-info')
    Logowanie
@endsection

@section('messages')
    @if(session('message'))
        <div class="message_panel {{ session('class') }}">
            <div class="ui container">
                <div class="single_message">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif
@endsection

@section('content')

    @if(session('not-active'))
        <div class="unactive-account">
            <h2>{{ session('not-active') }}</h2>
            <p>Konto do którego próbujesz się zalogować nie zostało aktywowane.</p>
            <p>Na Twoją skrzynkę odbiorczą wysłaliśmy Ci wiadomość z linkiem aktywującym.</p>
            <p>Przeprowadź aktywację i wróć do nas!</p>
        </div>
    @endif
    @if(session('login-failed'))
        <div class="failed-login">
            <h2>{{ session('login-failed') }}</h2>
            <p>Podano niepoprawne dane.</p>
        </div>
    @endif

    <div class="ui four column centered grid">
        <form class="ui form app_form" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach




            <div class="field">
                <label for="email" class="col-md-4 control-label">Adres E-mail:</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>




            <div class="field">
                <label for="password" class="col-md-4 control-label">Hasło:</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>


            <div class="inline field">
                <div class="ui toggle checkbox">

                    <input class="hidden" tabindex="0" type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
                    <label>
                        Zapamiętać?
                    </label>
                </div>
            </div>


            <div class="column_button buttons_overwrite">
                <div class="field">
                    <button type="submit" class="ui button blue app_form_button">Zaloguj</button>
                </div>
                <div class="column_button">
                    <a class="ui button purple app_form_button" href="{{ route('login.facebook') }}">Zaloguj za pomocą facebooka</a>
                </div>

                <div class="column_button">
                    <a class="ui button violet app_form_button" href="{{ url('/password/reset') }}">Zapomniałeś hasła?</a>
                </div>

                <div class="column_button">

                </div>

                <div class="column_button">
                    <a class="ui button blue app_form_button" href="{{ url('/register') }}">Stwórz konto!</a>
                </div>
            </div>
        </form>
    </div>
@endsection
