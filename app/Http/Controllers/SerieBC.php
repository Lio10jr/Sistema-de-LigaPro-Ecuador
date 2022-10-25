<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participantes;
use App\Models\SerieB_E2;
use App\Models\Encuentros;
use Exception;

class SerieBC extends Controller
{    
    public function index(){
        $Equipos = Participantes::where('serie', 'B')->get();
        $table = SerieB_E2::where('temporada', 2022)->orderBy('pts', 'desc')->get();
        $encuentros = Encuentros::where('serie', 'B')->get();
        return view('serieB', compact('Equipos', 'table', 'encuentros'));
    }
}
