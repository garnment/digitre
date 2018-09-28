@extends('layouts.main')
@section('title', $title)
@section('css', 'css/widgets.css')

@section('content')
    <div class="row">
        @foreach ( $widgets as $widget )
            {!!  $widget !!}
        @endforeach
    </div>
@endsection

