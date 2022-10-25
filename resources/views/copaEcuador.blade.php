@extends('layouts.plantilla')

@section('title', 'Copa Ecuador')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}" media="all">
@endsection

@section('nav')
<!----hero Section start---->
<div class="hero3">
    <nav>
        <h2 class="logo">FEF -<span> LIGAPRO</span></h2>
        <ul>
            <li><a href="Home">Inicio</a></li>
            <li><a href="SerieA">Serie A</a></li>
            <li><a href="SerieB">Serie B</a></li>
            <li><a href="CopaEcuador">Copa Ecuador</a></li>
        </ul>
        @auth
            <li class="nav-item dropdown d-flex align-items-center justify-content-center">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img" src="img/user.png" alt="User">
                </a>
                <ul class="dropdown-menu d-relative">
                    <li>{{auth()->user()->nom_user}}</li>
                    <li><hr class="dropdown-divider"></li>
                    <li class=".bg-peligro"><a class="dropdown-item" href="{{route('logout')}}">Cerrar Sesión</a></li>
                </ul>
            </li>
        @endauth
            
        @guest
            <a href="{{route('sign')}}" class="btn bg-danger bg-gradien">Iniciar Sesión</a>     
        @endguest
    </nav>    
    <div class="content">
        <h4>BIENVENIDOS A</h4>
        <h1>593TRI <span>SCORES</span></h1>
        <h3>Página #1 del Ecuador</h3> 
    </div>
</div>

@endsection

@section('content')
<!----About section start---->
<section class="about">
    <div class="main">
        <img src="{{asset('img/CopaEcuador.png')}}">
        <div class="about-text">
            <h2>Copa <span>Ecuador</span></h2>
            <p>Copa Ecuador Ecuabet 2022 es la 2.ª edición de esta competición de la Copa Ecuador. Inició el 6 de mayo y finalizará el 5 de octubre. El torneo es organizado por la Federación Ecuatoriana de Fútbol y participarán clubes de Serie A, Serie
                B, Segunda Categoría y Fútbol Amateur. El equipo campeón clasificará como Ecuador 4 a la Copa Libertadores 2023 y disputará la Supercopa de Ecuador 2023.</p>
            <button type="button">Mayor Información</button>
        </div>
    </div>
</section>

<!-----service section start----------->
<div class="service">
    <div class="title">
        <h2>Equipos Participantes</h2>
    </div>

    <div class="box">
        @isset($Equipos)
            @foreach($Equipos as $equipo)
                <div class="card d-flex flex-column justify-content-center align-items-center bg-dark">
                    <img src="{{$equipo->log_equi}}">
                    <h5>{{$equipo->equipo}}</h5>
                    <div class="pra">
                        <p>Ciudad: {{$equipo->ciudad}}</p>
                        <p>Estadio: {{$equipo->estadio}}</p>

                        <p style="text-align: center;">
                        </p>
                    </div>
                </div>
            @endforeach
        @endisset 
    </div>
</div>
<!------Contact Me------>
<div class="contact-me">
    <p>Auspiciante Oficial</p>
    <img src="{{asset('img/ecuabet.png')}}">
    <a class="button-two" href="https://ecuabet.com">Mayor Información</a>
</div>
@endsection

@section('footer')
<footer>
    <p>PÁGINAS OFICIALES DE LIGAPRO</p>
    <p>Facebook - Instagram - Twitter</p>
    <div class="social">
        <a href="https://www.facebook.com/LigaProEC"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/ligaproec/"><i class="fab fa-instagram"></i></a>
        <a href="https://twitter.com/LigaProEC"><i class="fab fa-twitter"></i></a>
    </div>
    <p class="end">© Copyright By Masters UTMACH</p>
</footer>
@endsection

@section('script')

@endsection