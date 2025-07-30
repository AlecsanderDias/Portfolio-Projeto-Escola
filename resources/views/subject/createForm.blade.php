@extends('layout')

@section('title', 'Criar Disciplina')

@section('content')
    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome da Disciplina:</label>
            {{-- <input type="text" name="name" id="name" value="{{ old('name') }}"> --}}
            <select name="subject_hours" id="subject_hours">
                @foreach ($subjectNames as $names)
                    <option value="{{ $names }}" @if(old('name') == $names) selected @endif>{{ $names }} horas</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="subject_hours">Carga Horária:</label>
            <select name="subject_hours" id="subject_hours">
                @foreach ($subjectHours as $hours)
                    <option value="{{ $hours }}" @if(old('subject_hours') == $hours) selected @endif>{{ $hours }} horas</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="teacher_id">Professor da Disciplina:</label>
            <select name="teacher_id" id="teacher_id">
            <option value="{{ null }}" selected>Sem professor</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" @if(old('teacher_id') == $teacher->id) selected @endif>{{ "$teacher->registration - $teacher->name, $teacher->surname" }}</option>
            @endforeach
        </select>
        </div>
        <button type="submit">Criar</button>
    </form>
@endsection