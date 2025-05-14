@extends('main')

@section('contents')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold ms-5 px-3" href="#">Travel Blog</a>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center">
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-white" href="{{ route('home') }}">Home</a>
                </li>
                <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle fw-semibold text-white" href="#" id="categoriesDropdown" role="button">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <li><a class="dropdown-item" href="#">Beaches</a></li>
                        <li><a class="dropdown-item" href="#">Waterfalls</a></li>
                        <li><a class="dropdown-item" href="#">Mountain Climbing</a></li>
                    </ul>
                </li>

                <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold text-white" href="{{ route('about') }}">About</a>
                </li>
            </ul>
        </div>

        <div class="d-flex ms-auto" style="gap: 10px">
            <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" @click="$bvModal.show('signInModal')" type="submit">Sign Up</button>
            <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" @click="$bvModal.show('loginModal')" type="submit">Login</button>
        </div>
    </div>
</nav>

<style>
    .dropdown-menu {
        background-color: #212529; 
        border: none;
        padding: 0;
        min-width: 180px;
    }

    .dropdown-menu .dropdown-item {
        color: #e0e0e0; 
        padding: 12px 16px;
        border-bottom: 4px solid #333; 
    }

    .dropdown-menu .dropdown-item:last-child {
        border-bottom: none; 
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #181818; 
        color: #fff;
    }

    .dropdown-hover:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }
</style>


@endsection
