@extends('layout')

@section('title', 'Disciplinas')

@section('content')
     <h2>Disciplinas</h2>
    @if(!empty($subjects))
        <ul>
            @foreach ($subjects as $items)
                <li>
                    @foreach ($items as $item)
                        {{ $item }}
                    @endforeach
                    <a href="{{ route('subject.edit', $items['id']) }}">
                        <button>Editar</button>
                    </a>
                    <form action="{{ route('subject.destroy', $items['id']) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Não há disciplinas no sistema!</p>
    @endif
    <a href="{{ route('subject.create') }}">
        <button>Criar Disciplina</button>
    </a>
    <a href="{{ route('home') }}">
        <button>Dashboard</button>
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection