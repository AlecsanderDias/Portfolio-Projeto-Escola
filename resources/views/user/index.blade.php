@extends('layout')

@section('title', 'Creating User')

@section('content')
    <ul>
        @foreach ($informations as $info)
            <li>
                @foreach ($info as $item)
                    {{ $item }}
                @endforeach
                <a href="{{ route('user.edit', $info['id']) }}">
                    <button>Editar</button>
                </a>
                <form action="{{ route('user.destroy', $info['id']) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection