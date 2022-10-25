<?php

namespace App\Http\Controllers;

use App\Models\SerieB_E2;
use App\Models\Participantes;
use Illuminate\Http\Request;

class SerieBE2AdminC extends Controller
{
    public function index(){
        $SerieB_E2 = SerieB_E2::orderBy('pts', 'desc')->get();
        return view('admins.SerieB_E2', compact('SerieB_E2'));
    }

    public function create(){
        $participantes = Participantes::where('serie', 'B')->orderBy('id', 'asc')->get();
        return view('admins.SerieB_E2Edit', compact('participantes'));
    }

    public function new(Request $request){
        $encuentros = new SerieB_E2();

        $encuentros->temporada = $request->temporada;
        $encuentros->equipob2 = $request->equipo;
        $encuentros->pj = $request->pj;
        $encuentros->pg = $request->pg;
        $encuentros->pp = $request->pp;
        $encuentros->pe = $request->pe;
        $encuentros->gf = $request->gf;
        $encuentros->gc = $request->gc;
        $encuentros->dg = $request->dg;
        $encuentros->pts = $request->pts;
        $encuentros->save();
        return redirect()->route('serieBE2');
    }

    public function edit(SerieB_E2 $equipo){
        return view('admins.SerieB_E2Edit', compact('equipo'));
    }

    public function update(Request $request, SerieB_E2 $equipo){
        $equipo->temporada = $request->temporada;
        $equipo->equipob2 = $request->equipo;
        $equipo->pj = $request->pj;
        $equipo->pg = $request->pg;
        $equipo->pp = $request->pp;
        $equipo->pe = $request->pe;
        $equipo->gf = $request->gf;
        $equipo->gc = $request->gc;
        $equipo->dg = $request->dg;
        $equipo->pts = $request->pts;
        $equipo->save();

        return redirect()->route('serieBE2');
    }

    public function destroy(SerieB_E2 $equipo){
        $equipo->delete();

        return redirect()->route('serieBE2');
    }
}
