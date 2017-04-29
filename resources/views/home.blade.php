@extends('layouts.skin')

@section('title')
    Konto
@endsection

@section('top-info')
    jesteś zalogowany
@endsection

@section('content')
    <div class="ui container">
        <h3>Jesteś zalogowany!</h3>
        <div class="eight wide column">
            <div class="ui stackable four column centered grid buttons_overwrite">
                <div class="column_button">
                    <a class="ui blue button interface_button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
                </div>
                <div class="column_button">
                    <a class="ui purple button interface_button" href="{{ route('account.show') }}">Moje konto</a>
                </div>
                <div class="column_button">
                    {!! Form::open(['route' => 'logout']) !!}
                    <button class="ui violet button interface_button" type="submit">Wyloguj</button>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
