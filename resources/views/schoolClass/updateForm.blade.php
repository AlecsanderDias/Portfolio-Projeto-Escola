@extends('layout')

@section('title','Atualizar Turma')

@section('content')
    <form action="{{ route('schoolClasses.update', $schoolClass->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="class_name">Nome da Turma:</label>
            <input type="text" name="class_name" id="class_name" value="{{ $schoolClass->class_name }}"/>
        </div>
        <div>
            <label for="year">Ano Letivo:</label>
            <select name="year" id="year">
            @foreach ($years as $year)
                <option value="{{ $year }}" 
                @if($schoolClass->year === $year) selected @endif>{{ $year }}</option>
            @endforeach
            </select>
        </div>
            <label for="school_year">Série:</label>
            <select name="school_year" id="school_year">
            @foreach ($schoolYears as $key => $schoolYear)
                <option value="{{ $key }}" 
                @if($schoolClass->school_year === "$key") selected @endif>{{ $schoolYear }}</option>
            @endforeach
            </select>
        <div>
            <label for="room">Sala:</label>
            <select name="room" id="room">
            @foreach ($rooms as $key => $room)
                <option value="{{ $key }}"
                @if($schoolClass->room === "$key") selected @endif>{{ $room }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection