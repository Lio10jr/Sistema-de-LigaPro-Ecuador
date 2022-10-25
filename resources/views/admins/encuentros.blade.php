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
        <li>
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
        <li >
            <a href="{{route('equipoFav')}}">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Equipo Favorito</span>
            </a>
        </li>
        <li class="active">
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
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="profile">
            <img src="img/auron.jpg">
        </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>ENCUENTROS</h1>
            </div>
        </div>

        <div class="btn-crear">
            <a href="{{route('encuentros.create')}}"><button type="button" class="button4 button3">+</button></a>
        </div>

        <div class="table-data">
            <div class="order">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>EQUIPO LOCAL</th>
                            <th>GOL LOCAL</th>
                            <th>EQUIPO VISITANTE</th>
                            <th>GOL VISITANTE</th>
                            <th>FECHA COMPROMISO</th>
                            <th>ESTADO</th>
                            <th>ACTUALIZAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($encuentros)
                            @foreach($encuentros as $equipo)
                                <tr>
                                    <td>{{$equipo->id}}</td>
                                    <td>{{$equipo->equip_local}}</td>
                                    <td>{{$equipo->gol_local}}</td>
                                    <td>{{$equipo->equip_visit}}</td>
                                    <td>{{$equipo->gol_visit}}</td>
                                    <td>{{$equipo->date_compromiso}}</td>
                                    <td>{{$equipo->estado}}</td>
                                    <td><a href="{{route('encuentros.edit', $equipo)}}"><button type="button" class="button button1">Actualizar</button></a></td>
                                    <td>
                                        <form action="{{route('encuentros.destroy', $equipo)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="button button2">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                        
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->
@endsection

@section('script')
<script src="{{asset('js/script.js')}}"></script>
@endsection