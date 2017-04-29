@extends('layouts.skin')

@section('top-info')
    Przyjaciele, którzy odpowiedzieli
@endsection

@section('content')
    @if(count($data))
        @foreach($data as $user)

            <div class="ui middle aligned divided list buttons_overwrite">
                <div class="item single_pele">
                    <div class="left floated content pele_name">
                        <span>Użytkownik:</span> {{ $user->name }}
                        <span>Email:</span> {{ $user->email }}
                    </div>
                    <div class="right floated content">
                        <a class="ui violet button" href="{{route('account.reply', [$user->id, $listingId])}}">zobacz odpowiedzi</a>
                    </div>
                </div>
            </div>

        @endforeach
    @else

        <div class="ui middle aligned divided list buttons_overwrite">
            <div class="item single_pele">
                Nikt jeszcze nie odpowiedział na Twoją listę pytań.
            </div>
        </div>
    @endif
@endsection
