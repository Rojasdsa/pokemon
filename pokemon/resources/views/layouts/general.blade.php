@extends('layouts.template')

@section('general')

    {{-- HEADER --}}
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <!-- Navbar Brand -->
            <a class="navbar-brand" href="#">Pokemon</a>

            <!-- Navbar Toggler Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Other Navbar Items -->

                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
    </nav>

    {{-- Vista principal --}}
    @yield('lista')

    {{-- FOOTER --}}
  <footer>
    <div class="text-center py-4 mx-4">
        <p class="pe-1">
            ®2024 Proyecto Pokémon (Recuperación Cliente, Servidor, Diseño)
        </p>
        <p class="ps-1">
            Fernando A. Rojas del Marco, 2º DAW
        </p>
    </div>
  </footer>
    
@endsection
