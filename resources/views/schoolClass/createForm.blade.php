@extends('layout')

@section('title','Criar Turma')

@section('content')
    <form action="{{ route('schoolClasses.store') }}" method="POST">
        @csrf
        <div>
            <label for="class_name">Nome da Turma:</label>
            <input type="text" name="class_name" id="class_name" value="{{ old('class_name') }}"/>
        </div>
        <div>
            <label for="year">Ano Letivo:</label>
            <select name="year" id="year">
            @foreach ($years as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
            </select>
        </div>
            <label for="school_year">Série:</label>
            <select name="school_year" id="school_year">
            @foreach ($schoolYears as $key => $schoolYear)
                <option value="{{ $key }}">{{ $schoolYear }}</option>
            @endforeach
            </select>
        <div>
            <label for="room">Sala:</label>
            <select name="room" id="room">
            @foreach ($rooms as $key => $room)
                <option value="{{ $key }}">{{ $room }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit">Criar</button>
    </form>
@endsection