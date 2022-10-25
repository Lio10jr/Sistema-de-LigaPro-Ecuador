<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuentros;
use App\Models\Participantes;
use App\Models\Ligapro_E2;
use App\Models\SerieB_E2;

class EncuentrosAdminC extends Controller
{
    public function index(){
        $encuentros = Encuentros::orderBy('id', 'asc')->get();
        return view('admins.encuentros', compact('encuentros'));
    }

    public function create(){
        $participantes = Participantes::orderBy('id', 'asc')->get();
        return view('admins.encuentrosEdit', compact('participantes'));
    }

    public function new(Request $request){
        $encuentros = new Encuentros();

        $encuentros->equip_local = $request->local;
        $encuentros->gol_local = $request->gol_local;
        $encuentros->equip_visit = $request->visita;
        $encuentros->gol_visit = $request->gol_visita;
        $encuentros->date_compromiso = $request->fecha_compromiso;
        $encuentros->estado = $request->radio1;
        $encuentros->serie = $request->radio2;
        $encuentros->save();
        $this->actualizarTabla($encuentros);
        return redirect()->route('encuentros');
    }

    public function edit(Encuentros $equipo){
        return view('admins.encuentrosEdit', compact('equipo'));
    }

    public function update(Request $request, Encuentros $equipo){
        $equipo->equip_local = $request->local;
        $equipo->gol_local = $request->gol_local;
        $equipo->equip_visit = $request->visita;
        $equipo->gol_visit = $request->gol_visita;
        $equipo->date_compromiso = $request->fecha_compromiso;
        $equipo->estado = $request->radio1;
        $equipo->serie = $request->radio2;
        $equipo->save();
        $this->actualizarTabla($equipo);
        return redirect()->route('encuentros');
    }

    public function destroy(Encuentros $equipo){
        $equipo->delete();

        return redirect()->route('encuentros');
    }

