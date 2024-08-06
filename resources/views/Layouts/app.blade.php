<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', 'My Laravel App')</title>
   <link rel="icon" href="{{ asset('Logo.jpg') }}" type="image/x-icon">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <style>
       body {
           background: url('{{ asset('') }}');
           background-size: cover;
           background-attachment: fixed;
       }
       .navbar {
           background-color: #343a40 !important; /* Dark grey */
           border-bottom: 3px solid #ff8c00; /* Orange */
           border-radius: 0 0 20px 20px;
       }
       .nav-link {
           color: #ff8c00 !important; /* Orange */
       }
       .nav-link:hover {
           color: #ffffff !important; /* White */
           background-color: #ff8c00 !important; /* Orange */
           border-radius: 10px;
       }
       .nav-tabs .nav-link.active {
           color: #ffffff !important; /* White */
           background-color: #ff8c00 !important; /* Orange */
           border-radius: 10px;
       }
       .footer {
           background-color: #343a40; /* Dark grey */
           color: #ff8c00; /* Orange */
           border-top: 3px solid #ff8c00; /* Orange */
           border-radius: 20px 20px 0 0;
       }
       .footer p {
           margin: 0;
       }
       .container {
           margin-top: 20px;
       }
   </style>
</head>
@csrf
<body>
    <x-toast />
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid m-2">
            <a class="navbar-brand text-light ms-auto" href="#">TodoList</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('site.home') ? 'active' : '' }}" href="{{ route('site.home') }}" role="tab" aria-selected="true">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('list.index') ? 'active' : '' }}" href="{{ route('list.index') }}" role="tab" aria-selected="true">
                            <i class="fas fa-tasks"></i> Atividades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.login') ? 'active' : '' }}" href="{{ route('user.login') }}" role="tab" aria-selected="true">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
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
    <footer class="footer p-2 mt-auto text-center">
        <div class="container">
            <p class="fw-bolder fs-5">&copy; Desenvolvido por Lucas Oliveira</p>
        </div>
    </footer>
</body>
</html>
