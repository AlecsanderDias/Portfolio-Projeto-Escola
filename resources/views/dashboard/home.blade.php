@extends('layout')

@section('title', 'Dashboard')

@section('content')
    @isset($result)
        @foreach ($result as $item)
            {{ $item }}
        @endforeach
    @endisset    
    <a href="{{ route('users.index') }}">
        <button>Usuários</button>
    </a>
    <a href="{{ route('schoolClasses.index') }}">
        <button>Turmas</button>
    </a>
    <a href="{{ route('subjects.index') }}">
        <button>Disciplinas</button>
    </a>
    <a href="{{ route('grades.index') }}">
        <button>Notas</button>
    </a>
    <a href="{{ route('lessons.index') }}">
        <button>Aulas</button>
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection