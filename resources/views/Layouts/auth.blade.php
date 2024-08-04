<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'My Laravel App')</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
@csrf
<body style="background: url('{{ asset('back3.png') }}')">
    <x-toast />
    <nav class="navbar navbar-expand-lg p-3 border border-3 rounded-bottom-5 bg-dark justify-content-center">
        {{-- <img src="{{asset("Logo.png")}}" width="50px"> --}}
        <div class="container-fluid justify-content-center">
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="nav nav-tabs text-white" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link " href="{{ route('list.index') }}" role="tab" aria-selected="true">Atividades</a>
                </li>
                <li class="nav-item" role="presentation">
                    <form action="{{ route('user.destroy') }}" method="POST" class="form" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="nav-link " role="tab" aria-selected="true">Logout</button>
                    </form>
                </li>

            </ul>
          </div>
        </div>
    </nav>
    <main class="flex-grow-1 min-vh-100">
      <div class="container">
        @yield('content')
      </div>
    </main>
   <footer class="bg-dark text-light p-3 mt-auto border rounded-top-5 position-relative align-content-center d-flex">
        <div class="container text-center">
            <p class="mb-0 fw-bolder fs-5">&copy; Desenvolvido por Lucas Oliveira</p>
        </div>
    </footer>
</body>
</html>
