@extends('layouts.skin')

@section('content')

    <div class="ui buttons">
        <button class="ui red basic button"><a href="{{route('listings.step1')}}">wstecz</a></button>
        <button class="ui blue basic button"><a href="{{route('listings.show', [$listing->slug , $listing->id])}}" >podgląd</a></button>

    </div>
    </br>
    </br>

        <div class="ui fluid action input">
            <input type="text" placeholder="tu bedzie link do gotowej listy">
            <div class="ui button">wyślij przez Facebook</div>
            {{--tu bedzie trzeba wybierac do kogo--}}
        </div>
    </br>
        <div class="ui fluid action input">
            <input type="text" placeholder="podaj maila odbiorcy, który ma odpowiedzieć na Twoje pytania">
            <div class="ui button">Wyślij linka do pele </div>
            {{--link do kogo--}}
        </div>
    </br>
        <div class="ui fluid action input">
            <input type="text" value="{{route('listings.show', [$listing->slug , $listing->id])}}">
            <div class="ui button">kopiuj link do swojej listy</div>
        </div>
        {{--<button class="ui green basic button"><a href="{{route('listings.step3')}}">dalej</a></button>--}}
    </div>

@endsection
