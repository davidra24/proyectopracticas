@extends('layouts.base')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin">
            <img src="img/logo.png" width="100"  alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin">Inicio 
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/practicas">Practicas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/estudiantes">Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/docentes">Docentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/buses">Buses</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('nav')
@endsection