@extends('layout')

@section('title', 'Users')

@section('content')
    <h2>Usuários / Informações</h2>
    @if(!empty($data))
        <ul>
            @foreach ($data as $person)
                <li>
                    @foreach ($person as $item)
                        {{ $item }}
                    @endforeach
                    <a href="{{ route('user.edit', $person['id']) }}">
                        <button>Editar</button>
                    </a>
                    <form action="{{ route('user.destroy', $person['id']) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Deletar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Não há usuários no sistema!</p>    
    @endif
    <a href="{{ route('home') }}">
        <button>Dashboard</button>
    </a>
    <a href="{{ route('user.create') }}">
        <button>Criar Usuário</button>
    </a>
@endsection