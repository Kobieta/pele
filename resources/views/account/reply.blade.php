@extends('layouts.skin')

@section('content')
    @foreach($data as $answer)

<div class="ui inverted segment">
    <div class="ui inverted relaxed divided list">
        <div class="item">
            <div class="content">
                <div class="header">{{$answer->reply}}</div>
                {{$answer->question->asking}}
            </div>
        </div>
    </div>
</div>

    @endforeach

@endsection
