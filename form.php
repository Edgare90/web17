<?php
$nombre;
$apellido;
$telefono;
$email;
$compania;
$estado;
$ciudad;
$comment;
$captcha;
       
        $nombre=htmlspecialchars($_GET["nombre"]);
$apellido=htmlspecialchars($_GET["apellido"]);
$telefono=htmlspecialchars($_GET["telefono"]);
          $email=htmlspecialchars($_GET["email"]);
 $compania=htmlspecialchars($_GET["compania"]);
 $estado=htmlspecialchars($_GET["estado"]);
$ciudad=htmlspecialchars($_GET["ciudad"]);
          $comment=htmlspecialchars($_GET["comment"]);
$captcha=htmlspecialchars($_GET["g-recaptcha-response"]);
            
     
        if(!$captcha){
                 echo    $nombre;
echo $apellido;
echo $telefono;
echo $email;
echo $compania;
echo $estado;
echo $ciudad;
echo $comment;
echo $captcha;
            
          exit;
        }
        $secretKey = "6LdWgxIUAAAAACScA3X3295Akbeo1jmXiASpdY00";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        } else {
         header("Location: enviado.php"); /* Redirect browser */
exit();
            
            $to      = 'gpinzon@grupocva.com';
$subject = $nombre;

            
            
            
            $message = '<html><body>';

$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Nombre:</strong> </td><td>" . $nombre .' '. $apellido . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
$message .= "<tr><td><strong>Telefono:</strong> </td><td>" . $telefono . "</td></tr>";     
$message .= "<tr><td><strong>Compañia:</strong> </td><td>" . $compania . "</td></tr>";
$message .= "<tr><td><strong>Lugar:</strong> </td><td>" . $ciudad .' '. $estado . "</td></tr>";        $message .= "<tr><td><strong>Comentarios:</strong> </td><td>" . $comment . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
            
            
            
            
            
            
            
$headers = 'From: gpinzon@grupocva.com' . "\r\n" .
    'Reply-To: gpinzon@grupocva.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers);
            
            
            
        }
?>
