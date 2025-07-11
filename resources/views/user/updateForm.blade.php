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
            <label for="birthDate">Data de Nascimento:</label>
            <input type="text" name="birthDate" id="birthDate" value="{{ $data['birthDate'] }}"/>
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
            <label for="userType">Tipo de Usuário:</label>
            <select name="userType" id="userType" value="{{ $data['userType'] }}">
                <option value="student" selected>Estudante</option>
                <option value="teacher">Professor</option>
                <option value="worker">Funcionário</option>
                <option value="administrator">Administrador</option>
            </select>
        </div>
        @if($data['userType'] == 'student')
        <div>
            <label for="schoolYear">Série:</label>
            <select name="schoolYear" id="schoolYear">
                <option value="{{ null }}"></option>
                <option value="1">1º Ano</option>
                <option value="2">2º Ano</option>
                <option value="3">3º Ano</option>
            </select>
        </div>
        <div>
            <label for="schoolClass_id">Turma:</label>
            <select name="schoolClass_id" id="schoolClass_id">
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