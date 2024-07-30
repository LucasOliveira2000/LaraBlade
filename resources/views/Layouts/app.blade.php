<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'My Laravel App')</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background: url('{{ asset('back3.png') }}')">
    <nav class="navbar navbar-expand-lg p-3 border border-3 rounded-bottom-5 bg-dark justify-content-center">
        <div class="container-fluid justify-content-center">
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="nav nav-tabs text-white" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link {{ request()->routeIs('site.home') ? 'active' : '' }}" href="{{ route('site.home') }}" role="tab" aria-selected="true">Home</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link {{ request()->routeIs('list.index') ? 'active' : '' }}" href="{{ route('list.index') }}" role="tab" aria-selected="true">Atividades</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" role="tab" aria-selected="true">Contato</a>
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
