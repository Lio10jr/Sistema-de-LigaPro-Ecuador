<?php

namespace App\Http\Controllers;

use App\Models\Participantes;
use Illuminate\Http\Request;
use Exception;


class ParticipantesC extends Controller
{
    public function index(){

    }

    public function create(){}

    public function createA(){
        // league_id":750
        try{
            $p1 = new Participantes();
            $p1->equipo = "Barcelona SC";
            $p1->log_equi = "img/SerieA/BarcelonaSc.png";
            $p1->serie = "A";
            $p1->presidente = "Nose";
            $p1->ciudad = "Guayaquil";
            $p1->estadio = "Monumental Banco de Pichincha";
            $p1->fecha_fundacion = "1-05-1925";
            $p1->save();

            $p2 = new Participantes();
            $p2->equipo = "CS Emelec";
            $p2->log_equi = "img/SerieA/CSEmelec.png";
            $p2->serie = "A";
            $p2->presidente = "Nose";
            $p2->ciudad = "Guayaquil";
            $p2->estadio = "George Capwell";
            $p2->fecha_fundacion = "28-04-1929";
            $p2->save();

            $p3 = new Participantes();
            $p3->equipo = "LDU Quito";
            $p3->log_equi = "img/SerieA/LigaDeQuito.png";
            $p3->serie = "A";
            $p3->presidente = "Nose";
            $p3->ciudad = "Quito";
            $p3->estadio = "Rodrigo Paz Delgado";
            $p3->fecha_fundacion = "11-01-1930";
            $p3->save();

            $p4 = new Participantes();
            $p4->equipo = "CSD Independiente Del Valle";
            $p4->log_equi = "img/SerieA/IndependienteDelValle.png";
            $p4->serie = "A";
            $p4->presidente = "Nose";
            $p4->ciudad = "Sangolquí";
            $p4->estadio = "Banco Guayaquil";
            $p4->fecha_fundacion = "1-03-1958";
            $p4->save();

            $p5 = new Participantes();
            $p5->equipo = "SD Aucas";
            $p5->log_equi = "img/SerieA/Aucas.png";
            $p5->serie = "A";
            $p5->presidente = "Nose";
            $p5->ciudad = "Quito";
            $p5->estadio = "Gonzalo Pozo Ripalda";
            $p5->fecha_fundacion = "6-02-1945";
            $p5->save();

            $p6 = new Participantes();
            $p6->equipo = "9 de Octubre FC";
            $p6->log_equi = "img/SerieA/9DeOctubre.png";
            $p6->serie = "A";
            $p6->presidente = "Nose";
            $p6->ciudad = "Guayaquil";
            $p6->estadio = "Modelo Alberto Spencer";
            $p6->fecha_fundacion = "18-04-1926";
            $p6->save();

            $p7 = new Participantes();
            $p7->equipo = "Cumbaya FC";
            $p7->log_equi = "img/SerieA/CumbayaFC.png";
            $p7->serie = "A";
            $p7->presidente = "Nose";
            $p7->ciudad = "Quito";
            $p7->estadio = "Olímpico Atahualpa";
            $p7->fecha_fundacion = "31-05-1970";
            $p7->save();

            $p8 = new Participantes();
            $p8->equipo = "Delfin SC";
            $p8->log_equi = "img/SerieA/DelfinSC.png";
            $p8->serie = "A";
            $p8->presidente = "Nose";
            $p8->ciudad = "Manta";
            $p8->estadio = "Jocay";
            $p8->fecha_fundacion = "1-03-1989";
            $p8->save();

            $p9 = new Participantes();
            $p9->equipo = "CD Cuenca";
            $p9->log_equi = "img/SerieA/DeportivoCuenca.png";
            $p9->serie = "A";
            $p9->presidente = "Nose";
            $p9->ciudad = "Cuenca";
            $p9->estadio = "Alejandro Serrano Aguilar";
            $p9->fecha_fundacion = "4-03-1971";
            $p9->save();
            
            $p10 = new Participantes();
            $p10->equipo = "Gualaceo SC";
            $p10->log_equi = "img/SerieA/GualaceoSC.png";
            $p10->serie = "A";
            $p10->presidente = "Nose";
            $p10->ciudad = "Azogues";
            $p10->estadio = "Jorge Andrade Cantos";
            $p10->fecha_fundacion = "2-04-2000";
            $p10->save();
            
            $p11 = new Participantes();
            $p11->equipo = "Guayaquil City FC";
            $p11->log_equi = "img/SerieA/GuayaquilCity.png";
            $p11->serie = "A";
            $p11->presidente = "Nose";
            $p1->ciudad = "Guayaquil";
            $p1->estadio = "Christian Benítez Betancourt";
            $p11->fecha_fundacion = "4-03-1971";
            $p11->save();
            
            $p12 = new Participantes();
            $p12->equipo = "CSD Macara";
            $p12->log_equi = "img/SerieA/Macara.png";
            $p12->serie = "A";
            $p12->presidente = "Nose";
            $p12->ciudad = "Ambato";
            $p12->estadio = "Bellavista";
            $p12->fecha_fundacion = "25-08-1939";
            $p12->save();
            
            $p13 = new Participantes();
            $p13->equipo = "Orense SC";
            $p13->log_equi = "img/SerieA/OrenseSC.png";
            $p13->serie = "A";
            $p13->presidente = "Nose";
            $p13->ciudad = "Machala";
            $p13->estadio = "9 de Mayo";
            $p13->fecha_fundacion = "15-12-2009";
            $p13->save();
            
            $p14 = new Participantes();
            $p14->equipo = "Mushuc Runa SC";
            $p14->log_equi = "img/SerieA/MushucRuna.png";
            $p14->serie = "A";
            $p14->presidente = "Nose";
            $p14->ciudad = "Ambato";
            $p14->estadio = "Mushuc Runa COAC";
            $p14->fecha_fundacion = "2-01-2003";
            $p14->save();
            
            $p15 = new Participantes();
            $p15->equipo = "CD Tecnico Universitario";
            $p15->log_equi = "img/SerieA/TecnicoUniversitario.png";
            $p15->serie = "A";
            $p15->presidente = "Nose";
            $p15->ciudad = "Ambato";
            $p15->estadio = "Bellavista";
            $p15->fecha_fundacion = "26-03-1971";
            $p15->save();
            
            $p16 = new Participantes();
            $p16->equipo = "CD Universidad Catolica Del Ecuador";
            $p16->log_equi = "img/SerieA/UniversidadCatolica.png";
            $p16->serie = "A";
            $p16->presidente = "Nose";
            $p16->ciudad = "Quito";
            $p16->estadio = "Olímpico Atahualpa";
            $p16->fecha_fundacion = "15-05-1963";
            $p16->save();

        }catch(Exception $e){
            echo "Error al guardar datos " .$e;
        } 
    }

