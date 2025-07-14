@extends('layout')

@section('title','Notas')

@section('content')
    <h2>Notas</h2>
    @if(!empty($grades))
        <ul>
            @foreach ($grades as $items)
                <li>
                    @foreach ($items as $item)
                        {{ $item }}
                    @endforeach
                    <a href="{{ route('grades.edit', $items['id']) }}">
                        <button>Editar</button>
                    </a>
                    <form action="{{ route('grades.destroy', $items['id']) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Não há notas no sistema!</p>
    @endif
    <a href="{{ route('grades.create') }}">
        <button>Gerar Notas</button>
    </a>
    <a href="{{ route('home') }}">
        <button>Dashboard</button>
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection