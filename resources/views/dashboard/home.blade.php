@extends('layout')

@section('title', 'Dashboard')

@section('content')
    @foreach ($result as $item)
        {{ $item }}        
    @endforeach
@endsection