<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.html">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>CVA - Comercializadora de Valor Agregado</title>

    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link id="pagestyle" rel="stylesheet" type="text/css" href="assets/css/skin-1.css">

    <link href="assets/css/style.css" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script>
        paceOptions = {
            elements: true
        };

    </script>
    <script src="assets/js/pace.min.js"></script>

</head>

<body>




<?php include 'menu.php';?>







<form name="form1" id="form1" method="post" action="">
                      <table cellpadding="0" cellspacing="0">
                            <tr height="40" valign="middle">
                                <td class="label">CLAVE CVA</td>
                                <td><input name="art_clave" type="text" class="input" ></td>
                            </tr>
                            <tr valign="middle">
                              <td class="label" style="padding-left:10px;">CÓDIGO DE FABRICANTE</td>
                                <td><input name="cod_fab" type="text" class="input" ></td>
                            </tr>
                            <tr height="40" valign="middle">
                              <td bgcolor="#FFFDE4" class="label">SOLUCIONES</td>
                              <td bgcolor="#FFFDE4"><div class="styled-select">
                                <select name="fSolucion" id="fSolucion" onChange="m_sol();">
                                  <option value="%">Todas las Soluciones</option>
                                  <?php 
										while (ocifetch($SentenciaAnalizadaSoluciones)) { 
										
											if( isset($_GET['fSolucionM']))
											{
												if($_GET['fSolucionM'] == ociresult($SentenciaAnalizadaSoluciones,"SOL_CLAVE"))
												{ ?>
                                                	
                                                	<option value="<?php echo ociresult($SentenciaAnalizadaSoluciones,"SOL_CLAVE") ?>" selected><?php echo ociresult($SentenciaAnalizadaSoluciones,"SOL_DESC") ?></option>
                                                    <script>
														m_sol();
													</script>
                                                <?php
													
												}else
												{ ?>
													<option value="<?php echo ociresult($SentenciaAnalizadaSoluciones,"SOL_CLAVE") ?>"><?php echo ociresult($SentenciaAnalizadaSoluciones,"SOL_DESC") ?></option>
												<?php
                                                }
											}else{
											?>
                                  <option value="<?php echo ociresult($SentenciaAnalizadaSoluciones,"SOL_CLAVE") ?>"><?php echo ociresult($SentenciaAnalizadaSoluciones,"SOL_DESC") ?></option>
                                  <?php 
											}
										}
										?>
                                </select>
                              </div></td>
                        </tr>
                            <tr height="40" valign="middle">
                                <td class="label">MARCA</td>                               
                                <td>
                                	<div class="styled-select" id="marca">
                                   	<select name="fMarca" id="fMarca" onChange="grupos_m();">
                                    	<option value="%">Todas las marcas</option>
                                    	<?php 
										while (ocifetch($SentenciaAnalizadaMarcas)) { 
										
											if(isset($_GET["fMarca"]))
											{	
												if($_GET["fMarca"] == ociresult($SentenciaAnalizadaMarcas,"VCL_ID"))
												{  ?>
                                                	<option value="<?php echo ociresult($SentenciaAnalizadaMarcas,"VCL_ID") ?>" selected><?php echo ociresult($SentenciaAnalizadaMarcas,"MARCA") ?></option>
                                                    <script>
														grupos_m();
													</script>
												<?php		
												}else
												{ ?>
                                                	<option value="<?php echo ociresult($SentenciaAnalizadaMarcas,"VCL_ID") ?>"><?php echo ociresult($SentenciaAnalizadaMarcas,"MARCA") ?></option>
												<?php	
												}
											}else{ 
											?>
											<option value="<?php echo ociresult($SentenciaAnalizadaMarcas,"VCL_ID") ?>"><?php echo ociresult($SentenciaAnalizadaMarcas,"MARCA") ?></option>
											<?php 
											}
										}
										?>                                  	
                                    </select>
                                    </div>
                            	</td>
                            </tr>
                            <tr height="40" valign="middle">
                                <td class="label">GRUPO</td>                                
                                <td>
                                	<table>
                                    	<tr>
                                    		<td>
                                                <div class="styled-select" id="grupos_p">
                                                 <select name="fGrupo" class="select" id="fGrupo"  onChange="grupos_m_1();">
                                                    <option value="%">Todos los Grupos</option>
                                                    <?php 
                                                    while (ocifetch($SentenciaAnalizadaGrupos)) { 
                                                        ?>
                                                        <option value="<?php echo ociresult($SentenciaAnalizadaGrupos,"VCL_ID") ?>"><?php echo ociresult($SentenciaAnalizadaGrupos,"GRUPO") ?></option>
                                                        <?php 
                                                    } 
                                                    ?>
                                                </select>
                                                </div>
                                    		</td>
                                    	</tr>
                                    	<tr>
                                			<td>
                          						 <div  id="panel">
                                                </div>
                                    		</td>
                            			</tr>
                                        <tr>
                                            <td>
                                               <div  id="panel2">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div  id="panel3">
                                                </div>
                                           	</td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <div  id="panel4">
                                                </div>
                                            </td>
                                        </tr>
                                 	</table>
                                </td>
                            </tr>
                            <tr height="40" valign="middle">
                                <td class="label" valign="top">BUSQUEDA LIBRE</td>
                                <td><input name="libre" type="text" class="input"></td>
                            </tr>
                      </table>
                     
                    </form>
  
  
  
  
  
  


 
<?php include 'footer.php';?>



   
 

    <script src="js/jquery.min.js">


    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(window).load(function() {
            $('#modalAds').modal('show');
            $('#modalAds').removeClass('hide');
        });

    </script>

    <script>
        $(function() {
            $(document).ready(function() {
                $('.carousel1').carousel({
                    interval: 2000
                });
            });
        });

    </script>

    <script src="assets/js/jquery.cycle2.min.js"></script>

    <script src="assets/js/jquery.easing.1.3.js"></script>

    <script type="text/javascript" src="assets/js/jquery.parallax-1.1.js"></script>

    <script type="text/javascript" src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js"></script>

    <script type="text/javascript" src="assets/plugins/icheck-1.x/icheck.min.js"></script>

    <script src="assets/js/grids.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="js/select2/4.0.0/js/select2.min.js"></script>

    <script src="assets/js/bootstrap.touchspin.js"></script>

    <script src="assets/js/home.js"></script>

    <script src="assets/js/script.js"></script>
    <script>


    </script>
   
</body>


</html>
