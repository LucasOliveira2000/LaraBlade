@extends('Layouts.app')

@section('title', $title)
@section('content')

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <form action="{{ route('user.register') }}" method="POST" class="form bg-secondary p-5 rounded-5 border border-5" enctype="multipart/form-data" style="max-width: 500px; width: 100%;">
        @csrf
        <div class="mb-3 text-center">
            <label class="fs-5 mb-4 bg-dark text-white rounded-5 p-2 w-75">CADASTRO DE USUÁRIO</label>
        </div>
        <div class="mb-3">
            <label class="form-label text-black fs-5">Nome Completo</label>
            <input name="name" type="text" class="form-control rounded-5" placeholder="Digite seu nome completo" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label text-black fs-5">Email</label>
            <input name="email" type="email" class="form-control rounded-5" placeholder="exemplo@gmail.com" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label text-black fs-5">Senha</label>
            <input name="password" type="password" class="form-control rounded-5" placeholder="Digite números e símbolos" required>
            @error('password')
                <div class="text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Lembrar de mim</label>
        </div>
        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-primary rounded-5 rounded-bottom-1 custom-orange">
                Enviar
            </button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('user.login') }}" class="text-decoration-none text-white">
                Já possui uma conta? Login
            </a>
        </div>
    </form>
</div>

@endsection

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
</style>
