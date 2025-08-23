@extends('layout')

@section('title', 'Cronogramas')

@section('content')
    <h2>Cronogramas</h2>
    @if(!empty($schedules))
        <ul>
            @foreach ($schedules as $items)
                <li>
                    @foreach ($items as $item)
                        {{ $item }}
                    @endforeach
                    <a href="{{ route('schedules.edit', $items['id']) }}">
                        <button>Editar</button>
                    </a>
                    {{-- <form action="{{ route('schedules.destroy', $items['id']) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Deletar</button>
                    </form> --}}
                </li>
            @endforeach
        </ul>
    @else
        <p>Não há cronogramas no sistema!</p>
    @endif
    <a href="{{ route('home') }}">
        <button>Dashboard</button>
    </a>
    <a href="{{ route('schedules.create') }}">
        <button>Criar Cronograma</button>
    </a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection