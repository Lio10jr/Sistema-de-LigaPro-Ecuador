<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participantes;


class CopaEcuadorC extends Controller
{
    public function index(){
        $Equipos = Participantes::all();
        return view('copaEcuador', compact('Equipos'));
    }
    
    public function create(){}

    public function show($equipo){
        //return view('participantes.show', ['participantes' => $equipo]);
    }

    public function update(){}

    public function delete(){}
}
