<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participantes;
use App\Models\Ligapro_E1;

class SerieAE1AdminC extends Controller
{
    public function index(){
        $Ligapro_E1 = Ligapro_E1::orderBy('pts', 'desc')->get();
        return view('admins.SerieA_E1', compact('Ligapro_E1'));
    }

    public function create(){
        $participantes = Participantes::where('serie', 'A')->orderBy('id', 'asc')->get();
        return view('admins.SerieA_E1Edit', compact('participantes'));
    }

    public function new(Request $request){
        $encuentros = new Ligapro_E1();

        $encuentros->temporada = $request->temporada;
        $encuentros->equipo = $request->equipo;
        $encuentros->pj = $request->pj;
        $encuentros->pg = $request->pg;
        $encuentros->pp = $request->pp;
        $encuentros->pe = $request->pe;
        $encuentros->gf = $request->gf;
        $encuentros->gc = $request->gc;
        $encuentros->dg = $request->dg;
        $encuentros->pts = $request->pts;
        $encuentros->save();
        return redirect()->route('serieAE1');
    }

    public function edit(Ligapro_E1 $equipo){
        return view('admins.SerieA_E1Edit', compact('equipo'));
    }

    public function update(Request $request, Ligapro_E1 $equipo){
        $equipo->temporada = $request->temporada;
        $equipo->equipo = $request->equipo;
        $equipo->pj = $request->pj;
        $equipo->pg = $request->pg;
        $equipo->pp = $request->pp;
        $equipo->pe = $request->pe;
        $equipo->gf = $request->gf;
        $equipo->gc = $request->gc;
        $equipo->dg = $request->dg;
        $equipo->pts = $request->pts;
        $equipo->save();

        return redirect()->route('serieAE1');
    }

    public function destroy(Ligapro_E1 $equipo){
        $equipo->delete();

        return redirect()->route('serieAE1');
    }
}
