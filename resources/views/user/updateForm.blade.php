@extends('layout')

@section('title', 'Atualizar Usuário')

@section('content')
    <form action="{{ route('user.update', $data['id']) }}" method="POST" class="">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ $data['name'] }}"/>
        </div>
        <div>
            <label for="surname">Sobrenome:</label>
            <input type="text" name="surname" id="surname" value="{{ $data['surname'] }}"/>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $data['email'] }}"/>
        </div>
        <div>
            <label for="birth_date">Data de Nascimento:</label>
            <input type="text" name="birth_date" id="birth_date" value="{{ $data['birth_date'] }}"/>
        </div>
        <div>
            <label for="gender">Sexo:</label>
            <select name="gender" id="gender" value="{{ $data['gender'] }}">
                <option value="male" selected>M</option>
                <option value="female">F</option>
            </select>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="{{ $data['cpf'] }}"/>
        </div>
        <div>
            <label for="registration">Registration: {{ $data['registration'] }} </label>
        </div>
        <div>
            <label for="user_type">Tipo de Usuário:</label>
            <select name="user_type" id="user_type" value="{{ $data['user_type'] }}">
                <option value="student" selected>Estudante</option>
                <option value="teacher">Professor</option>
                <option value="worker">Funcionário</option>
                <option value="administrator">Administrador</option>
            </select>
        </div>
        @if($data['user_type'] == 'student')
        <div>
            <label for="school_year">Série:</label>
            <select name="school_year" id="school_year">
                <option value="{{ null }}"></option>
                <option value="1">1º Ano</option>
                <option value="2">2º Ano</option>
                <option value="3">3º Ano</option>
            </select>
        </div>
        <div>
            <label for="schoolclass_id">Turma:</label>
            <select name="schoolclass_id" id="schoolclass_id">
                <option value="{{ null }}"></option>
                <option value="101">101</option>
                <option value="201">201</option>
                <option value="301">301</option>
            </select>
        </div>
        @endif
        <button type="submit">Salvar</button>
    </form>
@endsection