@extends('layout')

@section('title', 'Criar Disciplina')

@section('content')
    <form action="{{ route('subject.store') }}">
        <div>
            <label for="name">Nome da Disciplina:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="subjectHours">Carga Horária:</label>
            <select name="subjectHours" id="subjectHours">
                <option value="20">20 horas</option>
                <option value="40">40 horas</option>
                <option value="80">80 horas</option>
            </select>
        </div>
        <div>
            <label for="professor_id">Professor da Disciplina:</label>
            <select name="professor_id" id="professor_id">
                <option value="{{ null }}">Sem professor</option>
                <option value="20">20 horas</option>
                <option value="40">40 horas</option>
                <option value="80">80 horas</option>
            </select>
        </div>
        <button type="submit">Criar</button>
    </form>
@endsection