@extends('layouts.skin')

@section('content')

    <div class="ui buttons">
        <button class="ui red basic button"><a href="{{route('listings.step1')}}">wstecz</a></button>
        <button class="ui blue basic button"><a href="{{route('listings.show', [$listing->slug , $listing->id])}}" >podgląd</a></button>

    </div>
    </br>
    </br>

        {!! Form::open(['route' => 'listings.send', 'class'=>'ownlist']) !!}

        <div class="ui fluid action input">
            <input name='list_link' id="list_link" type="text" value="{{route('listings.show', [$listing->slug , $listing->id])}}">
            <div id="facebook_sender" class="ui button">wyślij przez Facebook</div>
            {{--tu bedzie trzeba wybierac do kogo--}}
        </div>
    </br>


        <div class="ui fluid action input">
            <input name='email' type="text" placeholder="podaj maila odbiorcy, który ma odpowiedzieć na Twoje pytania">
            <button class="ui button">Wyślij link do Pele swojemu znajomemu</button>
            {{--link do kogo--}}
        </div>

        {!! Form::close() !!}
    </br>
        <div class="ui fluid action input">
            <input type="text" value="{{route('listings.show', [$listing->slug , $listing->id])}}">
            <div class="ui button">kopiuj link do swojej listy</div>
        </div>
        {{--<button class="ui green basic button"><a href="{{route('listings.step3')}}">dalej</a></button>--}}
    </div>

@endsection
