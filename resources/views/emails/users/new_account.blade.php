@extends('emails.layouts.main')


@section('content')
    <header>
        <h2>Witaj, {{ $user->name }}</h2>
    </header>
    <h4>Zaczęła się Twoja przygoda z E pele mele!</h4>
    <p>Stwórz niesamowite pytania i wyślij je do swoich przyjaciół.</p>
    <h4>Bawcie się dobrze!</h4>
    <p>Tymczasem czas zmienić sobie hasło na własne!</p>
    <p>Aktualne hasło: {{ $password }}</p>
    <a href="{{ route('password.request') }}">zmiana hasła</a>

    Przyjaciel to człowiek, który wie wszystko o tobie i wciąż cię lubi.
    Elbert Hubbard


    @if( $user->active )

    @else
        <p>Twoja konto jest nieaktywne.</p>
    @endif
@endsection
