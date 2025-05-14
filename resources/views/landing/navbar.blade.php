
@extends('main')


@section('contents')

    <nav class="navbar navbar- navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
            <div class="container-fluid">
                <a class="navbar-brand text-white fw-bold ms-5 px-3" href="#">Travel Blog</a>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mx-auto d-flex flex-row justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-white" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="vr text-white mx-2" style="height: 40px; width: 2px;">
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-white" href="{{route('categories')}}">Categories</a>
                        </li>
                        <li class="vr text-white mx-2" style="height: 40px; width: 2px;"></li>

                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-white" href="{{route('about')}}">About</a>
                        </li>
                    </ul>
                </div>

                <div class="d-flex ms-auto" style="gap: 10px">
                <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" type="submit">Sign Up</button>
                <button class="btn btn-outline-light rounded-pill px-4 fw-semibold" type="submit">Login</button>
                </div>

            </div>
        </nav>

@endsection
