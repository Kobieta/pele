@extends('layouts.skin')

@section('content')
    @foreach($data as $answer)

        Pytanie: <b style="color:red">{{$answer->asking}}</b><br>
        Odpowiedź: <b style="color:green">{{$answer->reply}}</b><hr>

    @endforeach

@endsection
