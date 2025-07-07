@extends('layout')

@section('title', 'Creating User')

@section('content')
    <ul>
        @foreach ($informations as $info)
            <li>
                @foreach ($info as $item)
                    {{ $item }}
                @endforeach
            </li>
        @endforeach
    </ul>
@endsection