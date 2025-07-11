@extends('layout')

@section('title','Criar Turma')

@section('content')
    <form action="{{ route('schoolClass.store') }}" method="POST">
        @csrf
        <div>
            <label for="className">Nome da Turma:</label>
            <input type="text" name="className" id="className" value="{{ old('className') }}"/>
        </div>
        <div>
            <label for="year">Ano Letivo:</label>
            <select name="year" id="year">
                <option value="2021" selected>2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
        </div>
            <label for="schoolYear">Série:</label>
            <select name="schoolYear" id="schoolYear">
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
        <button type="submit">Criar</button>
    </form>
@endsection