@extends('layouts.skin')

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

    <div class="ui animated fade button" tabindex="0">
        <div class="visible content"><a href="{{route('listings.step1')}}">Stwórz swoje nowe Pele-Mele</a></div>
        <div class="hidden content"><a href="{{route('listings.step1')}}">Utwórz nową listę</a></div>
    </div>
    <a href="{{route('listings.step1')}}" class="ui inverted purple button">qwefwqer</a>

@endsection