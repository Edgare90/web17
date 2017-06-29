<?php
$sol=$_GET["sol"];
   function ConectaSiil($UserName,$Passwd) {
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
                      
                        if ($Conn=oci_pconnect($UserName, $Passwd, $DataBase))
                            //echo "Conexion Realizada exitosamente <br> ";
                            //else 
                            //echo "No se pudo realizar la conexion a oracle";
                            return $Conn;
                        } 
                        // Variable de Conexion a Siil
                        $Conn=ConectaSiil("WEB_USER_PUBLICO","W8q5/fBv");
		
if($sol=='%')
{
	$Sentencia="select vcl_clave, vcl_id, vcl_desc marca
                                from
                                bpm_demo.cat_producto cp,
                                (select prod_id
                                from bpm_demo.cat_prod_almacen 
                                where alm_id=261
                                and vcl_id in (821,822,823,1261,1262,1263)) depart,
                                (select entidad_id prod_id, vcl_clave, cvc.vcl_id, vcl_desc
                                from 
                                bpm_demo.CAT_ENTIDAD_VALORCLASIFICACION cevc,
                                bpm_demo.CAT_VALOR_CLASIFICACION cvc
                                where cevc.evc_tipo_entidad='PR'
                                and cevc.vcl_id=cvc.vcl_id
                                and cla_id=81) marca
                                where cp.prod_id=depart.prod_id
                                and cp.prod_id=marca.prod_id
								and cp.prod_id=sol.prod_id
                                and prod_estado='AC'
                                group by vcl_clave, vcl_id, vcl_desc
                                order by vcl_Desc";
		
}else
{
$Sentencia="select vcl_clave, vcl_id, vcl_desc marca
                                from
                                bpm_demo.cat_producto cp,
                                (select prod_id
                                from bpm_demo.cat_prod_almacen 
                                where alm_id=261
                                and vcl_id in (821,822,823,1261,1262,1263)) depart,
                                (select entidad_id prod_id, vcl_clave, cvc.vcl_id, vcl_desc
                                from 
                                bpm_demo.CAT_ENTIDAD_VALORCLASIFICACION cevc,
                                bpm_demo.CAT_VALOR_CLASIFICACION cvc
                                where cevc.evc_tipo_entidad='PR'
                                and cevc.vcl_id=cvc.vcl_id
                                and cla_id=81) marca,
									(select entidad_id prod_id
									from 
									CAT_ENTIDAD_VALORCLASIFICACION cevc,
									CAT_VALOR_CLASIFICACION cvc
									where cevc.evc_tipo_entidad='PR'
									and cevc.vcl_id=cvc.vcl_id
									and cla_id in (2721,2761)
									and cvc.vcl_clave=$sol) sol
                                where cp.prod_id=depart.prod_id
                                and cp.prod_id=marca.prod_id
								and cp.prod_id=sol.prod_id
                                and prod_estado='AC'
                                group by vcl_clave, vcl_id, vcl_desc
                                order by vcl_Desc";
}
		$SentenciaAnalizada=ociparse($Conn,$Sentencia);
		ociexecute($SentenciaAnalizada);
        ?>

<select name="fMarcas" id="fMarcas" onChange="grupos_m();">
                                    	<option value="TODO" selected="selected">Todas las marcas</option>
                                    	<?php 
										while (ocifetch($SentenciaAnalizada)) { 
											?>
											<option value="<?php echo ociresult($SentenciaAnalizada,"VCL_ID") ?>"><?php echo ociresult($SentenciaAnalizada,"MARCA") ?></option>
											<?php 
										}
										?>                                  	
                                    </select>