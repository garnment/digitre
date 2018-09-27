@extends('layouts._main')
@section('title', $title)

@section('content')
    <div id="widgetsForm">
    {!! Form::open(['url' => '/settings/update']) !!}
    @foreach ( $widgets as $widget )
        <div>{!!  $widget !!}</div>
    @endforeach
    {!! Form::submit('Update') !!}
    {!! Form::close() !!}
    </div>
@endsection

@section('scripts', 'js/custom/settings.js')