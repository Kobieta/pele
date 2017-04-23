@extends('layouts.skin')

@section('top-info')
    Konto aktywowane
@endsection

@section('content')

    <div class="ui four column centered grid">
        <h2>Aktywacja konta przebiegła pomyślnie.</h2>
        <div class="column_button">
            <a class="ui large button inverted blue" href="{{ url('/login') }}">Dalej</a>
        </div>
    </div>

@endsection