
@extends('emails.layouts.main')

@section('content')

    <header>
        <h1>Epelemele</h1>
    </header>
    <h2>Aktywacja konta</h2>
    <p>

    </p>
    <p>Aby aktywować konto, kliknij poniższy link.</p>
    <a class="main_button" href='{{ $activation_link }}'>LINK</a>

@endsection