<!-- resources/views/welcome.blade.php -->
@extends('Layouts.app')

@section('title', 'Lista de Atividades')
@section('content')

<div>
    <a {{ request()->routeIs('list.create') ? 'active' : '' }} href="{{ route('list.create') }}"> Cadastrar Atividade </a>
</div>


@endsection
