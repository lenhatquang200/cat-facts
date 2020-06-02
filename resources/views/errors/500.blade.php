@extends('layouts.app')
@section('title')
    GET FACTS ABOUT CAT - Errors
@endsection
@section('content')
    <a href="{{ route('home') }}">Back to home</a>
    <br>
    {{ $exception->getMessage() }}
@endsection