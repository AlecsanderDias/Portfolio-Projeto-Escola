@extends('layout')

@section('title', 'Criar Usuário')

@section('content')
    <form action="{{ route('users.store') }}" method="POST" class="">
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
            <label for="birth_date">Data de Nascimento:</label>
            <input type="text" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"/>
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
        @if($userType === 'student')
            <div>
                <label for="school_year">Série:</label>
                <select name="school_year" id="school_year">
                    <option value="{{ null }}" selected></option>
                    @foreach ($data['schoolYears'] as $key => $schoolYear)
                        <option value="{{ $key }}">{{ $schoolYear }}</option>
                    @endforeach
                    {{-- <option value="1">1º Ano</option>
                    <option value="2">2º Ano</option>
                    <option value="3">3º Ano</option> --}}
                </select>
            </div>
            <div>
                <label for="school_class_id">Turma:</label>
                <select name="school_class_id" id="school_class_id">
                    <option value="{{ null }}" selected></option>
                    @foreach ($data['schoolClasses'] as $key => $schoolClass)
                        <option value="{{ $key }}">{{ $schoolClass }}</option>
                    @endforeach
                    {{-- <option value="101">101</option>
                    <option value="201">201</option>
                    <option value="301">301</option> --}}
                </select>
            </div>
        @endif
        @if($userType === 'teacher')
           <div>
                <label for="professional_number">Registro de Professor:</label>
                <input type="text" name="professional_number" id="professional_number" value="{{ old('professional_number') }}"/>
            </div> 
        @endif
        {{-- <div>
            <label for="user_type">Tipo de Usuário:</label>
            <select name="user_type" id="user_type" value="{{ old('user_type') }}">
                <option value="student" selected>Estudante</option>
                <option value="teacher">Professor</option>
                <option value="worker">Funcionário</option>
                <option value="administrator">Administrador</option>
            </select>
        </div> --}}
        <button type="submit">Criar</button>
    </form>
@endsection