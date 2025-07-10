@extends('layout')

@section('title', 'Login')

@section('content')
    <form action="/login" method="POST" class="">
        @csrf
        <div>
            <label for="registration">Matrícula:</label>
            <input type="text" name="registration" id="registration"/>
        </div>
        <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password"/>
        </div>
        <button type="submit">Entrar</button>
    </form>
@endsection