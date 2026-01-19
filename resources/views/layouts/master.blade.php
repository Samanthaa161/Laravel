<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Films App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

<header class="bg-dark text-white p-3">
    <div class="container">
        <h1>Films App</h1>
        <nav>
            <a href="/" class="text-white">Welcome</a> |
            <a href="{{ route('films.count') }}" class="text-white">Count</a> |
            <a href="{{ route('films.list') }}" class="text-white">List</a>
        </nav>
    </div>
</header>

<main class="container mt-4">
    @yield('content')
</main>

<footer class="bg-light text-center mt-5 p-3">
    <p>© 2026 Films App</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
