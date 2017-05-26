@extends('layouts.skin')

@section('top-info')
    {{ $listing->name }}
@endsection

@section('messages')
    <div class="message_panel succes_message">
        <div class="single_message">Pomyślnie utworzyłeś nową listę pytań!</div>
        <div class="single_message">Możesz rozesłać ją teraz do znajomych.</div>
    </div>
@endsection

@section('content')

        <div class="ui buttons">
            <a class="ui red basic button" href="{{route('listings.step1')}}">wstecz</a>
            <a class="ui blue basic button" href="{{route('listings.show', [$listing->slug , $listing->id])}}" >podgląd</a>
        </div>



        {!! Form::open(['route' => 'listings.send', 'method' => 'post', 'class'=>'ownlist', 'id' => 'send_pele_email']) !!}
            <div class="ui fluid action input">
                <input name='list_link' id="list_link" type="text" value="{{ route('listings.show', [$listing->slug , $listing->id]) }}">
            </div>

            <div class="ui half_width_button fb_button button" id="facebook_sender">wyślij listę przez Facebooka</div>

            <div id="listCopyButton" class="ui half_width_button cpy_button button">kopiuj link do swojej listy</div>

            <div id="email_sender_errors">
            </div>

            <div class="ui fluid action input">
                <input name='email' id='email' type="text" placeholder="E-mail znajomego">
            </div>
            <button type="submit" id="email_sender" class="ui fluid button">Wyślij listę przez E-maila</button>

        {!! Form::close() !!}

@endsection
