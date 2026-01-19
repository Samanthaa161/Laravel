<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Films App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<!-- HEADER -->
<header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Films App</h1>

        <nav>
            <a href="/" class="text-white mr-3">Welcome</a>
            <a href="{{ route('films.count') }}" class="text-white mr-3">Count</a>
            <a href="{{ route('films.list') }}" class="text-white">List</a>
        </nav>
    </div>
</header>

<!-- HERO IMAGE -->
<div class="hero">
    <img src="{{ asset('img/PORTADA.jpeg') }}" alt="Films banner">
</div>

<!-- MAIN CONTENT -->
<main class="container mt-4">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-light text-center mt-5 p-3">
    <p class="mb-0">© 2026 Films App</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
