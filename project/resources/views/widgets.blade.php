@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="row">
        @foreach ( $widgets as $widget )
            {!!  $widget !!}
        @endforeach
    </div>
@endsection

@section('css', 'css/widgets.css')