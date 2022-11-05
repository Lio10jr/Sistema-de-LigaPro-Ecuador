<?php
    namespace App\Http\Controllers;

    use App\Http\PHPMailer\PHPMailer;
    use App\Models\Equipo_Favorito;
    use App\Models\Encuentros;
    use App\Models\User;
    use Carbon\Carbon;

    class MailSendC extends Controller{

        public function alerta(){    
            $equipFav = Equipo_Favorito::all();

            foreach($equipFav as $user)
            {
                $this->buscarEquipo($user);        
            }
        }

        public function buscarEquipo(Equipo_Favorito $user ){
            $carbon = new Carbon();
            $date = $carbon->now();
            $date = $date->format('Y-m-d');
            $encuentros = Encuentros::where('date_compromiso', $date)->get();
            
            foreach($encuentros as $equip)
            {
                if($user->nom_equipo1 == $equip->equip_local or $user->nom_equipo1 == $equip->equip_visit)
                {
                    $userObj = User::where('nom_user', $user->nom_usu1)->get();
                    if(!is_null($userObj)){
                        $userUpdateDate = $user->fecha_notificacion;

                        if($userUpdateDate != $date){
                            $this->alertEmail($userObj[0]->email);
                            $this->UpdateNotification($user);
                        }
                        
                    }                    
                }
            }
        }

        public function alertEmail($email)
        {
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://utmachala1.ipzmarketing.com/api/v1/send_emails",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"email_registrado\",\"name\":\"593 TRISCORES\"},\"to\":[{\"email\":\"$email\",\"name\":\"593 TRISCORES\"}],\"subject\":\"Alerta de Juego\",\"html_part\":\"<html>\\n<head></head>\\n<body><p>Hoy es el dia!! Ponte pilas que hoy juega tu equipo favorito!!.</p></body>\\n</html>\\n\",\"text_part\":\"\",\"text_part_auto\":true,\"headers\":{\"X-CustomHeader\":\"Header value\"},\"smtp_tags\":[\"593\"],\"attachments\":[{\"content\":\"593 TRISCORES\",\"file_name\":\"TRI.jpg\",\"content_type\":\"image/jpg\",\"content_id\":\"\"}]}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "x-auth-token: waQNhPx7h9AENvehyFSz37mQTzT6zimVyhtA4yCx"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
        }
        
        public function UpdateNotification(Equipo_Favorito $user)
        {
            $carbon = new Carbon();
            $date = $carbon->now();
            $date = $date->format('Y-m-d');
            $user->fecha_notificacion = $date;

            $user->save();
        }
    }
