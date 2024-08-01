<!-- resources/views/welcome.blade.php -->
@extends('Layouts.app')

@section('title', 'Criar Tarefa')
@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <form action="{{ route('list.store') }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf <!-- Adicione o token CSRF para segurança -->
            <h1 class="text-center mb-5 fw-bolder text-white bg-dark rounded-5 w-100 p-3">
                Digite as suas tarefas!
            </h1>
            <div class="mb-3">
                <label class="form-label text-black fs-5">Título</label>
                <input type="text" class="form-control"  name="titulo" placeholder="Estudar Docker à Noite!" required>
                <span>
            </div>
            <div class="mb-3">
                <label class="form-label text-black fs-5">Descrição da Atividade</label>
                <textarea class="form-control border-1" name="descricao" placeholder="Estudar a estrutura e o básico do Docker." rows="4" required></textarea>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto mt-4">
                <button type="submit" class="btn btn-primary rounded-5 rounded-bottom-1">
                    Enviar
                </button>
            </div>
        </form>
    </div>
@endsection
