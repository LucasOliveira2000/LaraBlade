@extends('Layouts.app')

@section('title', $title)
@section('content')

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <form action="{{ route('user.logar') }}" method="POST" class="form bg-secondary w-50 p-5 rounded-5 border border-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 text-center">
            <label class="fs-5 mb-4 bg-dark text-white rounded-5 p-2 w-75">LOGIN</label>
        </div>
        <div class="mb-3 col-8 mx-auto">
            <label class="form-label text-black fs-5">Email</label>
            <input name="email" type="email" class="form-control rounded-5 @error('email') is-invalid @enderror" placeholder="exemplo@gmail.com" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 col-8 mx-auto">
            <label class="form-label text-black fs-5">Senha</label>
            <input name="password" type="password" class="form-control rounded-5 @error('password') is-invalid @enderror" placeholder="Digite números e símbolos" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 form-check col-8 mx-auto">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label">Lembrar de mim</label>
        </div>
        <div class="d-grid gap-2 col-5 mx-auto mt-4">
            <button type="submit" class="btn btn-primary rounded-5 rounded-bottom-1">
                Enviar
            </button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('user.create') }}" class="text-decoration-none text-white">
                Não tem uma conta? Registre-se
            </a>
        </div>
    </form>
</div>

@endsection
