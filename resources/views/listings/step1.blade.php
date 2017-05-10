@extends('layouts.skin')


@section('top-info')
    Tworzysz nową listę pytań
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

    {!! Form::open(['route' => 'listings.step2', 'class'=>'step_1_form ownlist']) !!}

    <div class="ui form">
        <div class="field pele_field">
            <label class="title">Nazwa Twojej listy pytań</label>
           <input type="text" name="name">
        </div>
    </div>

    <div class="ui form">
        <label class="style-name" for="tlo">Wygląd Pelemele:</label>

        <div class="ui grid">
            <div class="eight wide column">
                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style0">
                        <input type="radio" name="styling" value="0" checked="" tabindex="0" class="hidden">
                        <label class="style-name">Papier</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style1">
                        <input type="radio" name="styling" value="1" tabindex="0" class="hidden">
                        <label class="style-name">Klasyczny</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style2">
                        <input type="radio" name="styling" value="2" tabindex="0" class="hidden">
                        <label class="style-name">Tęcza</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style3">
                        <input type="radio" name="styling" value="3" tabindex="0" class="hidden">
                        <label class="style-name">Cegła</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style4">
                        <input type="radio" name="styling" value="4" tabindex="0" class="hidden">
                        <label class="style-name">Koronka</label>
                    </div>
                </div>
            </div>

            <div class="eight wide column">
                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style5">
                        <input type="radio" name="styling" value="5" tabindex="0" class="hidden">
                        <label class="style-name">Kwiatuszki</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style6">
                        <input type="radio" name="styling" value="6" tabindex="0" class="hidden">
                        <label class="style-name">Wzorek</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style7">
                        <input type="radio" name="styling" value="7" tabindex="0" class="hidden">
                        <label class="style-name">Polonez</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style8">
                        <input type="radio" name="styling" value="8" tabindex="0" class="hidden">
                        <label class="style-name">Ptaki</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui toggle checkbox" data-iden="style9">
                        <input type="radio" name="styling" value="9" tabindex="0" class="hidden">
                        <label class="style-name">Ptaki</label>
                    </div>
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
                    <div class="ui fluid">
                        <div class="field rainbow pele_field">
                            <label>Pytanie {{$question['label']}}</label>
                            <input class="ui fluid action input" type="text" name="asking[]" value="{{ $question['pytanie'] }}">
                        </div>
                    </div>
                </div>
             @endforeach
            </div>
        </div>

        @if(!Auth::check())
            <div class="ui form">
                <div class="ui fluid pele_field">
                    <div class="field rainbow">
                        <label>Twój adres e-mail</label>
                        <input name="email" id="email" class="ui fluid action input" placeholder="E-mail">
                    </div>
                </div>
            </div>
        @endif
        <div class="ui form">
            <div class="ui fluid pele_field buttons_overwrite">
                <br>
                <button class="ui purple button fluid field" type="submit">dalej</button>
            </div>
        </div>
        {!! Form::close() !!}
        <br>
    </div>

    <script>
        $('.ui.toggle.checkbox')
            .checkbox()
            .click(function(){
                var path = '/css/' + $(this).data('iden') + '.css';

                $("#skin").load(function(){
                    //Your javascript
                }).attr("href", path);

            });
    </script>
@endsection
