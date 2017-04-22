@extends('layouts.skin')

@section('top-info')
    Odpowiadasz na Pelemele
@endsection

@section('content')

    {!! Form::open(['route' => 'listings.store', 'class'=>'ownlist']) !!}
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
    <div class="ui form success">
        <div class="field">
            <label> E-mail</label>
            <input type="email" name="email"  value="" class="twelve wide field"  placeholder="joe@schmoe.com">
        </div>
    </div>
    <h1> PeleMele "{{$listings->name}}"</h1>
    <div class="ui form">
        @foreach($questions as $question)
            <div class="field">
                <label>{{$question->asking}}</label>
                <div class="fields">
                    <div class="twelve wide field rainbow">
                        <input type="text" name="reply[{{$question->id}}]" value="" >
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="positive ui button twelve wide field">zapisz</button>
    {!! Form::close() !!}




@endsection
