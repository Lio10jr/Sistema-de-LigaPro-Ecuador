@extends('layouts.plantilla')

@section('title', 'ADMIN TRISCORES')

@section('style')
<link rel="stylesheet" href="{{ asset('css/styleAdmin.css') }}?v=<?php echo time(); ?>" media="all">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection


@section('content')
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <img src="img/logo.png" width="60px" alt="">
        <span class="text">593 TRISCORES</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="{{route('admin')}}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Inicio</span>
            </a>
        </li>
        <li>
            <a href="{{route('participantes')}}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Participantes</span>
            </a>
        </li>
        <li>
            <a href="{{route('equipoFav')}}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Equipo Favorito</span>
            </a>
        </li>
        <li>
            <a href="{{route('encuentros')}}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Encuentros</span>
            </a>
        </li>
        <li>
            <a href="{{route('serieAE1')}}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Serie A Etapa 1</span>
            </a>
        </li>
        <li>
            <a href="{{route('serieAE2')}}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Serie A Etapa 2</span>
            </a>
        </li>
        <li>
            <a href="{{route('serieBE1')}}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Serie B Etapa 1</span>
            </a>
        </li>
        <li>
            <a href="{{route('serieBE2')}}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Serie B Etapa 2</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="{{route('logout')}}" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Cerrar Sesión</span>
            </a>
        </li>
    </ul>
</section>



<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>
        <form action="#">
            <div></div>
        </form>
        <h4 class="h4-nav">Asignar Rol</h4>
        <form class="form-user" action="{{route('sign.update')}}" method="POST">
            @csrf
            @method('put')
            <h4>Usuario</h4>
            @isset($user)
                <select name="username">
                    <option value="value1" selected>--Seleccione un usuario</option>
                    @foreach($user as $user1)                    
                            <option value="{{$user1->nom_user}}" >{{$user1->nom_user}}</option>
                    @endforeach
                </select>
            @endisset
            <input type="submit" value="Asignar">
        </form>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="profile">
            <img src="img/auron.jpg">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <img src="img/fondo_inicio.jpg" width="1000px" alt="">
    </main>
    <!-- MAIN -->
</section>
@endsection

@section('script')
<script src="{{asset('js/script.js')}}"></script>
@endsection