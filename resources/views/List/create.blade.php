<!-- resources/views/welcome.blade.php -->
@extends('Layouts.app')

@section('title', 'Criar Tarefa')
@section('content')
    <form action="post" class="form" enctype="multipart/form-data">
        <h1 class="text-center mt-5 mb-5 fw-bolder text-white">
            Digite as suas tarefas!
        </h1>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-white fs-5">Titulo</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Estudar Docker a Noite!">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label text-white fs-5">Descrição da Atividade</label>
            <textarea class="form-control border-1" placeholder="Estudar a estrutura e o básico do Docker." rows="4"></textarea>
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary mt-4 rounded-5 rounded-bottom-1" type="button">Enviar</button>
          </div>
        </div>
    </form>
@endsection

