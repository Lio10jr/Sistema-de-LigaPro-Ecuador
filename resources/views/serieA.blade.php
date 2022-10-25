@extends('layouts.plantilla')
@section('title', '593TRI Serie A')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}?v=<?php echo time(); ?>" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
        <img src="{{asset('img/LigaProBetcris.png')}}">
        <div class="about-text">
            <h2>Serie <span>A</span></h2>
            <p>El Campeonato Ecuatoriano de Fútbol 2022, llamado oficialmente «LigaPro Betcris 2022», es la sexagésima cuarta (64.ª) edición de la Serie A del fútbol profesional ecuatoriano y la cuarta (4.ª) bajo la denominación de LigaPro. El torneo
                es organizado por la Liga Profesional de Fútbol del Ecuador y consiste en un sistema de 3 etapas. La primera y segunda etapa se desarrollan con un sistema de todos contra todos, mientras que la tercera etapa consistirá en una final
                ida y vuelta con los ganadores de cada etapa. Se otorgarán tres cupos para la Copa Libertadores 2023: campeón, subcampeón y primer mejor puntaje de la tabla general; y cuatro para la Copa Sudamericana 2023 que serán del segundo al
                quinto mejor puntaje de la tabla general.</p>
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
                        <p>{{$equipo->fecha_fundacion}}</p>
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


            
<!----Tabla de posiciones---->
<section class="about2">
    <div class="main">
        <img src="img/LigaProBetcris.png">
        <div class="about-text">
            <h3>Tabla de Posiciones</h3>
            <table>
                <tr>
                    <th>POS</th>
                    <th>Equipos</th>
                    <th>PJ</th>
                    <th>PG</th>
                    <th>PE</th>
                    <th>PP</th>
                    <th>DG</th>
                    <th>PTS</th>
                </tr>
                @isset($table)
                    <?php $cont = 0; ?>
                    @foreach($table as $equipo)
                        <?php $cont++; ?>
                        <tr>
                            <td><?php echo $cont; ?>.</td>
                            <td>{{$equipo->equipo}}</td>
                            <td>{{$equipo->pj}}</td>
                            <td>{{$equipo->pg}}</td>
                            <td>{{$equipo->pe}}</td>
                            <td>{{$equipo->pp}}</td>
                            <td>{{$equipo->dg}}</td>
                            <td>{{$equipo->pts}}</td>
                        </tr>
                    @endforeach
                @endisset
                
                
            </table>
        </div>
    </div>
</section>


<!-----Encuentros----------->
<div class="service">
    <div class="title">
        <h4>Calendario</h4>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            @isset($encuentros)
                    <?php $cont = 0; ?>
                    @foreach($encuentros as $partidos)
                        @if($cont == 0)
                            <div class="encuentros carousel-item active">
                                <table>
                                    <tr>
                                        <td>{{$partidos->equip_local}}</td>
                                        <td>{{$partidos->gol_local}}</</td>
                                    </tr>
                                    <tr>
                                        <td>{{$partidos->equip_visit}}</td>
                                        <td>{{$partidos->gol_visit}}</td>
                                    </tr>
                                </table>
                                <h4>{{$partidos->date_compromiso}}</h4>
                            </div>
                            <?php $cont++; ?>
                        @else
                            <div class="encuentros carousel-item">
                                <table>
                                    <tr>
                                        <td>{{$partidos->equip_local}}</td>
                                        <td>{{$partidos->gol_local}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{$partidos->equip_visit}}</td>
                                        <td>{{$partidos->gol_visit}}</td>
                                    </tr>
                                </table>
                                <h4>{{$partidos->date_compromiso}}</h4>
                            </div>
                        @endif
                    @endforeach
                @endisset            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
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
    <p class="end">© Copyright By Masters UTMACH</p>
</footer>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@endsection
