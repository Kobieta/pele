@extends('emails.layouts.main')

@section('content')

    <header>
        <h1>{{ $user->name }} odpowiedział na Twoje pytania!</h1>
    </header>
    <p>Witaj {{ $author->name }}, Twój znajomy odpowiedział na pytania, które niedawno mu zadałeś.</p>

    <p>Możesz je sprawdzić <a href="{{ route('account.reply', ['user' => $user->id, 'id' => $listing->id ]) }}">tutaj.</a></p>
    <p>Nie zapomnij odpowiedzieć!</p>
    <p>Pozdrawiamy.</p>
@endsection