@extends('layouts.skin')

@section('title')
    Pelemele - start
@endsection

@section('top-info')
    Witaj w aplikacji Pelemele!
@endsection

@section('content')
    {{--<table class="table table-hover">--}}
        {{--@foreach($dane as $item)--}}
            {{--<tr>--}}
                {{--<td>{{$item->id}}</td>--}}
                {{--<td>{{$item->name}}</td>--}}
                {{--<td><a class="btn btn-primary" href="{{route('category.edit', $item)}}">Edytuj</a> </td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
    {{--</table>--}}

    {{--{{$dane->links()}}--}}
    <!--
    <div class="ui animated fade button pelemele_create" tabindex="0">
        <div class="visible content"><a href="#">Stwórz swoje nowe Pele-Mele</a></div>
        <div class="hidden content"><a href="#">Utwórz nową listę</a></div>
    </div>
    -->
    <div class="eight wide column front_page_info">
        <header>
            <h2>Rozpocznij przygodę z <span>Pelemele</span>!</h2>
        </header>
    </div>
    <div class="ui stackable centered grid">
        <div class="eight wide column">
            <div class="ui stackable four column centered grid buttons_overwrite">
                <img class="profile" src="/images/profile.png">
                <div class="column_button">
                    <a class="ui interface_button blue button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
                </div>
                <div class="column_button">
                    <a class="ui interface_button purple button" href="{{ route('login') }}">Zaloguj się</a>
                </div>
                <div class="column_button">
                    <a class="ui interface_button violet button" href="{{ route('register') }}">Zarejestruj</a>
                </div>
            </div>
        </div>
        <div class="eight wide column centered aligned front_page_info">

            <div class="front_page_dsc">
                <p>,,Przyjaciel to człowiek, który wie wszystko o Tobie i wciąż Cię lubi.''</p>
                <h4>~Elbert Hubbard</h4>
            </div>

            <h4>Zadaj ciekawe pytania swoim znajomym, aby ich lepiej poznać i zobaczyć, co lubią.</h4>

            <p>
                Możesz skorzystać z dostępnej listy niezwykle ciekawych pytań, lub zadać oryginalne, własne.</p>
                Wymyślając je, miej szacunek do innych!

                Odpowiedzi będą widoczne tylko dla Ciebie!
            </p>
            <p>Pelemele to bardzo osobista forma kontaktu. Nie udostępniaj nikomu swojego hasła.</p>

            <h3>Bawcie się dobrze!</h3>

        </div>
    </div>

    <!--

    <div class="ui stackable four column centered grid">
        <div class="ui centered column centered aligned grid">
            <img class="profile" src="/images/profile.png">
        </div>
    </div>


    <div class="ui four column centered grid">
        <div class="column_button">
            <a class="ui inverted blue button interface_button" href="">Stwórz nowe Pelemele</a>
        </div>
        <div class="column_button">
            <a class="ui inverted purple button interface_button" href="">Zaloguj się</a>
        </div>
        <div class="column_button">
            <a class="ui inverted violet button interface_button" href="">Zarejestruj</a>
        </div>
    </div>

-->

@endsection