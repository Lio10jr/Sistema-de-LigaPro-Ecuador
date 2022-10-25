@extends('layouts.plantilla')

@section('title', 'ADMIN TRISCORES')

@section('style')
<link rel="stylesheet" href="{{ asset('css/styleEdit.css') }}?v=<?php echo time(); ?>" media="all">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection

@section('content')

    @isset($equipo)
    <form action="{{route('equipoFav.update', $equipo)}}" method="post">
        @csrf
        @method('put')
        <h2>Equipo Favorito</h2>
        <input type="text" name="nom_user" placeholder="Nombre de Usuario" maxlength="255" value="{{$equipo->nom_usu1}}" required>
        @isset($participantes)
        <select name="nom_equipo">
            <option value="value1" selected>--Seleccione Su Equipo Favorito</option>
            @foreach($participantes as $equipo1)   
                @if ($equipo1->equipo == $equipo->nom_equipo1)
                    <option value="{{$equipo1->equipo}}" selected>{{$equipo1->equipo}}</option>                    
                @else
                    <option value="{{$equipo1->equipo}}" >{{$equipo1->equipo}}</option>
                @endif                 
            @endforeach
        </select>
        @endisset
        <input type="submit" value="Crear">
    </form>
    @endisset

    @if(!isset($equipo))
    <form action="{{route('equipoFav.new')}}" method="post">
        @csrf
        <h2>Equipo Favorito</h2>
        <input type="text" name="nom_user" placeholder="Nombre de Usuario" maxlength="255" required>
        @isset($participantes)
        <select name="nom_equipo">
            <option value="value1" selected>--Seleccione Su Equipo Favorito</option>
            @foreach($participantes as $equipo1)                    
                    <option value="{{$equipo1->equipo}}" >{{$equipo1->equipo}}</option>
            @endforeach
        </select>
        @endisset
        <input type="submit" value="Crear">
    </form>
    @endif
    <a href="{{route('equipoFav')}}"><button class="button-31" role="button">Regresar</button></a>


@endsection

@section('script')

@endsection