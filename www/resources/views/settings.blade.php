@extends('layouts.main')
@section('title', $title)

@section('css')
    <link rel="stylesheet" href="css/settings.css"/>
@endsection

@section('content')
    <div id="widgetsForm">
        <fieldset><legend>Cochez / décochez les styles de widget </br>selon que vous souhaitez les voir apparaitre ou non sur la home page :</legend>
<hr>
            {!! Form::open(['url' => '/settings/update']) !!}
                @foreach ( $widgets as $widget )
                    <div>{!!  $widget !!}</div>
            @endforeach
            {!! Form::submit('Confirmer', array('class' => 'btn btn-primary')) !!}
            {!! Form::close() !!}

        </fieldset>
    </div>
@endsection

@section('scripts', 'js/custom/settings.js')