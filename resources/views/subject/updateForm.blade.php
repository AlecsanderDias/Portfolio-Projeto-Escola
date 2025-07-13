@extends('layout')

@section('title', 'Atualizar Disciplina')

@section('content')
    <form action="{{ route('subject.update', $subject->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Nome da Disciplina:</label>
            <input type="text" name="name" id="name" value="{{ $subject->name }}">
        </div>
        <div>
            <label for="subject_hours">Carga Horária:</label>
            <select name="subject_hours" id="subject_hours">
                @foreach ($subjectHours as $hours)
                    <option value="{{ $hours }}" @if($subject->subject_hours == $hours) selected @endif>{{ $hours }} horas</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="teacher_id">Professor da Disciplina:</label>
            <select name="teacher_id" id="teacher_id">
            <option value="{{ null }}" selected>Sem professor</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" @if($subject->teacher_id == $teacher->id) selected @endif>{{ "$teacher->registration - $teacher->name, $teacher->surname" }}</option>
            @endforeach
        </select>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection