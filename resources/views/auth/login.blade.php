@extends('layouts.skin')

@section('top-info')
    Logowanie
@endsection

@section('content')
    <div class="ui container">

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
                <form class="ui form" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="field">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="field">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="field">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="column_button">
                        <div class="field">
                            <button type="submit" class="ui button inverted blue">zaloguj</button>
                        </div>
                            <a class="ui button inverted purple" href="{{ route('login.facebook') }}">Zaloguj za pomocą facebooka</a>

                            <a class="ui button inverted purple" href="{{ url('/password/reset') }}">Forgot Your Password?</a>

                    </div>
                </form>
            </div>

    </div>
@endsection
