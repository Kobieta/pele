@extends('layouts.skin')


@section('content')
    @foreach($peles as $pele)

        <div class="ui middle aligned divided list">
            <div class="item">
                {{--<div class="right floated content">--}}
                    {{--<div class="ui button">Add</div>--}}
                {{--</div>--}}
                <div class="content">
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

@endsection


