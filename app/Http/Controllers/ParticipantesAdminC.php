<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participantes;
use Illuminate\Support\Str;

class ParticipantesAdminC extends Controller
{
    public function index(){
        $Participantes = Participantes::all();
        return view('admins.participantes', compact('Participantes'));
    }

    public function create(){
        return view('admins.participantesEdit');
    }

    public function new(Request $request){
        $participantes = new Participantes();

        if($request->hasFile("image")){
            $image = $request->file("image");
            $destinationPath = public_path("img/");
            if($request->radio1 == "A"){
                $ruta = "img/SerieA/";
                $destinationPath = public_path("img/SerieA/");
                $imageName = $request->equipo .'.'.$image->guessExtension();  
            }
            if($request->radio1 == "B"){
                $ruta = "img/SerieB/";
                $destinationPath = public_path("img/SerieB/");
                $imageName = $request->equipo.'.'.$image->guessExtension(); 
            }
            if($request->radio1 == "Otra"){
                $ruta = "img/CopaEcuador/";
                $destinationPath = public_path("img/CopaEcuador/");
                $imageName = $request->equipo.'.'.$image->guessExtension();;  
            }
            $image->move($destinationPath,$imageName);
            $participantes->log_equi = $ruta . $imageName;

        }
        $participantes->equipo = $request->equipo;
        $participantes->serie = $request->radio1;
        $participantes->presidente = $request->presidente;
        $participantes->ciudad = $request->ciudad;
        $participantes->estadio = $request->estadio;
        $participantes->fecha_fundacion = $request->fecha_fundacion;
        $participantes->save();
        return redirect()->route('participantes');
    }

    public function edit(Participantes $equipo){
        return view('admins.participantesEdit', compact('equipo'));
    }

    public function update(Request $request, Participantes $equipo){

        if($request->image != null){
            if($request->hasFile("image")){
                $image = $request->file("image");
                $destinationPath = public_path("img/");
                if($request->radio1 == "A"){
                    $ruta = "img/SerieA/";
                    $destinationPath = public_path("img/SerieA/");
                    $imageName = $request->equipo .'.'.$image->guessExtension();  
                }
                if($request->radio1 == "B"){
                    $ruta = "img/SerieB/";
                    $destinationPath = public_path("img/SerieB/");
                    $imageName = $request->equipo.'.'.$image->guessExtension(); 
                }
                if($request->radio1 == "Otra"){
                    $ruta = "img/CopaEcuador/";
                    $destinationPath = public_path("img/CopaEcuador/");
                    $imageName = $request->equipo.'.'.$image->guessExtension();;  
                }
                $image->move($destinationPath,$imageName);
                $equipo->log_equi = $ruta . $imageName;
            }
        }
        
        $equipo->equipo = $request->equipo;
        $equipo->serie = $request->radio1;
        $equipo->presidente = $request->presidente;
        $equipo->ciudad = $request->ciudad;
        $equipo->estadio = $request->estadio;
        $equipo->fecha_fundacion = $request->fecha_fundacion;
        $equipo->save();

        return redirect()->route('participantes');
    }

    public function destroy(Participantes $equipo){
        $equipo->delete();

        return redirect()->route('participantes');
    }
}
