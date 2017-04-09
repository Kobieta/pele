@extends('layouts.skin')

@section('top-info')
    Panel użytkownika
@endsection

@section('content')

        <div class="ui stackable four column centered grid">
            <div class="ui centered column centered aligned grid">
                <img class="profile" src="/images/profile.png">
                <h3 class="username">{{ $user->name }}</h3>
            </div>
        </div>


        <div class="ui four column centered grid">

            <div class="column_button">
                <a class="ui inverted purple button interface_button" href="{{ route('account.listings') }}">Moje listy pytań</a>
            </div>
            <div class="column_button">
                <button id="usernameChanger" class="ui inverted purple button interface_button">Zmień nick</button>
                {!! Form::open(['route' => 'account.name', 'class'=>'username_change']) !!}

                    <input type="text" name="name" value="{{ $user->name }}"><br>
                    <button class="ui inverted purple button" type="submit">Zapisz</button>
                {!! Form::close() !!}

            </div>


            <div class="column_button">
                <a class="ui inverted purple button interface_button" href="{{ url('/password/reset') }}">Zmień hasło</a>
            </div>
        </div>



@endsection


