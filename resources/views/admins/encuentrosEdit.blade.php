@extends('layouts.plantilla')

@section('title', 'ADMIN TRISCORES')

@section('style')
<link rel="stylesheet" href="{{ asset('css/styleEdit.css') }}?v=<?php echo time(); ?>" media="all">
@endsection

@section('content')
    @isset($equipo)
    <form action="{{route('encuentros.update', $equipo)}}" method="post">
        @csrf
        @method('put')
        <h2>Encuentro</h2>
        <input type="text" name="local" placeholder="Equipo Local" maxlength="80" value="{{$equipo->equip_local}}" required>
        <input type="number" name="gol_local" placeholder="Gol Local"  value="{{$equipo->gol_local}}">
        <input type="text" name="visita" placeholder="Equipo Visita"  value="{{$equipo->equip_visit}}"  maxlength="80" required>
        <input type="number" name="gol_visita" placeholder="Gol Visita"  value="{{$equipo->gol_visit}}">
        <input type="date" name="fecha_compromiso" placeholder="Fecha Compromiso"   value="{{$equipo->date_compromiso}}" required>
        <h4 class="title">Estado</h4>
        <div class="conteiner grid-5">
            @if ($equipo->estado == 'En Directo')
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio1" value="En Directo" checked required>
                    <label for="radio1" class="label">En Directo</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio2" value="Terminado" required>
                    <label for="radio2" class="label">Terminado</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio3" value="Proximo" required>
                    <label for="radio3" class="label">Próximo</label>
                </div>
            @endif
            @if ($equipo->estado == 'Terminado')                
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio1" value="En Directo" required>
                    <label for="radio1" class="label">En Directo</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio2" value="Terminado"  checked required>
                    <label for="radio2" class="label">Terminado</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio3" value="Proximo" required>
                    <label for="radio3" class="label">Próximo</label>
                </div>
            @endif
            @if ($equipo->estado == 'Proximo')
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio1" value="En Directo" required>
                    <label for="radio1" class="label">En Directo</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio2" value="Terminado" required>
                    <label for="radio2" class="label">Terminado</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio1" id="radio3" value="Proximo" checked required>
                    <label for="radio3" class="label">Próximo</label>
                </div>
            @endif
        </div>
        <h4 class="title">Serie O Competencia</h4>
        <div class="conteiner grid-5">
            @if ($equipo->serie == 'A')
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio4" value="A" checked required>
                    <label for="radio4" class="label">A</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio5" value="B" required>
                    <label for="radio5" class="label">B</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio6" value="C" required>
                    <label for="radio6" class="label">Copa Ec</label>
                </div>
            @endif
            @if ($equipo->serie == 'B')                
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio4" value="A" required>
                    <label for="radio4" class="label">A</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio5" value="B"  checked required>
                    <label for="radio5" class="label">B</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio6" value="C" required>
                    <label for="radio6" class="label">Copa Ec</label>
                </div>
            @endif
            @if ($equipo->serie == 'C')
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio4" value="A" required>
                    <label for="radio4" class="label">A</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio5" value="B" required>
                    <label for="radio5" class="label">B</label>
                </div>
                <div class="checkbox-container">
                    <input type="radio" name="radio2" id="radio6" value="C" checked required>
                    <label for="radio6" class="label">Copa Ec</label>
                </div>
            @endif
        </div>
        <input type="submit" value="Crear">
    </form>
    @endisset

    @if(!isset($equipo))
    <form action="{{route('encuentros.new')}}" method="post">
        @csrf
        <h2>Encuentro</h2>
        @isset($participantes)
        <select name="local">
            <option value="value1" selected>--Seleccione Equipo Local</option>
            @foreach($participantes as $equipo1)                    
                    <option value="{{$equipo1->equipo}}" >{{$equipo1->equipo}}</option>
            @endforeach
        </select>
        @endisset
        
        <input type="number" name="gol_local" placeholder="Gol Local">
        @isset($participantes)
        <select name="visita">
            <option value="value1" selected>--Seleccione Equipo Visita</option>
            @foreach($participantes as $equipo1)                    
                    <option value="{{$equipo1->equipo}}" >{{$equipo1->equipo}}</option>
            @endforeach
        </select>
        @endisset
        <input type="number" name="gol_visita" placeholder="Gol Visita">
        <input type="date" name="fecha_compromiso" placeholder="Fecha Compromiso" required>
        <h4 class="title">Estado</h4>
        <div class="conteiner grid-5">
            <div class="checkbox-container">
                <input type="radio" name="radio1" id="radio1" value="En_Directo" required>
                <label for="radio1" class="label">En Directo</label>
            </div>
            <div class="checkbox-container">
                <input type="radio" name="radio1" id="radio2" value="Terminado" required>
                <label for="radio2" class="label">Terminado</label>
            </div>
            <div class="checkbox-container">
                <input type="radio" name="radio1" id="radio3" value="Proximo" required>
                <label for="radio3" class="label">Próximo</label>
            </div>
        </div>

        <h4 class="title">Serie O Competencia</h4>
        <div class="conteiner grid-5">
            <div class="checkbox-container">
                <input type="radio" name="radio2" id="radio4" value="A" required>
                <label for="radio4" class="label">A</label>
            </div>
            <div class="checkbox-container">
                <input type="radio" name="radio2" id="radio5" value="B" required>
                <label for="radio5" class="label">B</label>
            </div>
            <div class="checkbox-container">
                <input type="radio" name="radio2" id="radio6" value="C" required>
                <label for="radio6" class="label">Copa Ec</label>
            </div>
        </div>
        <input type="submit" value="Crear">
    </form>
    @endif
    <a href="{{route('encuentros')}}"><button class="button-31" role="button">Regresar</button></a>

@endsection

@section('script')

@endsection