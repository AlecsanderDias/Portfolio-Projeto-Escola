@extends('layout')

@section('title','Atualizar Notas')

@section('content')
    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="student_name">
                Usuário: {{ $grade->student_id }}
            </label>
        </div>
        <div>
            <label for="subject_name">
                Matéria: {{ $grade->subject_id }}
            </label>
        </div>
        <div>
            <label for="quarter">Bimestre:</label>
            <select name="quarter" id="quarter">
                @foreach($quarters as $key => $quarter) {
                    <option value="{{ $key }}" @if($grade->quarter == $key) selected @endif>{{ $quarter }}</option>
                }
                @endforeach
            </select>
        </div>
        <div>
            <label for="first_test">Nota Primerio Teste:</label>
            <input type="number" name="first_test" id="first_test" value="{{ $grade->first_test }}"/>
        </div>
        <div>
            <label for="second_test">Nota Segundo Teste:</label>
            <input type="number" name="second_test" id="second_test" value="{{ $grade->second_test }}"/>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection