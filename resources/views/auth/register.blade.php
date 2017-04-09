@extends('layouts.skin')

@section('top-info')
    Rejestracja
@endsection

@section('content')
    <div class="ui four column centered grid">
        <form class="ui form app_form" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="field">
                <label for="name" class="col-md-4 control-label">Nazwa wyświetlana</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>




            <div class="field">
                <label for="email" class="col-md-4 control-label">Adres E-Mail</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>




            <div class="field">
                <label for="password" class="col-md-4 control-label">Hasło</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>



            <div class="field">
                <label for="password-confirm" class="col-md-4 control-label">Potwierdź hasło</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="inline field">
                <div class="ui toggle checkbox">

                    <input class="hidden" tabindex="0" type="checkbox" name="regulations" {{ old('remember') ? 'checked' : ''}}>
                    <label>
                        Akceptuję <a href="#">regulamin.</a>
                    </label>
                    @if ($errors->has('regulations'))
                        <span class="help-block">
                        <strong>{{ $errors->first('regulations') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <div class="field">
                <button type="submit" class="ui button inverted purple">Stwórz moje konto</button>
            </div>
        </form>
    </div>
@endsection
