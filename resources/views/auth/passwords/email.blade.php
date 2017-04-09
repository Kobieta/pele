@extends('layouts.skin')

@section('top-info')
    Podaj adres email
@endsection

@section('content')

    <div class="ui four column centered grid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="ui form app_form" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}




            <div class="field">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>



            <div class="field">
                <button type="submit" class="ui button inverted purple">Wyślij link resetujący hasło</button>
            </div>

        </form>
    </div>
@endsection
