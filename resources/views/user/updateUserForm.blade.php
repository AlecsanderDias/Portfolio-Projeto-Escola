@extends('layout')

@section('title', 'Updating User')

@section('content')
    <form action="/user" method="POST" class="">
        @csrf
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ $info->name }}"/>
        </div>
        <div>
            <label for="surname">Sobrenome:</label>
            <input type="text" name="surname" id="surname" value="{{ $info->surname }}"/>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $info->email }}"/>
        </div>
        <div>
            <label for="birthDate">Data de Nascimento:</label>
            <input type="text" name="birthDate" id="birthDate" value="{{ $info->birthDate }}"/>
        </div>
        <div>
            <label for="gender">Sexo:</label>
            <select name="gender" id="gender" value="{{ $info->gender }}">
                <option value="male" selected>M</option>
                <option value="female">F</option>
            </select>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="{{ $info->cpf }}"/>
        </div>
        <div>
            <label for="registration">Registration: {{ $user->registration }} </label>
        </div>
        <div>
            <label for="userType">Tipo de Usuário:</label>
            <select name="userType" id="userType" value="{{ $user->userType }}">
                <option value="student" selected>Estudante</option>
                <option value="teacher">Professor</option>
                <option value="worker">Funcionário</option>
                <option value="administrator">Administrador</option>
            </select>
        </div>
        @if($info->userType == 'student')
        <div>
            <label for="schoolYear">Série:</label>
            <select name="schoolYear" id="schoolYear" value="{{ $info->schoolYear }}">
                <option value="1" selected>1º Ano</option>
                <option value="2">2º Ano</option>
                <option value="3">3º Ano</option>
            </select>
        </div>
        <div>
            <label for="schoolClass_id">Turma:</label>
            <select name="schoolClass_id" id="schoolClass_id" value="{{ $info->schoolClass_id }}">
                <option value="101" selected>101</option>
                <option value="201">201</option>
                <option value="301">301</option>
            </select>
        </div>
        @endif
        <button type="submit">Salvar</button>
    </form>
@endsection