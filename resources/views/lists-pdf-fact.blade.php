@extends('layouts.app')
@section('title')
    LIST PDF OF FACTS ABOUT CAT
@endsection
@section('content')
    <p>
        <a href="{{ route('home') }}"> Back to home </a>
    </p>
    <table class="table  table-bordered">
        <thead>
        <tr>
            <th>
                Quantity
            </th>
            <th>
                File
            </th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($files))
            @foreach($files as $file)
                <tr>
                    <td>
                        {{ $file['quantity'] }}
                    </td>
                    <td>
                        <a href="{{ $file['url'] }}">{{ $file['filename'] }}</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2">
                    Not found Facts
                </td>
            </tr>
        @endif

        </tbody>
    </table>
@endsection