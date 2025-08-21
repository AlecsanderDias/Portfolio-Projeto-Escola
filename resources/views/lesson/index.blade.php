@extends('layout')

@section('title', 'Aulas')

@section('content')
    <h2>Notas</h2>
    @if(!empty($lessons))
        <ul>
            @foreach ($lessons as $items)
                <li>
                    @foreach ($items as $item)
                        {{ $item }}
                    @endforeach
                    <a href="{{ route('lessons.edit', $items['id']) }}">
                        <button>Editar</button>
                    </a>
                    <form action="{{ route('lessons.destroy', $items['id']) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Não há aulas no sistema!</p>
    @endif
    <a href="{{ route('home') }}">
        <button>Dashboard</button>
    </a>
    <a href="{{ route('lessons.create') }}">
        <button>Criar Aulas</button>
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection