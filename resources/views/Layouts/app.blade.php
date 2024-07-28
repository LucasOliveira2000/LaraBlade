<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'My Laravel App')</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #1F3C80;">
    <nav class="navbar navbar-expand-lg border rounded bg-dark ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src=" {{ asset("List.png")}}" alt="Logo" width="80" height="50" class="d-inline-block align-text-top">
          </a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-white fs-5" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white fs-5" href="#">Atividades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white fs-5" href="#">Contato</a>
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
   <footer class="bg-dark text-light py-3 mt-auto border rounded position-relative align-content-center d-flex">
        <div class="container text-center">
            <p class="mb-0 fw-bolder fs-5">&copy; Desenvolvido por Lucas Oliveira</p>
        </div>
    </footer>
</body>
</html>



{{-- <a class="navbar-brand" href="#">
    <img src=" {{ asset("List.png")}}" alt="Logo" width="80" height="50" class="d-inline-block align-text-top">
  </a> --}}
