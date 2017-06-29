<?php
$marca=$_GET["marca"];
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
		
if($marca=='%' && $sol=='%')
{
	$Sentencia="select vcl_id, cla_id, vcl_clave, vcl_desc grupo from CAT_VALOR_CLASIFICACION where CLA_ID=161 and VCL_ESTADO='AC' order by vcl_desc";
		
}else
if($marca!='%' && $sol=='%')
{
 $Sentencia="select grupo_id vcl_id, grupo
from cat_producto cp,
(select entidad_id prod_id, vcl_clave, cla_id, vcl_desc
from 
CAT_ENTIDAD_VALORCLASIFICACION cevc,
CAT_VALOR_CLASIFICACION cvc
where cevc.evc_tipo_entidad='PR'
and cevc.vcl_id=cvc.vcl_id
and cla_id=81
and cvc.vcl_id=$marca) marca,
(select entidad_id prod_id, cvc.vcl_id grupo_id, vcl_desc grupo
from 
CAT_ENTIDAD_VALORCLASIFICACION cevc,
CAT_VALOR_CLASIFICACION cvc
where cevc.evc_tipo_entidad='PR'
and cevc.vcl_id=cvc.vcl_id
and cla_id=161) grupo,
(select prod_id
from cat_prod_almacen 
where alm_id=189
and vcl_id in (821,822,823,1261,1262,1263,2941)) depto
where cp.prod_id=marca.prod_id
and cp.prod_id=grupo.prod_id  
and cp.prod_id=depto.prod_id
and prod_estado='AC'
group by grupo_id,grupo
order by grupo";
}else
if($marca=='%' && $sol!='%')
{
 $Sentencia="select grupo_id vcl_id, grupo
from cat_producto cp,
(select entidad_id prod_id, vcl_clave, cla_id, vcl_desc
from 
CAT_ENTIDAD_VALORCLASIFICACION cevc,
CAT_VALOR_CLASIFICACION cvc
where cevc.evc_tipo_entidad='PR'
and cevc.vcl_id=cvc.vcl_id
and cla_id in (2721,2761)
and cvc.vcl_clave = $sol) marca,
(select entidad_id prod_id, cvc.vcl_id grupo_id, vcl_desc grupo
from 
CAT_ENTIDAD_VALORCLASIFICACION cevc,
CAT_VALOR_CLASIFICACION cvc
where cevc.evc_tipo_entidad='PR'
and cevc.vcl_id=cvc.vcl_id
and cla_id=161) grupo,
(select prod_id
from cat_prod_almacen 
where alm_id=189
and vcl_id in (821,822,823,1261,1262,1263,2941)) depto
where cp.prod_id=marca.prod_id
and cp.prod_id=grupo.prod_id  
and cp.prod_id=depto.prod_id
and prod_estado='AC'
group by grupo_id,grupo
order by grupo";
}else
if($marca!='%' && $sol!='%')
{
 $Sentencia="select grupo_id vcl_id, grupo
from cat_producto cp,
(select entidad_id prod_id, vcl_clave, cla_id, vcl_desc
from 
CAT_ENTIDAD_VALORCLASIFICACION cevc,
CAT_VALOR_CLASIFICACION cvc
where cevc.evc_tipo_entidad='PR'
and cevc.vcl_id=cvc.vcl_id
and cla_id in (2721,2761)
and cvc.vcl_clave = $sol) sol,
(select entidad_id prod_id, vcl_clave, cla_id, vcl_desc
from 
CAT_ENTIDAD_VALORCLASIFICACION cevc,
CAT_VALOR_CLASIFICACION cvc
where cevc.evc_tipo_entidad='PR'
and cevc.vcl_id=cvc.vcl_id
and cla_id=81
and cvc.vcl_id=$marca) marca,
(select entidad_id prod_id, cvc.vcl_id grupo_id, vcl_desc grupo
from 
CAT_ENTIDAD_VALORCLASIFICACION cevc,
CAT_VALOR_CLASIFICACION cvc
where cevc.evc_tipo_entidad='PR'
and cevc.vcl_id=cvc.vcl_id
and cla_id=161) grupo,
(select prod_id
from cat_prod_almacen 
where alm_id=189
and vcl_id in (821,822,823,1261,1262,1263,2941)) depto
where cp.prod_id=marca.prod_id
and cp.prod_id=grupo.prod_id
and cp.prod_id=sol.prod_id  
and cp.prod_id=depto.prod_id
and prod_estado='AC'
group by grupo_id,grupo
order by grupo";
}
		$SentenciaAnalizada=ociparse($Conn,$Sentencia);
		ociexecute($SentenciaAnalizada);
        ?>

<select name="fGrupo" id="fGrupo" onChange="grupos_m_1();">
		        <option value="TODOS" selected> Todos Los Grupos</option>
		<?php
		
		while (ocifetch($SentenciaAnalizada))
			{ 
				?>
					<option <?php if($Grupo==ociresult($SentenciaAnalizada,"VCL_ID")) echo 'selected'; ?> value="<?php echo ociresult($SentenciaAnalizada,VCL_ID); ?>">  <?php echo ociresult($SentenciaAnalizada,"GRUPO"); ?></option>
				<?php
					
			}
		?>
		</select>