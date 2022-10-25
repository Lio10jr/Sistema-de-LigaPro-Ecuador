@extends('layouts.plantilla')
@section('title', '593TRI SCORES')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}" media="all">
@endsection

@section('nav')
<!----hero Section start---->
<div class="hero">
    <nav>
        <h2 class="logo">FEF -<span> LIGAPRO</span></h2>
        <ul>
            <li><a href="Home">Inicio</a></li>
            <li><a href="SerieA">Serie A</a></li>
            <li><a href="SerieB">Serie B</a></li>
            <li><a href="CopaEcuador">Copa Ecuador</a></li>
            <li><a href="{{route('equipoFav.create')}}">Equipo Favorito</a></li>
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
        <img src="{{asset('img/LigaPro.png')}}">
        <div class="about-text">
            <h2>Liga<span>Pro</span></h2>
            <p>La Liga Profesional de Fútbol conocida comercialmente como LigaPro, o por sus siglas LPFE, y legalmente denominada como Liga Profesional de Fútbol del Ecuador es una asociación deportiva integrada por los clubes profesionales que participan
                en la primera categoría del Campeonato Ecuatoriano de Fútbol. Fue creada en 2018 y forma parte de la Federación Ecuatoriana de Fútbol (FEF) aunque tiene personalidad jurídica propia y goza de autonomía para su funcionamiento. Su principal
                función, además de defender los intereses de sus asociados, es la organización de la primera categoría del Campeonato Ecuatoriano de Fútbol (la Serie A y la Serie B) bajo supervisión de la FEF.</p>
            <button type="button">Mayor Información</button>
        </div>
    </div>
</section>

<!-----service section start----------->
<div class="service">
    <div class="title">
        <h2>Organiza</h2>
    </div>
    <div class="box" id="card">
        <div class="card bg-dark d-flex flex-column justify-content-center align-items-center">
            <img src="{{asset('img/LigaProBetcris.png')}}">
            <h5>Serie A</h5>
            <div class="pra">
                <p>LigaPro Betcris Serie A 2022 es la sexagésima cuarta (64.ª) edición del fútbol profesional ecuatoriano y la cuarta (4.ª) bajo la denominación de LigaPro.</p>

                <p style="text-align: center;">
                    <a class="button" href="SerieA">Mayor Información</a>
                </p>
            </div>
        </div>

        <div class="card bg-dark d-flex flex-column justify-content-center align-items-center">
            <img src="{{asset('img/LigaProBetcris.png')}}">
            <h5>Serie B</h5>
            <div class="pra">
                <p>LigaPro Betcris Serie B 2022 es la cuadragésima quinta (45.ª) edición de la Serie B del fútbol profesional ecuatoriano y la cuarta (4.ª) bajo la denominación de LigaPro.</p>

                <p style="text-align: center;">
                    <a class="button" href="SerieB">Mayor Información</a>
                </p>
            </div>
        </div>

        <div class="card bg-dark d-flex flex-column justify-content-center align-items-center">
            <img src="{{asset('img/CopaEcuador.png')}}">
            <h5>Copa Ecuador</h5>
            <div class="pra">
                <p>Copa Ecuador Ecuabet 2022 es la 2.ª edición de esta competición de la Copa Ecuador. Participarán clubes de Serie A, Serie B, Segunda Categoría y Fútbol Amateur.</p>

                <p style="text-align: center;">
                    <a class="button" href="CopaEcuador">Mayor Información</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!------Contact Me------>
<div class="contact-me">
    <p>Auspiciante Oficial</p>
    <img src="{{asset('img/Betcris.png')}}">
    <a class="button-two" href="https://www.betcris.com">Mayor Información</a>
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
    <p class="end">© Copyright By Master UTMACH</p>
</footer>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

@endsection
