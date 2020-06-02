@extends('layouts.app')
@section('css')
    <style>
        .row-striped:nth-of-type(odd) {
            background-color: #efefef;
        }

        .row-striped:nth-of-type(even) {
            background-color: #ffffff;
        }

        .flex-center {
            display: flex;
            align-items: center;
        }
    </style>
@endsection
@section('title')
    PDF LIST OF FACTS ABOUT CAT
@endsection
@section('content')
    @foreach($facts as $fact)
        <p class="row-striped">
            {!! $fact->fact !!}
        </p>
    @endforeach
@endsection