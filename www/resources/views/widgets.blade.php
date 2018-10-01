@extends('layouts.main')
@section('title', $title)

@section('css')
    <link rel="stylesheet" href="css/widgets/widget-right.min.css"/>
    <link rel="stylesheet" href="css/widgets/widget-left.min.css"/>
    <link rel="stylesheet" href="css/widgets.css"/>
@endsection


@section('content')
     @foreach ( $widgets as $widget )
         <div class="widget">{!!  $widget !!}</div>
    @endforeach
@endsection
