@extends('layout')

@section('title', 'Criar Cronograma')

@section('content')
    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
    </form>
@endsection