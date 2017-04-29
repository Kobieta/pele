@extends('layouts.skin')

@section('top-info')
    Panel użytkownika
@endsection

@section('content')

    @if(session('message'))
        <div class="positive_message">
            {{ session('message') }}
        </div>
    @endif
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
            <div class="ui centered column centered aligned grid">
                <img class="profile" src="/images/profile.png">
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
                    Twoje konto jest nieaktywne!
                    <div class="column_button">
                        <button type="submit" class="ui blue button interface_button">Wyślij link aktywujący</button>
                    </div>
                {!! Form::close() !!}
            @endif
        </div>



@endsection


