
@extends('app')
@section('layout')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg position-sticky top-0 shadow-sm"
        style="background-color: rgb(47, 201, 4, 0.9); backdrop-filter: blur(6px); z-index: 1030;">
        <div class="container">
            <a class="navbar-brand text-white fw-semibold fs-4" href="#">NE Currency Exchange</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white fw-medium px-3" href="#">@yield('link')</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content with Darker Overlay and Text Background -->
    <main class="d-flex justify-content-center align-items-center vh-100 text-white text-center px-3"
        style="
            background: linear-gradient(rgba(70, 189, 23, 0), rgba(76, 230, 4, 0.61)),
                        url('{{ asset('images/search.png') }}') center/cover no-repeat;
        ">
        <div style="
            background-color: rgba(0, 0, 0, 0.6);
            padding: 2rem 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            max-width: 700px;
            width: 100%;">
            @yield('main-content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center text-white py-3"
        style="background-color: rgba(47, 201, 4, 0.9); backdrop-filter: blur(6px);">
        <div>
            <small>&copy; <span id="year"></span> NE Currency Exchange. All rights reserved.</small>
        </div>
    </footer>

    <!-- Auto Year Script -->
    <script>
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
@endsection
