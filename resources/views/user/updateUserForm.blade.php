@extends('layout')

@section('title', 'Updating User')

@section('content')
    <form action="/user" method="POST" class="">
        @csrf
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"/>
        </div>
        <div>
            <label for="surname">Sobrenome:</label>
            <input type="text" name="surname" id="surname" value="{{ old('surname') }}"/>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"/>
        </div>
        <div>
            <label for="birthDate">Data de Nascimento:</label>
            <input type="text" name="birthDate" id="birthDate" value="{{ old('birthDate') }}"/>
        </div>
        <div>
            <label for="gender">Sexo:</label>
            <select name="gender" id="gender" value="{{ old('gender') }}">
                <option value="male" selected>M</option>
                <option value="female">F</option>
            </select>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}"/>
        </div>
        <div>
            <label for="registration">Registration: {{ $registration }} </label>
        </div>
        <div>
            <label for="userType">Tipo de Usuário:</label>
            <select name="userType" id="userType" value="{{ old('userType') }}">
                <option value="student" selected>Estudante</option>
                <option value="teacher">Professor</option>
                <option value="worker">Funcionário</option>
                <option value="administrator">Administrador</option>
            </select>
        </div>
        <div>
            <label for="schoolYear">Série:</label>
            <select name="schoolYear" id="schoolYear" value="{{ old('schoolYear') }}">
                <option value="1" selected>1º Ano</option>
                <option value="2">2º Ano</option>
                <option value="3">3º Ano</option>
            </select>
        </div>
        <button type="submit">Criar</button>
    </form>
@endsection