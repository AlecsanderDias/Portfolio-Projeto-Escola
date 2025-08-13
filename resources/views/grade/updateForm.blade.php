@extends('layout')

@section('title','Atualizar Notas')

@section('content')
    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="">
                Usuário: 
            </label>
        </div>
        <div>
            <label for="quarter">Bimestre:</label>
            <select name="quarter" id="quarter">
                @foreach($quarters as $key => $quarter) {
                    <option value="{{ $key }}" @if($grade->quarter == $key) selected @endif>{{ $quarter }}</option>
                }
            </select>
        </div>
        <div>
            <label for="first_test">Nota Primerio Teste:</label>
            <input type="number">
        </div>
        <div>
            <label for="second_test">Nota Segundo Teste:</label>
            <input type="number">
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection