@extends('layouts.skin')

@section('top-info')
    {{ $listing->name }}
@endsection

@section('content')

    <div class="ui center aligned header">
        <h3>Pomyślnie utworzyłeś swoją listę!</h3>
        <p>Możesz ją teraz udostępnić przyjaciołom.</p>
    </div>
        <div class="ui buttons">
            <button class="ui red basic button"><a href="{{route('listings.step1')}}">wstecz</a></button>
            <button class="ui blue basic button"><a href="{{route('listings.show', [$listing->slug , $listing->id])}}" >podgląd</a></button>
        </div>



        {!! Form::open(['route' => 'listings.send', 'method' => 'post', 'class'=>'ownlist', 'id' => 'send_pele_email']) !!}
            <div class="ui fluid action input">
                <input name='list_link' id="list_link" type="text" value="{{route('listings.show', [$listing->slug , $listing->id])}}">
            </div>

            <div class="ui half_width_button fb_button button" id="facebook_sender">wyślij listę przez Facebooka</div>

            <div class="ui half_width_button cpy_button button">kopiuj link do swojej listy</div>

            <div id="email_sender_errors">
            </div>

            <div class="ui fluid action input">
                <input name='email' id='email' type="text" placeholder="E-mail znajomego">
            </div>
            <button type="submit" id="email_sender" class="ui fluid button">Wyślij listę przez E-maila</button>

        {!! Form::close() !!}







@endsection
