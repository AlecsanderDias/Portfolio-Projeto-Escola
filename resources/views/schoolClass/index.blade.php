@extends('layout')

@section('title', 'Turmas')

@section('content')
    <h2>Turmas</h2>
    @if(!empty($schoolClasses))
        <ul>
            @foreach ($schoolClasses as $classes)
                <li>
                    @foreach ($classes as $item)
                        {{ $item }}
                    @endforeach
                    <a href="{{ route('schoolClass.edit', $classes['id']) }}">
                        <button>Editar</button>
                    </a>
                    <form action="{{ route('schoolClass.destroy', $classes['id']) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Não há turmas no sistema!</p>
    @endif
    <a href="{{ route('schoolClass.create') }}">
        <button>Criar Turma</button>
    </a>
    <a href="{{ route('home') }}">
        <button>Dashboard</button>
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection