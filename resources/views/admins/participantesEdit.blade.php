@extends('layouts.plantilla')

@section('title', 'ADMIN TRISCORES')

@section('style')
<link rel="stylesheet" href="{{ asset('css/styleEdit.css') }}?v=<?php echo time(); ?>" media="all">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
@endsection

@section('content')
    @isset($equipo)
        <form action="{{route('participantes.update', $equipo)}}" method="post" enctype=multipart/form-data>
            @csrf
            @method('put')
            <h2>Participantes</h2>
            <input type="text" name="equipo" placeholder="Equipo"  value="{{$equipo->equipo}}"  maxlength="80" required>
            <input  type="file" id="archivo" name="image" accept="image/jpeg, image/png" value="{{$equipo->imagen}}">
            <h4 class="title">Serie</h4>
            <div class="conteiner grid-5">
            @if ($equipo->serie == 'A')
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio1" value="A" checked required>
                    <label for="radio1" class="label">A</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio2" value="B" required>
                    <label for="radio2" class="label">B</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio3" value="C" required>
                    <label for="radio3" class="label">Copa Ec</label>
                </div>
            @endif
            @if ($equipo->serie == 'B')                
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio1" value="A" required>
                    <label for="radio1" class="label">A</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio2" value="B" checked required>
                    <label for="radio2" class="label">B</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio3" value="C" required>
                    <label for="radio3" class="label">Copa Ec</label>
                </div>
            @endif
            @if ($equipo->serie == 'Otra')
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio1" value="A" required>
                    <label for="radio1" class="label">A</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio2" value="B" required>
                    <label for="radio2" class="label">B</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio3" value="C" checked required>
                    <label for="radio3" class="label">Copa Ec</label>
                </div>
            @endif
                
            </div>
            <input type="text" name="presidente" placeholder="Presidente" value="{{$equipo->presidente}}" maxlength="50" required>
            <input type="text" name="ciudad" placeholder="Ciudad" value="{{$equipo->ciudad}}"  maxlength="80" required>
            <input type="text" name="estadio" placeholder="Estadio" value="{{$equipo->estadio}}"  maxlength="80" required>
            <input type="date" name="fecha_fundacion" placeholder="Fecha Fundacion" value="{{$equipo->fecha_fundacion}}" required>
            
            <input type="submit" value="Crear">
        </form>
    @endisset
    @if(!isset($equipo))
    <form action="{{route('participantes.new')}}" method="post">
        @csrf
        <h2>Participantes</h2>
            <input type="text" name="equipo" placeholder="Equipo"  maxlength="80" required>
            <input  type="file" id="archivo" accept="image/jpeg, image/png" name="image" required>
            <h4 class="title">Serie</h4>
            <div class="conteiner grid-5">
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio1" value="A" required>
                    <label for="radio1" class="label">A</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio2" value="B" required>
                    <label for="radio2" class="label">B</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio3" value="C" required>
                    <label for="radio3" class="label">Copa Ec</label>
                </div>
            </div>
            <input type="text" name="presidente" placeholder="Presidente" maxlength="50" required>
            <input type="text" name="ciudad" placeholder="Ciudad"  maxlength="80" required>
            <input type="text" name="estadio" placeholder="Estadio"  maxlength="80" required>
            <input type="date" name="fecha_fundacion" placeholder="Fecha Fundacion" required>
            
        <input type="submit" value="Crear">
    </form>
    @endif
    <a href="{{route('participantes')}}"><button class="button-31" role="button">Regresar</button></a>

@endsection

@section('script')

@endsection