@extends('layouts.skin')


@section('content')

    <header>
        <h2>Aktywacja konta przebiegła pomyślnie.</h2>
        <p>Możesz się teraz zalogować.</p>
        <a href="{{ url('/login') }}">zaloguj się</a>
    </header>

@endsection