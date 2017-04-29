@extends('layouts.skin')

@section('top-info')
    Odpowiedzi od {{ $currentUser->name }}
@endsection

@section('content')
    @foreach($data as $answer)
        <div class="question_show">
            Pytanie: <span class="question">{{ $answer->asking }}</span><br>
            Odpowiedź: <span class="answer">{{ $answer->reply }}</span><hr>
        </div>
    @endforeach

@endsection
