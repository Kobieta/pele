@extends('layouts.skin')

@section('top-info')
    Twoje listy pytań
@endsection

@section('content')
    @if(count($peles))
        @foreach($peles as $pele)

            <div class="ui middle aligned divided list buttons_overwrite">
                <div class="item single_pele">
                    <div class="left floated content pele_name">
                        {{$pele->name}}
                    </div>
                    <div class="right floated content">
                        <a class="ui violet button" href="{{route('account.users', $pele->id)}}">pokaż</a>
                    </div>
                    <div class="right floated content">
                        <a class="ui blue button" href="{{route('account.users', $pele->id)}}">zobacz kto wypełnił</a>
                    </div>
                </div>
            </div>

        @endforeach
    @else
        <div class="ui stackable four column centered grid buttons_overwrite">
            Nie masz jeszcze żadnej listy pytań! Chcesz utworzyć nowe Pelemele?
            <div class="column_button">
                <a class="ui blue button interface_button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
            </div>
        </div>
    @endif

@endsection


