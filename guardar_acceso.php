<?php
include_once("conexion.php");

session_start();

$usuario = $_REQUEST['login'];
$_SESSION['usuario']=$usuario;

date_default_timezone_set('America/Mexico_City');
$date = date("Y-m-d");
$hora = date("H:i:s");


$insertar = mysql_query("INSERT INTO ingreso_sistema VALUES ('', '$usuario', '$hora', '$date')");

if($usuario!='mariad' && $usuario!='jorozco' && $usuario!='evillagomez' && $usuario!='farizpe') {
	mail("farizpe@grupocva.com","Alerta","El usuario $usuario acaba de ingresar al sistema","From: farizpe@grupocva.com");
} 

header("Location: ./recomendaciones.php");
?>