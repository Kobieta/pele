@extends('layouts.skin')

@section('top-info')
    Odpowiadasz na Pelemele
@endsection

@section('messages')
    @if($errors->any())
        <div class="message_panel error_message">
            <div class="ui container">
                @foreach($errors->all() as $error)
                    <div class="single_message">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection

@section('content')

    {!! Form::open(['route' => 'listings.store', 'class'=>'answers_form ownlist']) !!}
    <h2 class="pele_header">{{ $listing->name }}</h2>
    <div class="ui form">
        @foreach($questions as $question)
            <div class="ui fluid pele_field">
                <div class="field rainbow">
                    <label>{{$question->asking}}</label>
                    <input class="ui fluid action input" type="text" name="reply[{{$question->id}}]" value="{{ old('reply.' . $question->id) }}" >
                </div>
            </div>
        @endforeach
    </div>

    @if(!Auth::check())
        <div class="ui form success">
            <div class="ui fluid pele_field">
                <div class="field rainbow">
                    <label> E-mail</label>
                    <input type="email" name="email"  value="" class="fluid field"  placeholder="joe@schmoe.com">
                </div>
            </div>
        </div>
    @endif
    <input name="listing_id" id="listing_id" type="hidden" value="{{ $listing->id }}">
    <div class="ui form">
        <div class="ui fluid pele_field buttons_overwrite">
            <br>
            <button class="ui purple button fluid field" type="submit">Odpowiedz</button>
        </div>
    </div>
    {!! Form::close() !!}

    <script>
            $(function() {
                console.log('href',  '/css/style' + {{ $listing->styling }} + '.css' );
                $('#skin') .attr('href',  '/css/style' + {{ $listing->styling }} + '.css' );
            });
                //$('#skin') .attr('href',  '/css/' + $(this).data('iden') + '.css' );

    </script>


@endsection
