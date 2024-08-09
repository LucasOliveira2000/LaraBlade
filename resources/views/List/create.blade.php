@extends('Layouts.app')

@section('title', 'Criar Tarefa')
@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <form action="{{ route('list.store') }}" method="POST" class="form bg-secondary p-5 rounded-5 border border-5" enctype="multipart/form-data" style="max-width: 500px; width: 100%;">
            @csrf
            <div class="mb-3 text-center">
                <label class="fs-5 mb-4 bg-dark text-white rounded-5 p-2 w-75">CADASTRO DE ATIVIDADES</label>
            </div>
            <div class="mb-3">
                <label class="form-label text-black fs-5">Título</label>
                <input type="text" class="form-control rounded-5" name="titulo" placeholder="Estudar Docker à Noite!" value="{{ old('titulo') }}" required>
                @error("titulo")
                    <div class="text-white z-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-black fs-5">Descrição da Atividade</label>
                <textarea class="form-control rounded-5 border-1 no-resize" name="descricao" value="{{ old('descricao') }}" placeholder="Estudar a estrutura e o básico do Docker." rows="5" required></textarea>
                @error("descricao")
                    <div class="text-white">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary rounded-5 rounded-bottom-1 custom-orange">
                    Enviar
                </button>
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

.no-resize {
    resize: none; /* Disable resizing */
}

</style>
