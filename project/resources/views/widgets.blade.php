@extends('layouts._main')

@section('title', $title)

@section('content')
    @foreach ( $widgets as $widget )
        {!!  $widget !!}
    @endforeach
@endsection

@section('css', 'css/widgets.css')