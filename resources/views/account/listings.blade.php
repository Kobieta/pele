@extends('layouts.skin')

@section('top-info')
    Twoje listy pytań
@endsection

@section('content')
    @if(count($peles))
        @foreach($peles as $pele)

            <div class="ui middle aligned divided list">
                <div class="item">
                    {{--<div class="right floated content">--}}
                    {{--<div class="ui button">Add</div>--}}
                    {{--</div>--}}
                    <div class="left floated content">
                        nazwa pele: {{$pele->name}}
                    </div>

                </div>
                <div class="item">
                    <div class="right floated content">
                        <div class="ui button"><a href="{{route('account.users', $pele->id)}}">zobacz kto wypełnił</a></div>
                    </div>
                </div>
            </div>

        @endforeach
    @else
        <div class="ui stackable four column centered grid">
            Nie masz jeszcze żadnej listy pytań! Chcesz utworzyć nowe Pelemele?
            <div class="column_button">
                <a class="ui inverted blue button interface_button" href="{{ route('listings.step1') }}">Stwórz nowe Pelemele</a>
            </div>
        </div>
    @endif

@endsection


