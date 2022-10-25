<?php
    namespace App\Http\Controllers;

    use App\Http\PHPMailer\PHPMailer;
    use App\Models\Equipo_Favorito;
    use App\Models\Encuentros;
    use App\Models\User;
    use Carbon\Carbon;

    class MailSendC extends Controller{

        public function sendmail(){
            $name = "+593TRI SCORESS";  // Name of your website or yours
            $to = "kevinzambrano593@gmail.com";  // mail of reciever
            $subject = "Alerta de Equipo Favorito";
            $body = "PONTE PILAS ";
            $from = "kzambrano8@utmachala.edu.ec";  // you mail
            // $from = "kzambrano8@utmachala.edu.ec";  // you mail
            $password = "!ZMKev10$";  // your mail password
    
            // Ignore from here
    
            require_once "../App/Http/PHPMailer/SMTP.php";
            require_once "../App/Http/PHPMailer/Exception.php";
            $mail = new PHPMailer();
    
            // To Here
    
            //SMTP Settings
            $mail->isSMTP();
            // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
            $mail->Host = "smtp.gmail.com"; // smtp address of your email
            $mail->SMTPAuth = true;
            $mail->Username = $from;
            $mail->Password = $password;
            $mail->Port = 587;  // port
            $mail->SMTPSecure = "tls";  // tls or ssl
            $mail->smtpConnect([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                ]
            ]);
    
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($from, $name);
            $mail->addAddress($to); // enter email address whom you want to send
            $mail->Subject = ("$subject");
            $mail->Body = $body;
        }

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
            CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"kzambrano8@utmachala.edu.ec\",\"name\":\"593 TRISCORES\"},\"to\":[{\"email\":\"$email\",\"name\":\"593 TRISCORES\"}],\"subject\":\"Alerta de Juego\",\"html_part\":\"<html>\\n<head></head>\\n<body><p>Hoy es el dia!! Ponte pilas que hoy juega tu equipo favorito!!.</p></body>\\n</html>\\n\",\"text_part\":\"\",\"text_part_auto\":true,\"headers\":{\"X-CustomHeader\":\"Header value\"},\"smtp_tags\":[\"593\"],\"attachments\":[{\"content\":\"593 TRISCORES\",\"file_name\":\"TRI.jpg\",\"content_type\":\"image/jpg\",\"content_id\":\"\"}]}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "x-auth-token: waQNhPx7h9AENvehyFSz37mQTzT6zimVyhtA4yCx"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            // if ($err) {
            // echo "cURL Error #:" . $err;
            // } else {
            // echo $response;
            // }
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
