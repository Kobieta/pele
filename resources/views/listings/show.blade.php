@extends('layouts.skin')

@section('top-info')
    Odpowiadasz na Pelemele
@endsection

@section('content')

    {!! Form::open(['route' => 'listings.store', 'class'=>'answers_form ownlist']) !!}
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div class="ui negative message">
                    <div class="header">
                        {{ $error }}
                    </div>
                </div>
            @endforeach
        </ul>
    @endif
    <h2 class="pele_header">{{ $listings->name }}</h2>
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
    <input name="listing_id" type="hidden" value="{{ $listings->id }}">
    <div class="ui form">
        <div class="ui fluid pele_field buttons_overwrite">
            <br>
            <button class="ui purple button fluid field" type="submit">Odpowiedz</button>
        </div>
    </div>
    {!! Form::close() !!}




@endsection
