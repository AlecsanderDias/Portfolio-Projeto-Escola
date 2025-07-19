@extends('layout')

@section('title', 'Criar Usuário')

@section('content')
    <form action="{{ route('users.store') }}" method="POST" class="">
        @csrf
        <input hidden type="text" name="user_type" value="{{ $userType }}" disabled>
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
                    @foreach ($data->schoolYears as $key => $schoolYear)
                        <option value="{{ $key }}">{{ $schoolYear }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="school_class_id">Turma:</label>
                <select name="school_class_id" id="school_class_id">
                    <option value="{{ null }}" selected></option>
                    @foreach ($data->schoolClasses as $key => $schoolClass)
                        <option value="{{ $schoolClass['id'] }}">{{  $schoolClass['class_name'] }}</option>
                    @endforeach
                </select>
            </div>
        @elseif($userType === 'teacher')
           <div>
                <label for="professional_number">Registro de Professor:</label>
                <input type="text" name="professional_number" id="professional_number" value="{{ old('professional_number') }}"/>
            </div> 
        @endif
        <button type="submit">Criar</button>
    </form>
@endsection