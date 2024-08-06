@extends('Layouts.auth')

@section('title', $title)
@section('content')

<div class="text-center mt-5">
    <a href="{{ route('list.create') }}" class="btn btn-primary custom-orange">
        Cadastrar Atividade
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
                                <img src="{{ asset("back1.png")}}" class="img-fluid rounded-start h-100" alt="...">
                            </div>
                            <div class="col-8 d-flex flex-column">
                                <div class="card-body flex-grow-1">
                                    <h5 class="card-title text-center border-bottom">{{ $list->titulo }}</h5>
                                    <p class="card-text mt-3">{{ $list->descricao }}</p>
                                    <p class="card-text mt-4"><small class="text-muted">há {{ $list->created_at->diffForHumans() }}</small></p>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between align-items-center p-3">
                                    <a href="{{ route('list.create') }}" class="btn btn-primary mb-2 me-2 flex-grow-1 custom-orange">Concluir</a>
                                    <a href="{{ route('list.create') }}" class="btn btn-secondary mb-2 me-2 flex-grow-1">Editar</a>
                                    <a href="{{ route('list.create') }}" class="btn btn-danger mb-2 flex-grow-1">Deletar</a>
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
