    <script>

</script>
    	
<?php 
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
                      
                        if ($Conn=oci_pconnect($UserName, $Passwd, $DataBase,"WE8ISO8859P1"))
                            //echo "Conexion Realizada exitosamente <br> ";
                            //else 
                            //echo "No se pudo realizar la conexion a oracle";
                            return $Conn;
                        } 		
			if(isset($_GET["fMarcas"]) ){
				
				$Marca=$_GET["fMarcas"];
				$Solucion=$_GET["fSolucion"];
				$Grupo=$_GET["fGrupo"];
				$Libre=strtoupper($_GET["libre"]);
			     $pagina=$_GET["pagina"];
                
                $conteo=20;
               $enCual=$pagina * $conteo;
			
			  if($Marca == "TODO")
			  {
				  $Marca='%';
			  }
			  if($Solucion=='TODO')
			  {
				  $Solucion='%';
			  }
			  if($Grupo=='TODO')
			  {
				$Grupo = '%';
			  }
			
			   $Grupo='%';
				
				
				if($Libre != "")
				{
					//echo $Libre;
					$Marca="%";
					$Grupo="%";
					$Solucion="%";
					//echo "entra aqui";
				}
				
				
				
				$space='10px';
		  		
		  		
		  
		  		$gpo1=$_GET["gpo1"];
		  		$gpo2=$_GET["gpo2"];
		  		$gpo3=$_GET["gpo3"];
		  		$gpo4=$_GET["gpo4"];
		  
		  		if($gpo4!=0 && $gpo4!=''){
			  		$Grupo=$gpo4;
			  	}else if($gpo3!=0 && $gpo3!='') {
			  		$Grupo=$gpo3;
			  	}else if($gpo2!=0 && $gpo2!=''){
			  		$Grupo=$gpo2;
			  	}else if($gpo1!=0 && $gpo1!=''){
			  		$Grupo=$gpo1;
			  	}else{
			  		$Grupo=$Grupo;
			  	}
		  
		  		$Clave=strtoupper($_GET["art_clave"]);
		  		$CodigoFabricante=strtoupper($_GET["cod_fab"]);
		  		
				//echo "clave".$Clave;
				//echo "codigo".$CodigoFabricante;
				
		  
			  	// Variable de Conexion a Siil  
		         $Datos=explode(' ',$Libre);
				 if(count($Datos)>0)
				 {
				 $Filtro='and ((';
				 for($i=0;$i<count($Datos);$i++)
				 {
					 if($i==0)
					 {
					 $Filtro=$Filtro."  PROD_DESC like '%".$Datos[$i]."%'";
					 }
					 else
					 {
						 $Filtro=$Filtro."and PROD_DESC like '%".$Datos[$i]."%'";
					 }
				 }
				 $Filtro=$Filtro.')';
				 
				  $Filtro=$Filtro.'or (';
				 for($i=0;$i<count($Datos);$i++)
				 {
					 if($i==0)
					 {
					 $Filtro=$Filtro."  prod_codigo_fabricante like '%".$Datos[$i]."%'";
					 }
					 else
					 {
						 $Filtro=$Filtro."and prod_codigo_fabricante like '%".$Datos[$i]."%'";
					 }
				 }
				 $Filtro=$Filtro.')';
				 
				 
				 $Filtro=$Filtro.'or (';
				 for($i=0;$i<count($Datos);$i++)
				 {
					 if($i==0)
					 {
					 $Filtro=$Filtro."  prod_clave like '%".$Datos[$i]."%'";
					 }
					 else
					 {
						 $Filtro=$Filtro."and prod_clave like '%".$Datos[$i]."%'";
					 }
				 }
				 $Filtro=$Filtro.')';
				 
				 
				 }
				 $Filtro=$Filtro.')';
			  	if ($Conn=ConectaSiil("WEB_USER_PUBLICO","W8q5/fBv")){
					 $SentenciaProductos="select 
				  		-- PRODUCTOS ME PEDIDOS
		  				cp.prod_id
		  				from bpm_demo.cat_producto cp,
		  				(select entidad_id prod_id, vcl_clave, cla_id, vcl_desc
		  				from 
		  				bpm_demo.CAT_ENTIDAD_VALORCLASIFICACION cevc,
		  				bpm_demo.CAT_VALOR_CLASIFICACION cvc
		  				where cevc.evc_tipo_entidad='PR'
                   
						and cevc.vcl_id=cvc.vcl_id
						and cla_id=81
						and cvc.vcl_id like :MARCA) marca,
						(select entidad_id prod_id
						from 
						bpm_demo.CAT_ENTIDAD_VALORCLASIFICACION cevc,
						bpm_demo.CAT_VALOR_CLASIFICACION cvc
						where cevc.evc_tipo_entidad='PR'
                      
						and cevc.vcl_id=cvc.vcl_id
						and cvc.vcl_id like :GRUPO
						group by entidad_id) grupo,
						(select entidad_id prod_id
						from 
						CAT_ENTIDAD_VALORCLASIFICACION cevc,
						CAT_VALOR_CLASIFICACION cvc
						where cevc.evc_tipo_entidad='PR'
                      
						and cevc.vcl_id=cvc.vcl_id
						and cla_id in (2721,2761)
						and cvc.vcl_clave like '$Solucion'
						group by entidad_id) solucion
						where prod_clave like :ClaveArticulo  $Filtro
						and prod_estado='AC'
						and prod_codigo_fabricante like :CodigoFabricante
						and cp.prod_id=marca.prod_id
						and cp.prod_id=solucion.prod_id
						and cp.prod_id=grupo.prod_id";
						  
					//$Libre="%".$Libre."%";
					$ClaveArticulo=$Clave."%";
					$CodigoFabricante="%".$CodigoFabricante."%";
			
					$SentenciaAnalizadaProductos=ociparse($Conn,$SentenciaProductos);
					ocibindbyname($SentenciaAnalizadaProductos,":Grupo",$Grupo);
					ocibindbyname($SentenciaAnalizadaProductos,":Marca",$Marca);
					ocibindbyname($SentenciaAnalizadaProductos,":Libre",$Libre);
					ocibindbyname($SentenciaAnalizadaProductos,":CodigoFabricante",$CodigoFabricante);
					ocibindbyname($SentenciaAnalizadaProductos,":ClaveArticulo",$ClaveArticulo);
					
					//echo $SentenciaProductos;
				  
					ociexecute($SentenciaAnalizadaProductos,OCI_NO_AUTO_COMMIT);
				  	while(ocifetch($SentenciaAnalizadaProductos)){
						$PROD_ID_CONS=ociresult($SentenciaAnalizadaProductos,"PROD_ID");
				
						$SentenciaInsert="insert into bpm_demo.TT_PROD_CONSULTA_MET values(:PROD_ID)";
					  	$SentenciaAnalizadaInsert=ociparse($Conn,$SentenciaInsert);
					  	ocibindbyname($SentenciaAnalizadaInsert,":PROD_ID",$PROD_ID_CONS);
					  	ociexecute($SentenciaAnalizadaInsert,OCI_NO_AUTO_COMMIT);
				  	}
				  
				  	$SentenciaProductosPQ="select prod_id
		  				from bpm_demo.cat_producto
						where prod_tipo='PQ'
						and prod_estado='AC'
						and prod_clave like :ClaveArticulo
						and prod_codigo_fabricante like :CodigoFabricante
						and (prod_clave like :Libre or PROD_DESC like :Libre or PROD_CODIGO_FABRICANTE like :Libre)'";
				  
					$Libre="%".$Libre."%";
					$ClaveArticulo=$ClaveArticulo."%";
					$CodigoFabricante="%".$CodigoFabricante."%";
	  
					$SentenciaAnalizadaProductosPQ=ociparse($Conn,$SentenciaProductosPQ);
					ocibindbyname($SentenciaAnalizadaProductosPQ,":Grupo",$Grupo);
					ocibindbyname($SentenciaAnalizadaProductosPQ,":SOL",$Solucion);
					ocibindbyname($SentenciaAnalizadaProductosPQ,":Marca",$Marca);
					ocibindbyname($SentenciaAnalizadaProductosPQ,":Libre",$Libre);
					ocibindbyname($SentenciaAnalizadaProductosPQ,":CodigoFabricante",$CodigoFabricante);
					ocibindbyname($SentenciaAnalizadaProductosPQ,":ClaveArticulo",$ClaveArticulo);
			  
					ociexecute($SentenciaAnalizadaProductosPQ,OCI_NO_AUTO_COMMIT);
					while(ocifetch($SentenciaAnalizadaProductosPQ)){
						$PROD_ID_CONS=ociresult($SentenciaAnalizadaProductosPQ,"PROD_ID");
			
						$SentenciaInsert="insert into bpm_demo.TT_PROD_CONSULTA_MET values(:PROD_ID)";
						$SentenciaAnalizadaInsert=ociparse($Conn,$SentenciaInsert);
						ocibindbyname($SentenciaAnalizadaInsert,":PROD_ID",$PROD_ID_CONS);
						ociexecute($SentenciaAnalizadaInsert,OCI_NO_AUTO_COMMIT);
					}
					  
					$SentenciaPRPQ="select cpp.PROD_ID from bpm_demo.CAT_PAQUETE_PRODUCTO cpp, bpm_demo.TT_PROD_CONSULTA_MET  
						where prod_id_componente=TT_PROD_CONSULTA_MET.prod_id
						group by cpp.PROD_ID";
				  
				  
				  	$SentenciaAnalizadaPRPQ=ociparse($Conn,$SentenciaPRPQ);
				  	ociexecute($SentenciaAnalizadaPRPQ,OCI_NO_AUTO_COMMIT);
				  	while(ocifetch($SentenciaAnalizadaPRPQ)) {
				  		$PROD_ID_PQ=ociresult($SentenciaAnalizadaPRPQ,"PROD_ID");
				
						$SentenciaInsert="insert into bpm_demo.TT_PROD_CONSULTA_MET values(:PROD_ID)";
					  	$SentenciaAnalizadaInsert=ociparse($Conn,$SentenciaInsert);
						ocibindbyname($SentenciaAnalizadaInsert,":PROD_ID",$PROD_ID_PQ);
						ociexecute($SentenciaAnalizadaInsert,OCI_NO_AUTO_COMMIT);
				  	}
				  
				  
				  	 $SentenciaCatalogo="
					 select *
					 from
					 (select ROWNUM num, prod_id, prod_tipo, COD_FABRICANTE,
					 clave, NOMBRE_ETIQUETA,marca,DESCRIPCION
					  from 
					 (
					 select 
						cp.prod_id, 
						prod_tipo, 
						PROD_CODIGO_FABRICANTE COD_FABRICANTE,
						PROD_CLAVE clave,
						nvl(PROD_RUTA_IMAGEN,'/var/www/jsp/detalle_articulo/images/na1.gif') NOMBRE_ETIQUETA,
						marca.vcl_desc marca,
						PROD_DESC DESCRIPCION
						from bpm_demo.cat_producto cp,
						(select entidad_id prod_id, cvc.vcl_id, cla_id, vcl_desc
						from 
						bpm_demo.CAT_ENTIDAD_VALORCLASIFICACION cevc,
						bpm_demo.CAT_VALOR_CLASIFICACION cvc
						where  cevc.evc_tipo_entidad='PR'
						and cevc.vcl_id=cvc.vcl_id
						and cvc.cla_id=81) marca,
						(select entidad_id prod_id
						from 
						bpm_demo.CAT_ENTIDAD_VALORCLASIFICACION cevc,
						bpm_demo.CAT_VALOR_CLASIFICACION cvc
						where cevc.evc_tipo_entidad='PR'
						and cevc.vcl_id=cvc.vcl_id
						and cvc.vcl_id like '$Grupo'
						group by entidad_id) grupof,
						(
						 select prod_id
						 from
						 (select prod_id
						from bpm_demo.cat_prod_almacen c
						where alm_id=189
						and vcl_id in (821,822,823,1261,1262,1263)
						union all
						select cp.prod_id
						from bpm_demo.cat_producto cp, bpm_demo.cat_entidad_valorclasificacion cev 
						where vcl_id=7101
						and cp.prod_id=cev.entidad_id 
						and cp.prod_estado='AC'
						union all
						select prod_id
						from cat_producto
						where prod_tipo='PQ')
						 group by prod_id) depart,
						(select prod_id from CAT_PRODUCTO_LISTA_DE_PRECIOS where ldp_id=33) ldp,
						(select prod_id from bpm_demo.TT_PROD_CONSULTA_MET group by prod_id) TT_PROD_CONSULTA_MET
						where  prod_estado='AC'
                      	and cp.prod_id=depart.prod_id
						and cp.prod_id=ldp.prod_id(+)
						and cp.prod_id=marca.prod_id(+)
						and cp.prod_id=grupof.prod_id(+)
						and cp.prod_entrada=0 
						and cp.prod_id=TT_PROD_CONSULTA_MET.prod_id
						order by prod_clave))
						--where num between 150 and 190
                      
                        ";
		  
						  //
						  //
						  //echo $SentenciaCatalogo;
											  
					$SentenciaAnalizadaCatalogo=ociparse($Conn,$SentenciaCatalogo);
					ociexecute($SentenciaAnalizadaCatalogo,OCI_NO_AUTO_COMMIT);
					$NumeroDeRegistros=0;
					while (ocifetch($SentenciaAnalizadaCatalogo)){
						$TablaRegistros["CLAVE"][]= ociresult($SentenciaAnalizadaCatalogo,"CLAVE");
						$TablaRegistros["PROD_ID"][]= ociresult($SentenciaAnalizadaCatalogo,"PROD_ID");
						$TablaRegistros["COD_FABRICANTE"][]= ociresult($SentenciaAnalizadaCatalogo,"COD_FABRICANTE");
						//$TablaRegistros["C"][]= ociresult($SentenciaAnalizadaCatalogo,"C");
						$TablaRegistros["DESCRIPCION"][]= ociresult($SentenciaAnalizadaCatalogo,"DESCRIPCION");
						if(ociresult($SentenciaAnalizadaCatalogo,"PROD_TIPO")=='PQ'){
							$TablaRegistros["MARCA"][]='PAQUETE';	
						}else{
							$TablaRegistros["MARCA"][]= ociresult($SentenciaAnalizadaCatalogo,"MARCA");
						}
						$TablaRegistros["PROD_TIPO"][]= ociresult($SentenciaAnalizadaCatalogo,"PROD_TIPO");
					 	$NumeroDeRegistros=$NumeroDeRegistros+1;
					}
				}
				
				echo "Total de Registros: ".$NumeroDeRegistros;
				 echo '  <script>  $( "#cargar1" ).css("display", "none");  </script>';			
				?>
    <div id="products" class="row list-group">

    
   
        			<?php 
					
					
					
					$cont1=0;
					$cont2=0;
					for ($i=0;$i<$NumeroDeRegistros;$i++){
						if($cont1==$cont2){
							$color_f="#f8f8f8"; 
							$cont1=$cont1+1;
						}else{
							$color_f="#f9fafa"; 
							$cont1=$cont1+1;  
							$cont2=$cont2+2;
						}
						if($TablaRegistros["PROD_TIPO"][$i]=='PR'){
							$detalle = "/detalle_articulo/articulo.php?fProdId=".$TablaRegistros["PROD_ID"][$i];
						} else if($TablaRegistros["PROD_TIPO"][$i]=='PQ'){
							$detalle = "/detalle_articulo/paquetes.php?fProdId=".$TablaRegistros["PROD_ID"][$i];
						}
									
						?>
                        
                     <div class="item  col-xs-12 col-lg-4">
                        <div class="thumbnail">
                        <div class="laimagen">
                            
                           
                            
                            
                            
                            <img    class="group list-group-image" src="https://www.grupocva.com/detalle_articulo/imagen_art.php?fProd=<?php echo $TablaRegistros["PROD_ID"][$i]; ?>" 
                                 onError="this.onerror=null;this.src='images/errorImage.jpg';"
                                 alt="" />
                            
                            
                            
                            
                            </div>
                            
                            
                            
                            
                            <div class="caption">
                                <h4 class="group inner list-group-item-heading">
                                    <?php echo $TablaRegistros["CLAVE"][$i]; ?></h4>
                                <p class="group inner list-group-item-text">
                                    <?php echo $TablaRegistros["DESCRIPCION"][$i]; ?></p>
                                <div class="row">
                                    <div class="col-xs-10">
                                    <?php $detalle  = "/detalle_articulo/articulo.php?fProdId=".$TablaRegistros["PROD_ID"][$i]; ?>
                                        <!-- <a class="btn btn-success" href="http://www.jquery2dotnet.com">Ver Detalles</a> -->
                                        <input class="btn btn-success vermas " type="button" value="Ver Detalles" onClick="javascript:DoNav('<?php echo $detalle; ?>');"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <?php 
					}
					?>
            	</table>
                <?php
		 		ocifreestatement($SentenciaAnalizadaCatalogo);
			}
			
	    	echo "<div style='width:400px;".$space.";'></div>";
			 unset($_GET['fSolucionM']);
			 
			 unset($_POST['fMarcas']);
  			?>   
 </div>