    public function actualizarTabla(Encuentros $encuentros){
        if($encuentros->estado == 'Terminado')
        {
            if($encuentros->serie == 'A')
            {
                $equipoL = Ligapro_E2::where('equipo2', $encuentros->equip_local)->get();
                $equipoV = Ligapro_E2::where('equipo2', $encuentros->equip_visit)->get();
                if($encuentros->gol_local > $encuentros->gol_visit)
                {
                    //EQUIPO GANADOR
                    $equipoL[0]->pj = $equipoL[0]->pj + 1;
                    $equipoL[0]->pg = $equipoL[0]->pg + 1;
                    $equipoL[0]->pp = $equipoL[0]->pp;
                    $equipoL[0]->pe = $equipoL[0]->pe;
                    $equipoL[0]->gf = $equipoL[0]->gf + $encuentros->gol_local;
                    $equipoL[0]->gc = $equipoL[0]->gc;
                    $equipoL[0]->dg = $equipoL[0]->gf - $equipoL[0]->gc;
                    $equipoL[0]->pts = $equipoL[0]->pts + 3;
                    $equipoL[0]->save();

                    //EQUIPO PERDEDOR
                    $equipoV[0]->pj = $equipoV[0]->pj + 1;
                    $equipoV[0]->pg = $equipoV[0]->pg;
                    $equipoV[0]->pp = $equipoV[0]->pp + 1;
                    $equipoV[0]->pe = $equipoV[0]->pe;
                    $equipoV[0]->gf = $equipoV[0]->gf;
                    $equipoV[0]->gc = $equipoV[0]->gc + $encuentros->gol_local;
                    $equipoV[0]->dg = $equipoV[0]->gf - $equipoV[0]->gc;
                    $equipoV[0]->pts = $equipoV[0]->pts;
                    $equipoV[0]->save();

                }
                if($encuentros->gol_local == $encuentros->gol_visit)
                {
                    //EQUIPO Local
                    $equipoL[0]->pj = $equipoL[0]->pj + 1;
                    $equipoL[0]->pg = $equipoL[0]->pg;
                    $equipoL[0]->pp = $equipoL[0]->pp;
                    $equipoL[0]->pe = $equipoL[0]->pe + 1;
                    $equipoL[0]->gf = $equipoL[0]->gf;
                    $equipoL[0]->gc = $equipoL[0]->gc;
                    $equipoL[0]->dg = $equipoL[0]->gf - $equipoL[0]->gc;
                    $equipoL[0]->pts = $equipoL[0]->pts + 1;
                    $equipoL[0]->save();

                    //EQUIPO Visita
                    $equipoV[0]->pj = $equipoV[0]->pj + 1;
                    $equipoV[0]->pg = $equipoV[0]->pg;
                    $equipoV[0]->pp = $equipoV[0]->pp;
                    $equipoV[0]->pe = $equipoV[0]->pe + 1;
                    $equipoV[0]->gf = $equipoV[0]->gf;
                    $equipoV[0]->gc = $equipoV[0]->gc;
                    $equipoV[0]->dg = $equipoV[0]->gf - $equipoV[0]->gc;
                    $equipoV[0]->pts = $equipoV[0]->pts + 1;
                    $equipoV[0]->save();
                }
                if($encuentros->gol_local < $encuentros->gol_visit)
                {
                    //EQUIPO GANADOR
                    $equipoV[0]->pj = $equipoV[0]->pj + 1;
                    $equipoV[0]->pg = $equipoV[0]->pg + 1;
                    $equipoV[0]->pp = $equipoV[0]->pp;
                    $equipoV[0]->pe = $equipoV[0]->pe;
                    $equipoV[0]->gf = $equipoV[0]->gf + $encuentros->gol_visit;
                    $equipoV[0]->gc = $equipoV[0]->gc;
                    $equipoV[0]->dg = $equipoV[0]->gf - $equipoV[0]->gc;
                    $equipoV[0]->pts = $equipoV[0]->pts + 3;
                    $equipoV[0]->save();

                    //EQUIPO PERDEDOR
                    $equipoL[0]->pj = $equipoL[0]->pj + 1;
                    $equipoL[0]->pg = $equipoL[0]->pg;
                    $equipoL[0]->pp = $equipoL[0]->pp + 1;
                    $equipoL[0]->pe = $equipoL[0]->pe;
                    $equipoL[0]->gf = $equipoL[0]->gf;
                    $equipoL[0]->gc = $equipoL[0]->gc + $encuentros->gol_visit;
                    $equipoL[0]->dg = $equipoL[0]->gf - $equipoL[0]->gc;
                    $equipoL[0]->pts = $equipoL[0]->pts;
                    $equipoV[0]->save();
                }
                
            }

            if($encuentros->serie == 'B')
            {
                $equipoL = SerieB_E2::where('equipob2', $encuentros->equip_local)->get();
                $equipoV = SerieB_E2::where('equipob2', $encuentros->equip_visit)->get();
                if($encuentros->gol_local > $encuentros->gol_visit)
                {
                    //EQUIPO GANADOR
                    $equipoL[0]->pj = $equipoL[0]->pj + 1;
                    $equipoL[0]->pg = $equipoL[0]->pg + 1;
                    $equipoL[0]->pp = $equipoL[0]->pp;
                    $equipoL[0]->pe = $equipoL[0]->pe;
                    $equipoL[0]->gf = $equipoL[0]->gf + $encuentros->gol_local;
                    $equipoL[0]->gc = $equipoL[0]->gc;
                    $equipoL[0]->dg = $equipoL[0]->gf - $equipoL[0]->gc;
                    $equipoL[0]->pts = $equipoL[0]->pts + 3;
                    $equipoL[0]->save();

                    //EQUIPO PERDEDOR
                    $equipoV[0]->pj = $equipoV[0]->pj + 1;
                    $equipoV[0]->pg = $equipoV[0]->pg;
                    $equipoV[0]->pp = $equipoV[0]->pp + 1;
                    $equipoV[0]->pe = $equipoV[0]->pe;
                    $equipoV[0]->gf = $equipoV[0]->gf;
                    $equipoV[0]->gc = $equipoV[0]->gc + $encuentros->gol_local;
                    $equipoV[0]->dg = $equipoV[0]->gf - $equipoV[0]->gc;
                    $equipoV[0]->pts = $equipoV[0]->pts;
                    $equipoV[0]->save();

                }
                if($encuentros->gol_local == $encuentros->gol_visit)
                {
                    //EQUIPO Local
                    $equipoL[0]->pj = $equipoL[0]->pj + 1;
                    $equipoL[0]->pg = $equipoL[0]->pg;
                    $equipoL[0]->pp = $equipoL[0]->pp;
                    $equipoL[0]->pe = $equipoL[0]->pe + 1;
                    $equipoL[0]->gf = $equipoL[0]->gf;
                    $equipoL[0]->gc = $equipoL[0]->gc;
                    $equipoL[0]->dg = $equipoL[0]->gf - $equipoL[0]->gc;
                    $equipoL[0]->pts = $equipoL[0]->pts + 1;
                    $equipoL[0]->save();

                    //EQUIPO Visita
                    $equipoV[0]->pj = $equipoV[0]->pj + 1;
                    $equipoV[0]->pg = $equipoV[0]->pg;
                    $equipoV[0]->pp = $equipoV[0]->pp;
                    $equipoV[0]->pe = $equipoV[0]->pe + 1;
                    $equipoV[0]->gf = $equipoV[0]->gf;
                    $equipoV[0]->gc = $equipoV[0]->gc;
                    $equipoV[0]->dg = $equipoV[0]->gf - $equipoV[0]->gc;
                    $equipoV[0]->pts = $equipoV[0]->pts + 1;
                    $equipoV[0]->save();
                }
                if($encuentros->gol_local < $encuentros->gol_visit)
                {
                    //EQUIPO GANADOR
                    $equipoV[0]->pj = $equipoV[0]->pj + 1;
                    $equipoV[0]->pg = $equipoV[0]->pg + 1;
                    $equipoV[0]->pp = $equipoV[0]->pp;
                    $equipoV[0]->pe = $equipoV[0]->pe;
                    $equipoV[0]->gf = $equipoV[0]->gf + $encuentros->gol_visit;
                    $equipoV[0]->gc = $equipoV[0]->gc;
                    $equipoV[0]->dg = $equipoV[0]->gf - $equipoV[0]->gc;
                    $equipoV[0]->pts = $equipoV[0]->pts + 3;
                    $equipoV[0]->save();

                    //EQUIPO PERDEDOR
                    $equipoL[0]->pj = $equipoL[0]->pj + 1;
                    $equipoL[0]->pg = $equipoL[0]->pg;
                    $equipoL[0]->pp = $equipoL[0]->pp + 1;
                    $equipoL[0]->pe = $equipoL[0]->pe;
                    $equipoL[0]->gf = $equipoL[0]->gf;
                    $equipoL[0]->gc = $equipoL[0]->gc + $encuentros->gol_visit;
                    $equipoL[0]->dg = $equipoL[0]->gf - $equipoL[0]->gc;
                    $equipoL[0]->pts = $equipoL[0]->pts;
                    $equipoV[0]->save();
                }
                
            }
        }
    }
}
