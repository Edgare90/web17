

<div class="container hidden-xs  ">
    <h3 class="section-title style2  text-center">
    <span>SOLUCIONES</span></h3>
    <div class="solucionesMenu col-xs-12 col-md-12">

        <div class="block block-40 clearfix">
            <div class="main clearfix">



                <div class="main clearfix">
                    <nav id="menu" class="nav">





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
                            return $Conn;
                        } 
						
							if ($Conn=ConectaSiil("WEB_USER_PUBLICO","W8q5/fBv")) {
								 $SentenciaSoluciones="select 
								cvc.vcl_id vcl_id, vcl_desc sol_desc, vcl_clave sol_clave
								from 
								CAT_VALOR_CLASIFICACION cvc
								where cla_id=2721
								and vcl_estado='AC'
								order by vcl_desc";	
								
								$SentenciaAnalizadaSoluciones=ociparse($Conn,$SentenciaSoluciones);
										ociexecute($SentenciaAnalizadaSoluciones);	
																	
								} else {
									echo "El servicio no se encuentra disponible. Por favor intentalo mas tarde";
								}
								
								while (ocifetch($SentenciaAnalizadaSoluciones)) {
									
									$solClave = ociresult($SentenciaAnalizadaSoluciones,"SOL_CLAVE");
						?>




                            <li class="nivel1"  onclick="openNav('mySidenav<?php echo $solClave; ?>')">
                                <a>
                                    <?php echo utf8_encode(ociresult($SentenciaAnalizadaSoluciones,"SOL_DESC")); ?>
                                </a>
                                <!--[if lte IE 6]><a href="#" class="nivel1ie primera">Opción 1<table class="falsa"><tr><td><![endif]-->

                            </li>

                        
                   





                            <div id="mySidenav<?php echo $solClave; ?>" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav('mySidenav<?php echo $solClave; ?>')">&times;</a>
                                <h1 class="solucionTitulo">
                                    <?php echo utf8_encode(ociresult($SentenciaAnalizadaSoluciones,"SOL_DESC")); ?>
                                </h1>

                                <ul id="primero">
                                    <div class="container">
                                         
                                        <div class="row">
                                            
                                            <?php 
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
									and cvc.vcl_clave=$solClave) sol
                                where cp.prod_id=depart.prod_id
                                and cp.prod_id=marca.prod_id
								and cp.prod_id=sol.prod_id
                                and prod_estado='AC'
                                group by vcl_clave, vcl_id, vcl_desc
                                order by vcl_Desc";
								
										$SentenciaAnalizada=ociparse($Conn,$Sentencia);
										ociexecute($SentenciaAnalizada);
										while (ocifetch($SentenciaAnalizada)) { 
											$idMarca = ociresult($SentenciaAnalizada,"VCL_ID");
									?>
 <div class="col-sm-2 col-xs-4 soluc">
     

     
           
    
                                            <a class="solutext" href="catalogo.php?fSolucionM=<?php echo $solClave; ?>&fMarca=<?php echo $idMarca; ?>"> <img class="imgSoluciones lazy" data-src="images/brandWhite/<?php echo strtolower(ociresult($SentenciaAnalizada,"MARCA")); ?>.png">
                                                <?php echo utf8_encode( ociresult($SentenciaAnalizada,"MARCA")); ?>
                                            </a>
     </div>
                                            <?php } ?>
                                        
                                    </div>
                                    </div>
                                </ul>



                            </div>
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->

                            <?php } ?>




                            <script>
                                function openNav(cual) {
                                    document.getElementById(cual).style.width = "100%";

                                }

                                function closeNav(cual) {
                                    document.getElementById(cual).style.width = "0";
                                }

                            </script>


                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
