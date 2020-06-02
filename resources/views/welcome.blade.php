@extends('layouts.app')
@section('title')
    GET FACTS ABOUT CAT
@endsection
@section('content')
    <p>
        <a href="{{ route('lists-fact') }}"> Go to lists fact </a>
    </p>
    <form action="{{ route('cat-facts') }}" method="get">
        <input type="number" placeholder="Enter quantity of facts." required min="0" step="1" name="quantity_of_fact">
        <button type="submit">Get Facts</button>
    </form>
@endsection