@extends('Layouts.auth')

@section('title', $title)
@section('content')

<div class="text-center mt-5">
    <a href="{{ route('list.create') }}" class="btn btn-primary">
        Cadastrar Atividade
    </a>
</div>

<div class="container mt-5">
    <div class="row">
        @foreach ($lists as $list)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header text-center">
                        {{ $list->titulo }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $list->descricao }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        há {{ $list->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination-container d-flex justify-content-center mt-5">
        {{ $lists->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
