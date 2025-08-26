@extends('layout')

@section('title','Criar Aulas')

@section('content')
    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        <div>
            <label for="start_date">Data Início</label>
            <input type="date" id="start_date" name="start_date" value="{{ $today }}">
        </div>
        <div>
            <label for="end_date">Data Término</label>
            <input type="date" id="end_date" name="end_date" value="{{ $tomorrow }}">
        </div>
        <button type="submit">Criar Notas</button>
    </form>
@endsection