<!-- resources/views/home.blade.php -->
@extends('Layouts.app')

@section('title', 'Home')
@section('content')

<main>
    <div class="container my-5">
        <div class="row text-center">
            <div class="col-lg-12">
                <h1 class="display-4 mb-4">Bem-vindo ao To Do List!</h1>
                <p class="lead mb-4">Gerencie suas atividades de forma simples e eficaz.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-light">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Cadastrar Atividade</h5>
                        <p class="card-text mb-4">Adicione novas atividades à sua lista e mantenha-se organizado.</p>
                        <a href="{{ route('list.create') }}" class="btn btn-primary btn-lg">Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-light">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Visualizar Atividades</h5>
                        <p class="card-text mb-4">Veja todas as suas atividades pendentes e conclua-as quando necessário.</p>
                        <a href="{{ route('list.index') }}" class="btn btn-success btn-lg">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-light">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3">Atividades Concluídas</h5>
                        <p class="card-text mb-4">Acesse suas atividades já concluídas para revisão ou arquivamento.</p>
                        <a href="{{ route('list.atividadesConcluidas') }}" class="btn btn-warning btn-lg">Concluídas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .btn-lg {
        padding: 0.75rem 1.25rem;
        font-size: 1.25rem;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
</style>
@endpush
