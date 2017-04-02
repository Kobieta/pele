@extends('emails.layouts.main')

@section('content')

    <header>
        <h1>{{ $user->name }} wysłał Ci listę pytań!</h1>
    </header>
    <h2>Klikając poniżej, możesz odpowiedzieć na jego listę pytań.</h2>
    <a class="main_button" href="{{ $link }}">ODPOWIEDZ.</a>
    <p class="quotation">
        Przyjaciel to człowiek, który wie wszystko o tobie i wciąż cię lubi.
        Elbert Hubbard
    </p>
@endsection