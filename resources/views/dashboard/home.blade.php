@extends('layout')

@section('title', 'Dashboard')

@section('content')
    @isset($result)
        @foreach ($result as $item)
            {{ $item }}
        @endforeach
    @endisset
    <a href="{{ route('user.create') }}">
        <button>Create User</button>
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection