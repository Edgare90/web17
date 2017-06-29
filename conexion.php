<?php

$db_host="localhost";
$db_usuario="mkt";
$db_password="mktweb2015";
$db_nombre="mkt";
$conexion = mysql_connect($db_host, $db_usuario, $db_password) or die("No se ha podido conectar al servidor: " .mysql_error()); 
$db = mysql_select_db($db_nombre, $conexion) or die("No se pudo conectar a la base de datos: ".mysql_error()); 

?>