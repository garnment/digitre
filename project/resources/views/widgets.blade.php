@extends('layouts.main')

@section('title', $title)

@section('content')
    @foreach ( $widgets as $widget )
        {!!  $widget !!}
    @endforeach
@endsection('title')

