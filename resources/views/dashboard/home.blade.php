@extends('layout')

@section('title', 'Dashboard')

@section('content')
    @isset($result)
        @foreach ($result as $item)
            {{ $item }}
        @endforeach
    @endisset    
    <a href="{{ route('user.index') }}">
        <button>Usuários</button>
    </a>
    <a href="{{ route('schoolClass.index') }}">
        <button>Turmas</button>
    </a>
    <a href="{{ route('subject.index') }}">
        <button>Disciplinas</button>
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection