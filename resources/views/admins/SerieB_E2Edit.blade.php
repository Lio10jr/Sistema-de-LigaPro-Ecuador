@extends('layouts.plantilla')

@section('title', 'ADMIN TRISCORES')

@section('style')
<link rel="stylesheet" href="{{ asset('css/styleEditSerie.css') }}?v=<?php echo time(); ?>" media="all">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection

@section('content')
    @isset($equipo)
        <form action="{{route('serieBE2.update', $equipo)}}" method="post">
            @csrf
            @method('put')
            <h2>Serie B E2</h2>
            <div class="grid-2">
                <h4>Temporada</h4>
                <input type="number" name="temporada" placeholder="Temporada" value="{{$equipo->temporada}}" required>
            </div>
            <div class="grid-2">
                <h4>Equipo</h4>
                <input type="text" name="equipo" placeholder="Equipo" value="{{$equipo->equipob2}}" maxlength="80" readonly="True" required>
            </div>
            <div class="grid-2">
                <h4>Partidos Jugados</h4>
                <input type="number" name="pj" placeholder="Partidos Jugados" value="{{$equipo->pj}}" required>
            </div>
            <div class="grid-2">
                <h4>Partidos Ganados</h4>
                <input type="number" name="pg" placeholder="Partidos Ganados" value="{{$equipo->pg}}" required>
            </div>
            <div class="grid-2">
                <h4>Partidos Perdidos</h4>
                <input type="number" name="pp" placeholder="Partidos Perdidos" value="{{$equipo->pp}}" required>
            </div>
            <div class="grid-2">
                <h4>Partidos Empatados</h4>
                <input type="number" name="pe" placeholder="Partidos Empatados" value="{{$equipo->pe}}" required></div>
                <div class="grid-2">
                    <h4>Goles a Favor</h4>
                <input type="number" name="gf" placeholder="Gol a Favor" value="{{$equipo->gf}}" required>
            </div>
            <div class="grid-2">
                <h4>Goles en Contra</h4>
                <input type="number" name="gc" placeholder="Gol en Contra" value="{{$equipo->gc}}" required>
            </div>
            <div class="grid-2">
                <h4>Diferencia de Gol</h4>
                <input type="number" name="dg" placeholder="Diferencia de Gol" value="{{$equipo->dg}}" required>
            </div>
            <div class="grid-2">
                <h4>Puntos</h4>
                <input type="number" name="pts" placeholder="Puntos" value="{{$equipo->pts}}" required>
            </div>
            <input type="submit" value="Crear">
        </form>
    @endisset

    @if(!isset($equipo))
    <form action="{{route('serieBE2.new')}}" method="post">
        @csrf
        <h2>Serie B E2</h2>
        <div class="grid-2">
            <h4>Temporada</h4>
            <input type="number" name="temporada" placeholder="Temporada"  required>
        </div>
        <div class="grid-2">
            <h4>Equipo</h4>
            @isset($participantes)
                <select name="equipo">
                    <option value="value1" selected>--Seleccione Su Equipo Favorito</option>
                    @foreach($participantes as $equipo1)                    
                            <option value="{{$equipo1->equipo}}" >{{$equipo1->equipo}}</option>
                    @endforeach
                </select>
            @endisset
        </div>
        <div class="grid-2">
            <h4>Partidos Jugados</h4>
            <input type="number" name="pj" placeholder="Partidos Jugados" required>
        </div>
        <div class="grid-2">
            <h4>Partidos Ganados</h4>
            <input type="number" name="pg" placeholder="Partidos Ganados" required>
        </div>
        <div class="grid-2">
            <h4>Partidos Perdidos</h4>
            <input type="number" name="pp" placeholder="Partidos Perdidos" required>
        </div>
        <div class="grid-2">
            <h4>Partidos Empatados</h4>
            <input type="number" name="pe" placeholder="Partidos Empatados" required>
        </div>
        <div class="grid-2">
            <h4>Goles a Favor</h4>
            <input type="number" name="gf" placeholder="Gol a Favor" required>
        </div>
        <div class="grid-2">
            <h4>Goles en Contra</h4>
            <input type="number" name="gc" placeholder="Gol en Contra" required>
        </div>
        <div class="grid-2">
            <h4>Diferencia de Gol</h4>
            <input type="number" name="dg" placeholder="Diferencia de Gol" required>
        </div>
        <div class="grid-2">
            <h4>Puntos</h4>
            <input type="number" name="pts" placeholder="Puntos" required></div>
        </div>
        <input type="submit" value="Crear">
    </form>
    @endif
    <a href="{{route('serieBE2')}}"><button class="button-31" role="button">Regresar</button></a>


@endsection

@section('script')

@endsection