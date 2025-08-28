@extends('layout')

@section('title', 'Criar Cronograma')

@section('content')
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        <div>
            <label for="day">Dia:</label>
            <select name="day" id="day">
                @foreach ($days as $key => $day)
                    <option value="{{ $key }}">{{ $day }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="hour">Horário:</label>
            <select name="hour" id="hour">
                @foreach ($hours as $hour)
                    <option value="{{ $hour }}">{{ $hour }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="semester">Semestre:</label>
            <select name="semester" id="semester">
                <option value="1">1º Semestre</option>
                <option value="2">2º Semestre</option>
            </select>
        </div>
        <div>
            <label for="subject">Matéria:</label>
            <select name="subject" id="subject">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject['id'] }}">{{ $subject['subject_name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="school_class">Turma:</label>
            <select name="school_class" id="school_class">
                @foreach ($schoolClasses as $schoolClass)
                    <option value="{{ $schoolClass['id'] }}">{{ $schoolClass['class_name'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Criar</button>
    </form>
@endsection