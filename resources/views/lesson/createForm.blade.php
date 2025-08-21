@extends('layout')

@section('title','Criar Aulas')

@section('content')
    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        <div>
            <label for="startDate">Data Início</label>
            <input type="date" id="startDate" name="startDate" value="{{ $today }}">
        </div>
        <div>
            <label for="endDate">Data Término</label>
            <input type="date" id="endDate" name="endDate" value="{{ $tomorrow }}">
        </div>
        <button type="submit">Criar Notas</button>
    </form>
@endsection