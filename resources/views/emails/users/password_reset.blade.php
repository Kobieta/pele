@extends('emails.layouts.main')


@section('content')
    <header>
        <h2>Resetowanie hasła</h2>
    </header>
    <p>Aby zresetować hasło, kliknij poniższy link.</p>
    <p><a href="{{ route('password.reset', array($token)) }}">resetuj hasło</a></p>
@endsection