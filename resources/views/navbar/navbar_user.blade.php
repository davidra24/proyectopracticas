@extends('layouts.base')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin">
            <img src="/img/logo.png" width="100"  alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(Request::is('user')) active @endif">
                    <a class="nav-link" href="/user">Inicio 
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item @if(Request::is('user/reportes')) active @endif">
                    <a class="nav-link" href="/user/reportes">Reportes</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container text-center">
        @yield('nav')
    </div>
@endsection