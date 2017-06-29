<?php
// Variable de Conexion a Siil

function ConectaSiil($User,$Contra)
{
$DataBase =
"(DESCRIPTION=
    (ADDRESS_LIST=
      (ADDRESS=
        (PROTOCOL=TCP)
        (HOST=n5vip)
        (PORT=1521)
      )
      (ADDRESS=
        (PROTOCOL=TCP)
        (HOST=n6vip)
        (PORT=1521)
      )
	(ADDRESS=
      	(PROTOCOL=TCP)
        (HOST=n7vip)
        (PORT=1521)
      )
    )
    (CONNECT_DATA=
      (FAILOVER_MODE=
        (METHOD=basic)
      )
      (SERVER=default)
      (SERVICE_NAME=ORCLCVA)
    )
  )";

	if ($Conn=oci_pconnect($User,$Contra, $DataBase,"WE8ISO8859P1"))
	//echo "Conexion Realizada exitosamente <br> ";
	//else 
	//echo "No se pudo realizar la conexion a oracle";
	return $Conn;
}
?>