    public function createB(){
        // league_id":752
        // season_id":3052
        // start_date":"2022-03-15
        try{
            $p1 = new Participantes();
            $p1->equipo = "Club Atlético Santo Domingo";
            $p1->log_equi = "img/SerieB/AtleticoSantoDomingo.png";
            $p1->serie = "B";
            $p1->presidente = "Nose";
            $p1->ciudad = "Santo Domingo";
            $p1->estadio = "Etho Vega";
            $p1->fecha_fundacion = "12-04-1998";
            $p1->save();

            $p2 = new Participantes();
            $p2->equipo = "Búhos ULVR Fútbol Club";
            $p2->log_equi = "img/SerieB/BuhosFC.png";
            $p2->serie = "B";
            $p2->presidente = "Nose";
            $p2->ciudad = "Guayaquil";
            $p2->estadio = "Modelo Alberto Spencer";
            $p2->fecha_fundacion = "05-02-2014";
            $p2->save();

            $p3 = new Participantes();
            $p3->equipo = "Chacaritas Fútbol Club";
            $p3->log_equi = "img/SerieB/Chacarita.png";
            $p3->serie = "B";
            $p3->presidente = "Nose";
            $p3->ciudad = "Pelileo";
            $p3->estadio = "Ciudad de Pelileo";
            $p3->fecha_fundacion = "22-07-1960";
            $p3->save();

            $p4 = new Participantes();
            $p4->equipo = "Club Deportivo América";
            $p4->log_equi = "img/SerieB/DeportivoAmerica.png";
            $p4->serie = "B";
            $p4->presidente = "Nose";
            $p4->ciudad = "Quito";
            $p4->estadio = "Olímpico Atahualpa";
            $p4->fecha_fundacion = "25-11-1939";
            $p4->save();

            $p5 = new Participantes();
            $p5->equipo = "Centro Deportivo Olmedo";
            $p5->log_equi = "img/SerieB/DeportivoOlmedo.png";
            $p5->serie = "B";
            $p5->presidente = "Nose";
            $p5->ciudad = "Riobamba";
            $p5->estadio = "Olímpico de Riobamba";
            $p5->fecha_fundacion = "11-11-1919";
            $p5->save();

            $p6 = new Participantes();
            $p6->equipo = "Club Deportivo El Nacional";
            $p6->log_equi = "img/SerieB/ElNacional.png";
            $p6->serie = "B";
            $p6->presidente = "Nose";
            $p6->ciudad = "Quito";
            $p6->estadio = "Olímpico Atahualpa";
            $p6->fecha_fundacion = "01-06-1964";
            $p6->save();

            $p7 = new Participantes();
            $p7->equipo = "Imbabura Sporting Club";
            $p7->log_equi = "img/SerieB/ImbaburaSC.png";
            $p7->serie = "B";
            $p7->presidente = "Nose";
            $p7->ciudad = "Ibarra";
            $p7->estadio = "Olímpico";
            $p7->fecha_fundacion = "03-01-1993";
            $p7->save();

            $p8 = new Participantes();
            $p8->equipo = "Club Deportivo Independiente Juniors";
            $p8->log_equi = "img/SerieB/IndependienteJuniors.png";
            $p8->serie = "B";
            $p8->presidente = "Nose";
            $p8->ciudad = "Sangolquí";
            $p8->estadio = "Banco Guayaquil";
            $p8->fecha_fundacion = "13-07-2017";
            $p8->save();

            $p9 = new Participantes();
            $p9->equipo = "Libertad Fútbol Club";
            $p9->log_equi = "img/SerieB/LibertadFC.png";
            $p9->serie = "B";
            $p9->presidente = "Nose";
            $p9->ciudad = "Loja";
            $p9->estadio = "Reina del Cisne";
            $p9->fecha_fundacion = "17-05-2017";
            $p9->save();
            
            $p10 = new Participantes();
            $p10->equipo = "Manta Fútbol Club";
            $p10->log_equi = "img/SerieB/MantaFC.png";
            $p10->serie = "B";
            $p10->presidente = "Nose";
            $p10->ciudad = "Manta";
            $p10->estadio = "Jocay";
            $p10->fecha_fundacion = "27-07-1998";
            $p10->save();            

        }catch(Exception $e){
            echo "Error al guardar datos " .$e;
        } 
    }

    public function show($equipo){
        //return view('participantes.show', ['participantes' => $equipo]);
    }

    public function update(){}

    public function delete(){}
}
