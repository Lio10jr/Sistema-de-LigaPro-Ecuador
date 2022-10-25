@extends('layouts.plantilla')

@section('title', 'Login 593')
@section('style')
<link rel="stylesheet" href="{{asset('css/styleLogin.css')}}" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection


@section('content')
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="group">
                        <label for="user" class="label">Email / Username</label>
                        <input id="user" type="text" class="input" name="nom_user" required>
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Contraseña</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password" required>
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check">
                        <label for="check"><span class="icon"></span> Mantener la sesion iniciada</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div> 
                    @error('message')
                        <div class="group">                            
                            <p class="nota"> {{ $message }}</p>
                        </div>
                    @enderror
                    <div class="hr"></div>
                </form>
            </div>


            <div class="sign-up-htm">
                <form action="{{route('sign.up')}}" method="post">
                    @csrf
                    <div class="group">
                        <label for="user" class="label">Nombre de usuario</label>
                        <input id="user" type="text" class="input" name="nom_user">
                    </div>
                    <div class="grid-2">
                        <div class="group">
                            <label for="user" class="label">Nombres</label>
                            <input id="user" type="text" class="input" name="nombre">
                        </div>
                        <div class="group">
                            <label for="user" class="label">Apellidos</label>
                            <input id="user" type="text" class="input" name="apellido">
                        </div>
                    </div>
                    <div class="group">
                            <label for="user" class="label">Fecha de Nacimiento</label>
                            <input id="user" type="date" class="input" name="fecha_nacimiento">
                        </div>                    
                    <div class="group">
                        <label for="pass" class="label">Correo electronico</label>
                        <input id="pass" type="email" class="input" name="email">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Contraseña</label>
                        <input id="pass" type="password" class="input" data-type="password" name="password">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection