<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo_Favorito;
use App\Models\Participantes;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EquipoFavAdminC extends Controller
{
    public function index(){
        $equipfav = Equipo_Favorito::all();
        return view('admins.equipofavorito', compact('equipfav'));
    }

    public function create(){
        $participantes = Participantes::orderBy('id', 'asc')->get();
        return view('admins.equipofavoritoEdit', compact('participantes'));
    }

    public function new(Request $request){
        

        if(Auth::check()){
            $equipo = new Equipo_Favorito();

            $equipo->nom_usu1 = $request->nom_user;
            $equipo->nom_equipo1 = $request->nom_equipo;
            $equipo->save();
            $name_user = auth()->user()->nom_user;
            $data = User::where('nom_user', $name_user)->first();
            if($data->rol == 'admin')
            {
                return redirect()->route('equipoFav');
            } else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function edit(Equipo_Favorito $equipo){
        $participantes = Participantes::orderBy('id', 'asc')->get();
        return view('admins.equipofavoritoEdit', compact('equipo', 'participantes'));
    }

    public function update(Request $request, Equipo_Favorito $equipo){
        $equipo->nom_usu1 = $request->nom_user;
        $equipo->nom_equipo1 = $request->nom_equipo;
        $equipo->save();

        return redirect()->route('equipoFav');
    }

    public function destroy(Equipo_Favorito $equipo){
        $equipo->delete();

        return redirect()->route('equipoFav');
    }
}
