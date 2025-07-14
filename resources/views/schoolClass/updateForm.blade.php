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
                <option value="2021" selected>2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
        </div>
            <label for="school_year">Série:</label>
            <select name="school_year" id="school_year">
                <option value="1" selected>1º Ano</option>
                <option value="2">2º Ano</option>
                <option value="3">3º Ano</option>
            </select>
        <div>
            <label for="room">Sala:</label>
            <select name="room" id="room">
                <option value="11" selected>11</option>
                <option value="22">22</option>
                <option value="33">33</option>
            </select>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection