<?php

$captcha;

$captcha=htmlspecialchars($_GET["g-recaptcha-response"]);

if(!$captcha){
 $login = $_REQUEST['fUsuario'];
$pwd = $_REQUEST['fContrasenia'];
    
}
 $secretKey = "6LdWgxIUAAAAACScA3X3295Akbeo1jmXiASpdY00";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        } else {
       echo '<h2>yweah</h2>';
exit();


include("/var/www/thelinks/classes/ConectorOracle.php");



$ConectorOracle= new ConectorOracle("WEB_USER_PUBLICO","W8q5/fBv");
$Conn=$ConectorOracle->Conectar();

	
$SentenciaUsuarios="select usuario
						from
						usuarios_ligas  
						where UPPER(usuario) LIKE UPPER('$login')
						and UPPER(password) LIKE UPPER('$pwd')";
$SentenciaAnalizadaUsuarios=ociparse($Conn,$SentenciaUsuarios);
ociexecute($SentenciaAnalizadaUsuarios);
ocifetch($SentenciaAnalizadaUsuarios);
$CTE_ID=ociresult($SentenciaAnalizadaUsuarios,'USUARIO');

if($CTE_ID!=''){
	header("Location: ./guardar_acceso.php?login=".$login);
} else {
	header("Location: ./iniciar.php?error");
}


?>