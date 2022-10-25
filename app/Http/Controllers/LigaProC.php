<?php

namespace App\Http\Controllers;

use App\Models\Ligapro_E1;
use Illuminate\Http\Request;

class LigaProC extends Controller
{
    public function index(){
        return view('ligaPro');
    }
    
    public function create(){}

    public function createLigaPro(){
        $e1 = new Ligapro_E1;
        $e1->temporada = 2022;
        $e1->equipo = "Barcelona SC";
        $e1->pj = 0;
        $e1->pg = 0;
        $e1->pp = 0;
        $e1->pe = 0;
        $e1->gf = 0;
        $e1->gc = 0;
        $e1->dg = 0;
        $e1->pts = 0;
        $e1->save();

        $e2 = new Ligapro_E1;
        $e2->temporada = 2022;
        $e2->equipo = "CS Emelec";
        $e2->pj = 0;
        $e2->pg = 0;
        $e2->pp = 0;
        $e2->pe = 0;
        $e2->gf = 0;
        $e2->gc = 0;
        $e2->dg = 0;
        $e2->pts = 0;
        $e2->save();

        $e3 = new Ligapro_E1;
        $e3->temporada = 2022;
        $e3->equipo = "LDU Quito";
        $e3->pj = 0;
        $e3->pg = 0;
        $e3->pp = 0;
        $e3->pe = 0;
        $e3->gf = 0;
        $e3->gc = 0;
        $e3->dg = 0;
        $e3->pts = 0;
        $e3->save();

        $e4 = new Ligapro_E1;
        $e4->temporada = 2022;
        $e4->equipo = "CSD Independiente Del Valle";
        $e4->pj = 0;
        $e4->pg = 0;
        $e4->pp = 0;
        $e4->pe = 0;
        $e4->gf = 0;
        $e4->gc = 0;
        $e4->dg = 0;
        $e4->pts = 0;
        $e4->save();

        $e5 = new Ligapro_E1;
        $e5->temporada = 2022;
        $e5->equipo = "SD Aucas";
        $e5->pj = 0;
        $e5->pg = 0;
        $e5->pp = 0;
        $e5->pe = 0;
        $e5->gf = 0;
        $e5->gc = 0;
        $e5->dg = 0;
        $e5->pts = 0;
        $e5->save();

        $e6 = new Ligapro_E1;
        $e6->temporada = 2022;
        $e6->equipo = "9 de Octubre FC";
        $e6->pj = 0;
        $e6->pg = 0;
        $e6->pp = 0;
        $e6->pe = 0;
        $e6->gf = 0;
        $e6->gc = 0;
        $e6->dg = 0;
        $e6->pts = 0;
        $e6->save();

        $e7 = new Ligapro_E1;
        $e7->temporada = 2022;
        $e7->equipo = "Cumbaya FC";
        $e7->pj = 0;
        $e7->pg = 0;
        $e7->pp = 0;
        $e7->pe = 0;
        $e7->gf = 0;
        $e7->gc = 0;
        $e7->dg = 0;
        $e7->pts = 0;
        $e7->save();

        $e8 = new Ligapro_E1;
        $e8->temporada = 2022;
        $e8->equipo = "Delfin SC";
        $e8->pj = 0;
        $e8->pg = 0;
        $e8->pp = 0;
        $e8->pe = 0;
        $e8->gf = 0;
        $e8->gc = 0;
        $e8->dg = 0;
        $e8->pts = 0;
        $e8->save();

        $e9 = new Ligapro_E1;
        $e9->temporada = 2022;
        $e9->equipo = "CD Cuenca";
        $e9->pj = 0;
        $e9->pg = 0;
        $e9->pp = 0;
        $e9->pe = 0;
        $e9->gf = 0;
        $e9->gc = 0;
        $e9->dg = 0;
        $e9->pts = 0;
        $e9->save();

        $e10 = new Ligapro_E1;
        $e10->temporada = 2022;
        $e10->equipo = "Gualaceo SC";
        $e10->pj = 0;
        $e10->pg = 0;
        $e10->pp = 0;
        $e10->pe = 0;
        $e10->gf = 0;
        $e10->gc = 0;
        $e10->dg = 0;
        $e10->pts = 0;
        $e10->save();

        $e11 = new Ligapro_E1;
        $e11->temporada = 2022;
        $e11->equipo = "Guayaquil City FC";
        $e11->pj = 0;
        $e11->pg = 0;
        $e11->pp = 0;
        $e11->pe = 0;
        $e11->gf = 0;
        $e11->gc = 0;
        $e11->dg = 0;
        $e11->pts = 0;
        $e11->save();

        $e12 = new Ligapro_E1;
        $e12->temporada = 2022;
        $e12->equipo = "CSD Macara";
        $e12->pj = 0;
        $e12->pg = 0;
        $e12->pp = 0;
        $e12->pe = 0;
        $e12->gf = 0;
        $e12->gc = 0;
        $e12->dg = 0;
        $e12->pts = 0;
        $e12->save();

        $e13 = new Ligapro_E1;
        $e13->temporada = 2022;
        $e13->equipo = "Orense SC";
        $e13->pj = 0;
        $e13->pg = 0;
        $e13->pp = 0;
        $e13->pe = 0;
        $e13->gf = 0;
        $e13->gc = 0;
        $e13->dg = 0;
        $e13->pts = 0;
        $e13->save();

        $e14 = new Ligapro_E1;
        $e14->temporada = 2022;
        $e14->equipo = "Mushuc Runa SC";
        $e14->pj = 0;
        $e14->pg = 0;
        $e14->pp = 0;
        $e14->pe = 0;
        $e14->gf = 0;
        $e14->gc = 0;
        $e14->dg = 0;
        $e14->pts = 0;
        $e14->save();

        $e15 = new Ligapro_E1;
        $e15->temporada = 2022;
        $e15->equipo = "CD Tecnico Universitario";
        $e15->pj = 0;
        $e15->pg = 0;
        $e15->pp = 0;
        $e15->pe = 0;
        $e15->gf = 0;
        $e15->gc = 0;
        $e15->dg = 0;
        $e15->pts = 0;
        $e15->save();

        $e16 = new Ligapro_E1;
        $e16->temporada = 2022;
        $e16->equipo = "CD Universidad Catolica Del Ecuador";
        $e16->pj = 0;
        $e16->pg = 0;
        $e16->pp = 0;
        $e16->pe = 0;
        $e16->gf = 0;
        $e16->gc = 0;
        $e16->dg = 0;
        $e16->pts = 0;
        $e16->save();
    }


    public function show($equipo){
        //return view('participantes.show', ['participantes' => $equipo]);
    }

    public function update(){}

    public function delete(){}
}
