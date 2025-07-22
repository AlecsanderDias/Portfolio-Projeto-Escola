@extends('layout')

@section('title', 'Atualizar Usuário')

@section('content')
    <form action="{{ route('users.update', $data['id']) }}" method="POST" class="">
        @method('PUT')
        @csrf
        <div>
            <label for="registration">Matrícula: {{ $data['registration'] }} </label>
        </div>
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
        @if($userType === 'student')
            <div>
                <label for="school_year">Série:</label>
                <select name="school_year" id="school_year">
                    <option value="{{ null }}" selected></option>
                    @foreach ($data['school_years'] as $key => $schoolYear)
                        <option value="{{ $key }}" @if($data['school_year'] === $key) selected @endif>{{ $schoolYear }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="school_class_id">Turma:</label>
                <select name="school_class_id" id="school_class_id">
                    <option value="{{ null }}" selected></option>
                    @foreach ($data['school_classes'] as $key => $schoolClass)
                        <option value="{{ $schoolClass['id'] }}" @if((int)$data['school_class_id'] === $schoolClass['id']) selected @endif>{{$schoolClass['id'] }} - {{ $data['school_rooms'][$schoolClass['id']] }} - {{  $schoolClass['class_name'] }}</option>
                    @endforeach
                </select>
            </div>
        @elseif($userType === 'teacher')
            <div>
                <label for="professional_number">Registro de Professor:</label>
                <input type="text" name="professional_number" id="professional_number" value="{{ $data['professional_number'] }}"/>
            </div>
        @endif
        <button type="submit">Salvar</button>
    </form>
@endsection