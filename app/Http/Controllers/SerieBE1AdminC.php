<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participantes;
use App\Models\SerieB_E1;

class SerieBE1AdminC extends Controller
{
    public function index(){
        $SerieB_E1 = SerieB_E1::orderBy('pts', 'desc')->get();
        return view('admins.SerieB_E1', compact('SerieB_E1'));
    }

    public function create(){
        $participantes = Participantes::where('serie', 'B')->orderBy('id', 'asc')->get();
        return view('admins.SerieB_E1Edit', compact('participantes'));
    }
    public function new(Request $request){
        $encuentros = new SerieB_E1();

        $encuentros->temporada = $request->temporada;
        $encuentros->equipob = $request->equipo;
        $encuentros->pj = $request->pj;
        $encuentros->pg = $request->pg;
        $encuentros->pp = $request->pp;
        $encuentros->pe = $request->pe;
        $encuentros->gf = $request->gf;
        $encuentros->gc = $request->gc;
        $encuentros->dg = $request->dg;
        $encuentros->pts = $request->pts;
        $encuentros->save();
        return redirect()->route('serieBE1');
    }

    public function edit(SerieB_E1 $equipo){
        return view('admins.SerieB_E1Edit', compact('equipo'));
    }

    public function update(Request $request, SerieB_E1 $equipo){
        $equipo->temporada = $request->temporada;
        $equipo->equipob = $request->equipo;
        $equipo->pj = $request->pj;
        $equipo->pg = $request->pg;
        $equipo->pp = $request->pp;
        $equipo->pe = $request->pe;
        $equipo->gf = $request->gf;
        $equipo->gc = $request->gc;
        $equipo->dg = $request->dg;
        $equipo->pts = $request->pts;
        $equipo->save();

        return redirect()->route('serieBE1');
    }

    public function destroy(SerieB_E1 $equipo){
        $equipo->delete();

        return redirect()->route('serieBE1');
    }
}
