@extends('layouts.skin')


@section('top-info')
    Tworzysz nową listę pytań
@endsection

@section('content')

    {!! Form::open(['route' => 'listings.step2', 'class'=>'ownlist']) !!}
{{--<form method="post" action="{{route('listings.step2')}}" class="ownlist">--}}
<div class="ui form">
    <div class="field">
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
        <label class="title">Nazwa Twojej listy pytań</label>
       <input type="text" name="name">
    </div>
</div>

<div class="ui form">
    <div class="inline fields">
        <label class="style-name" for="tlo">Wybierz wygląd Pele-Mele:</label>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style0">
                <input type="radio" name="styling" value="0" checked="" tabindex="0" class="hidden">
                <label class="style-name">Papier</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style1">
                <input type="radio" name="styling" value="1" tabindex="0" class="hidden">
                <label class="style-name">Klasyczny</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style2">
                <input type="radio" name="styling" value="2" tabindex="0" class="hidden">
                <label class="style-name">Tęcza</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style3">
                <input type="radio" name="styling" value="3" tabindex="0" class="hidden">
                <label class="style-name">Cegła</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style4">
                <input type="radio" name="styling" value="1" tabindex="0" class="hidden">
                <label class="style-name">Koronka</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style5">
                <input type="radio" name="styling" value="1" tabindex="0" class="hidden">
                <label class="style-name">Kwiatuszki</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style6">
                <input type="radio" name="styling" value="1" tabindex="0" class="hidden">
                <label class="style-name">Wzorek</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style7">
                <input type="radio" name="styling" value="1" tabindex="0" class="hidden">
                <label class="style-name">Polonez</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox" data-iden="style8">
                <input type="radio" name="styling" value="1" tabindex="0" class="hidden">
                <label class="style-name">Ptaki</label>
            </div>
        </div>
    </div>


    {{--<div class="ui buttons">--}}
        {{--<button class="ui red basic button"><a href="{{route('listings.index')}}">wstecz</a></button>--}}
        {{--<button class="ui green basic button"><a href="{{route('listings.step2')}}">dalej</a></button>--}}
    {{--</div>--}}
    <div class="test">
        <div class="ui form">
        @foreach($questions as $question)
            <div>
                <label>{{$question['label']}}</label>
                <div class="ui fluid">
                    <div class="field rainbow">
                        <input class="ui fluid action input" type="text" name="asking[]" value="{{$question['pytanie']}}">
                    </div>
                    {{--<div class="four wide field">--}}
                        {{--<div class="ui toggle checkbox">--}}
                            {{--<input type="checkbox" name="public">--}}
                            {{--<label>Zapisz to pytanie</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
         @endforeach
        </div>
    </div>

    @if(!Auth::check())
        <div class="ui form">
            <div class="ui fluid">
                <div class="field rainbow">
                    <label>Twój adres e-mail</label>
                    <input name="email" id="email" class="ui fluid action input" placeholder="E-mail">
                </div>
            </div>
        </div>
    @endif

    <br>
    <button class="positive ui button twelve wide field">dalej</button>

    {!! Form::close() !!}
    <br>
</div>
    <script>
        $('.ui.radio.checkbox')
            .checkbox()
            .click(function(){
                $('#skin') .attr('href',  '/css/' + $(this).data('iden') + '.css' );
                console.log( $(this).data('iden') );
            });
    </script>
@endsection
