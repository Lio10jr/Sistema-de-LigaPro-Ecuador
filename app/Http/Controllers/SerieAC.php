<?php

namespace App\Http\Controllers;

use App\Models\Encuentros;
use App\Models\Participantes;
use App\Models\Ligapro_E1;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\ParticipantesC;


use function PHPUnit\Framework\isNull;

class SerieAC extends Controller
{
    public function index(){
        // $this->datosApi();
        
        // $creoA = new ParticipantesC;
        // $creoA->createA();

        // $creoT = new LigaProC;
        // $creoT->createLigaPro();
        $Equipos = Participantes::where('serie', 'A')->get();
        $table = Ligapro_E1::where('temporada', 2022)->orderBy('pts', 'desc')->get();
        $encuentros = Encuentros::where('serie', 'A')->get();
        return view('serieA', compact('Equipos', 'table', 'encuentros'));
        
    }

    public function create(Object $clave){
        $encuentro =  new Encuentros;
        try{
            $date = Carbon::parse($clave->match_start);
            if(!$this->buscar($clave->home_team->name, $date)){
                $encuentro->equip_local = $clave->home_team->name;
                $encuentro->gol_local = $clave->stats->home_score;
                $encuentro->equip_visit = $clave->away_team->name;
                $encuentro->gol_visit = $clave->stats->away_score;
                $encuentro->date_compromiso = $clave->match_start;
                $encuentro->estado = "Activo";

                $encuentro->save();
            }
            

        }catch(Exception $e){
            echo "Error al guardar datos " .$e;
        } 
    }

    public function buscar(String $equipo, Carbon $date){
        $E1 = Encuentros::where('equip_local', $equipo)->first(); 
        if(isset($E1)){
            $fecha = Encuentros::where('date_compromiso', $date)->first(); 
            if(isset($fecha)){
                return True;
            }
        }
        return False;
    }

    public function datosApi(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $data = [
            "season_id" => "2963",
            "date_from" => "2022-07-00",
        ];

        curl_setopt($ch, CURLOPT_URL, "https://app.sportdataapi.com/api/v1/soccer/matches?" . http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "apikey: c95ec5a0-1b54-11ed-9c9e-558a71fe1a8a",  
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response);

        // var_dump($json);
        // echo "<script>console.log('Console: " . $response . "' );</>";
        $cont = 0;
        foreach ($json as $jsons) {
            // echo '<pre>';
            // print_r($jsons);
            $result = gettype($jsons);
            if ($result == 'array'){
                foreach ($jsons as $clave) {
                    $this->create($clave);
                    // print_r(gettype($clave));
                    // print_r($clave->match_id);
                    // print_r($clave->home_team->name); echo ' VS ';
                    // print_r($clave->away_team->name); echo '<br>';
                    // print_r($clave);
                    // $local = $clave->home_team->name;
                    // $golesL = $clave->stats->home_score;
                    // $visita = $clave->away_team->name;
                    // $golesV = $clave->stats->away_score;
                    // $fecha_inicio = $clave->match_start;
                }
            }
        }
    }
}
