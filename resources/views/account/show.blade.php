@extends('layouts.skin')

@section('top-info')
    Panel użytkownika
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
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div class="ui negative message">
                    <div class="header">
                        {{ $error }}
                    </div>
                </div>
            @endforeach
        </ul>
    @endif
        <div class="ui stackable four column centered grid">
            <div class="ui centered column centered aligned grid avatar_panel">
                <img class="profile" src="/images/avatars/{{ $user->avatar . '.png' }}">
                <h3 class="username">{{ $user->name }}</h3>
            </div>
        </div>


        <div class="ui four column centered grid buttons_overwrite">

            <div class="column_button">
                <a class="ui purple button interface_button" href="{{ route('account.listings') }}">Moje listy pytań</a>
            </div>
            <div class="column_button">
                <button id="usernameChanger" class="ui blue button interface_button">Zmień nick</button>
                {!! Form::open(['route' => 'account.name', 'class'=>'username_change']) !!}

                    <input type="text" name="name" value="{{ $user->name }}"><br>
                    <button class="ui blue button" type="submit">Zapisz</button>
                {!! Form::close() !!}

            </div>


            <div class="column_button">
                <a class="ui violet button interface_button" href="{{ url('/password/reset') }}">Zmień hasło</a>
            </div>

            @if($user->active == 0)
                {!! Form::open(['route' => 'account.activation']) !!}
                    <p>Twoje konto jest nieaktywne!</p>
                    <p>Aktywuj swoje konto. Jeśli nie aktywujesz konta za pomocą skrzynki pocztowej, nie będziesz mógł się ponownie zalogować.</p>
                    <div class="column_button">
                        <button type="submit" class="ui blue button interface_button">Wyślij link aktywujący</button>
                    </div>
                {!! Form::close() !!}
            @endif
        </div>



@endsection


