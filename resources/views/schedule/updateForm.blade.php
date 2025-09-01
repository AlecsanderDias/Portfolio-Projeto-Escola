@extends('layout')

@section('title', 'Atualizar Cronograma')

@section('content')
    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="day">Dia:</label>
            <select name="day" id="day">
                @foreach ($days as $key => $day)
                    <option value="{{ $key }}" @if($schedule->day == $key) selected @endif>{{ $day }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="hour">Horário:</label>
            <select name="hour" id="hour">
                @foreach ($hours as $hour)
                    <option value="{{ $hour }}" @if($schedule->hour == $hour) selected @endif>{{ $hour }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="semester">Semestre:</label>
            <select name="semester" id="semester">
                <option value="1" @if($schedule->semester == 1) selected @endif>1º Semestre</option>
                <option value="2" @if($schedule->semester == 2) selected @endif>2º Semestre</option>
            </select>
        </div>
        <div>
            <label for="subject_id">Matéria:</label>
            <select name="subject_id" id="subject_id">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject['id'] }}"
                    @if($schedule->subject_id == $subject['id']) selected @endif>{{ $subject['subject_name'] }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="school_class_id">Turma:</label>
            <select name="school_class_id" id="school_class_id">
                @foreach ($schoolClasses as $schoolClass)
                    <option value="{{ $schoolClass['id'] }}"
                    @if($schedule->school_class_id == $schoolClass['id']) selected @endif>{{ $schoolClass['class_name'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Atualizar</button>
    </form>
@endsection