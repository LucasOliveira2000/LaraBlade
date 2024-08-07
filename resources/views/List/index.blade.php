@extends('Layouts.auth')

@section('title', $title)
@section('content')

<div class="text-center mt-5">
    <a href="{{ route('list.create') }}" class="btn btn-primary custom-orange">
        Cadastrar Atividade
    </a>
    <a href="{{ route('list.atividadesConcluidas') }}" class="btn btn-primary custom-orange">
        <i class="fa-solid fa-bell g-2"></i> Atividades Concluídas
    </a>
</div>

<main class="flex-grow-1 min-vh-100">
    <div class="container mt-5 bg-body-secondary p-3 border border-3 rounded-bottom-5 shadow">
        <div class="row">
            @foreach ($lists as $list)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card mb-5 h-100">
                        <div class="row g-0 h-100">
                            <div class="col-4">
                                <img src="{{ asset('back1.png') }}" class="img-fluid rounded-start h-100" alt="...">
                            </div>
                            <div class="col-8 d-flex flex-column">
                                <div class="card-body flex-grow-1">
                                    <h5 class="card-title text-center border-bottom">{{ $list->titulo }}</h5>
                                    <p class="card-text mt-3">{{ $list->descricao }}</p>
                                    <p class="card-text mt-4"><small class="text-muted">há {{ $list->created_at->diffForHumans() }}</small></p>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between align-items-center p-3 gap-1">
                                    <form action="{{ route('list.concluir', ['uuid' => $list->uuid]) }}" method="POST" class="d-grid gap-2 col-6 mx-auto">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn custom-orange mb-2 flex-grow-1 d-grid">Concluir</button>
                                    </form>
                                    <a href="{{ route('list.edit', ['uuid' => $list->uuid]) }}" class="btn btn-secondary mb-2 me-2 flex-grow-1">Editar</a>
                                    <button type="button" class="btn btn-danger mb-2 flex-grow-1 d-grid" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-action="{{ route('list.destroy', ['uuid' => $list->uuid]) }}">Deletar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination-container d-flex justify-content-center mt-5">
            {{ $lists->links('pagination::bootstrap-4') }}
        </div>
    </div>
</main>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza de que deseja excluir esta atividade? Esta ação não pode ser desfeita.
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteModal = document.getElementById('confirmDeleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var actionUrl = button.getAttribute('data-action');
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = actionUrl;
        });
    });
</script>

<style>
.custom-orange {
    background-color: #ff8c00 !important; /* Orange */
    border-color: #ff8c00 !important; /* Orange */
    color: #fff !important; /* White */
}

.custom-orange:hover {
    background-color: #e67e22 !important; /* Darker Orange */
    border-color: #e67e22 !important; /* Darker Orange */
    color: #fff !important; /* White */
}

.conclude-btn {
    background-color: #28a745; /* Verde */
    border-color: #28a745; /* Verde */
    color: #fff; /* Branco */
}

.conclude-btn:hover {
    background-color: #218838; /* Verde mais escuro */
    border-color: #1e7e34; /* Verde mais escuro */
    color: #fff; /* Branco */
}

/* Estilos para a paginação */
.pagination .page-link {
    color: #ff8c00 !important; /* Orange */
    border-color: #ff8c00 !important; /* Orange */
}

.pagination .page-link:hover {
    background-color: #e67e22 !important; /* Darker Orange */
    border-color: #e67e22 !important; /* Darker Orange */
    color: #fff !important; /* White */
}

.pagination .page-item.active .page-link {
    background-color: #ff8c00 !important; /* Orange */
    border-color: #ff8c00 !important; /* Orange */
    color: #fff !important; /* White */
}

</style>

@endsection
