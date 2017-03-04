    @extends('layouts.skin')


@section('content')
    @foreach($data as $user)

        <div class="ui middle aligned divided list">
            <div class="item">
                {{--<div class="right floated content">--}}
                {{--<div class="ui button">Add</div>--}}
                {{--</div>--}}
                <div class="content">
                    {{$user->name}}
                    {{$user->email}}
                </div>
            </div>
            <div class="item">
                <div class="right floated content">
                    <button class="ui button"><a href="{{route('account.reply', [$user->id, $id])}}">zobacz odpowiedzi</a></button>
                </div>
            </div>
        </div>

    @endforeach

@endsection
