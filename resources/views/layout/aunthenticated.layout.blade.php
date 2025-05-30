@extends('app')

@section('layout')

 <!-- Navbar -->
    <nav class="navbar navbar-expand-lg position-sticky top-0 shadow-sm"
        style="background-color: rgba(47, 201, 4, 0.9); backdrop-filter: blur(6px); z-index: 1030;">
        <div class="container">
            <a class="navbar-brand text-light fw-bold fs-4" href="#">NE Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light fw-medium" href="#">@yield('link')</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content with Background -->
    <main class="d-flex justify-content-center align-items-center vh-100 text-light"
        style="
              background-image: linear-gradient(rgba(70, 189, 23, 0), rgba(76, 230, 4, 0.61)), url('{{ asset('images/search.png') }}');
              background-size: cover;
              background-position: center;
              background-repeat: no-repeat;
          ">
        @yield('main-content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-light py-3"
        style="background-color: rgba(47, 201, 4, 0.9); backdrop-filter: blur(5px);">
        <div>
            <small>&copy; <span id="year"></span> NE Exchange Rate. All rights reserved.</small>
        </div>
    </footer>

    <!-- JavaScript to update year -->
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>


@endsection




