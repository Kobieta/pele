@extends('layouts.skin')

@section('top-info')
    Witaj w serwisie Pelemele!
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

    <div class="ui stackable four column centered grid">
        <div class="ui centered column centered aligned grid">
            <img class="profile" src="/images/profile.png">
        </div>
    </div>


    <div class="ui four column centered grid">
        <div class="column_button">
            <a class="ui inverted blue button interface_button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
        </div>
        <div class="column_button">
            <a class="ui inverted purple button interface_button" href="{{ route('login') }}">Zaloguj się</a>
        </div>
        <div class="column_button">
            <a class="ui inverted violet button interface_button" href="{{ route('register') }}">Zarejestruj</a>
        </div>
    </div>
@endsection