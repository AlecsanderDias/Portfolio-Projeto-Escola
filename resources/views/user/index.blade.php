@extends('layout')

@section('title', 'Usuários')

@section('content')
    <h2>Usuários / Informações</h2>
    @if(!empty($data))
        <ul>
            @foreach ($data as $person)
                <li>
                    @foreach ($person as $item)
                        {{ $item }}
                    @endforeach
                    <a href="{{ route('users.edit', $person['id']) }}">
                        <button>Editar</button>
                    </a>
                    <form action="{{ route('users.destroy', $person['id']) }}" method="POST">
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
    <a href="{{ route('users.create', ['userType' => 'student']) }}">
        <button>Criar Estudante</button>
    </a>
    <a href="{{ route('users.create', ['userType' => 'teacher']) }}">
        <button>Criar Professor</button>
    </a>
    <a href="{{ route('users.create', ['userType' => 'worker']) }}">
        <button>Criar Funcionário</button>
    </a>
    <a href="{{ route('users.create', ['userType' => 'administrator']) }}">
        <button>Criar Adminsitrador</button>
    </a>
@endsection