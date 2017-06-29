<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<?php
include_once("conexion.php");
?>
<html lang="es">

<head>
    
 
 <!DOCTYPE html>
<html lang="es">


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
    <link href="assets/css/tabla.css" rel="stylesheet">

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

<title>CVA - Comercializadora de Valor Agregado</title>

   <?php include 'scriptsTop.php';?>



    </head>

<body>

    <?php include 'menu.php';?>


    
    <?php
            date_default_timezone_set('America/Mexico_City');
			$hoy= date('Y-m-d');
			echo $hoy;
			$sel = mysql_query("SELECT * FROM reserv_eventos WHERE f_evento>'$hoy' AND tipo_evento!='Capacitacion a Ventas' AND autorizacion='si' ORDER BY f_evento ");
			if ( $sel !== false && mysql_num_rows($sel) > 0 ) {
				?>
    
    
     <div class="container main-container ">
            <div class="row innerPage">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    
    <table  class="width200" style="font-size:12px;color:#4a5456;text-align:left;">
        
         <thead>
            <tr>
                <th>MARCA</th>
                <th>FECHA</th>
                <th>TIPO</th>
                <th>SUCURSAL</th>
                <th>DESCRIPCIÓN</th>C
            </tr>
            </thead>
        
        
        
        
				
					<?php
					$cont1=0;
					$cont2=0;
					while ($s = mysql_fetch_assoc($sel)) {
						if($cont1==$cont2){
							$color_f="#f8f8f8"; 
							$cont1=$cont1+1;
						}else{
							$color_f="#f9fafa"; 
							$cont1=$cont1+1;  
							$cont2=$cont2+2;
						}
						?>
                        <tr bgcolor="<?php echo $color_f;?>">
                            <td height="79" style="font-weight:bold;">
                            	<p><?php echo $s['id']."-"; echo $s['marca']; ?></p>
                            </td>
                            <td>
                            	<p><?php echo $s['dia'].'/'.$s['mes'].'/'.$s['anyo']; ?></p>
                            </td>
                            <td>
                            	<p><?php echo $s['tipo_evento']; ?></p>
                            </td>
                            <td>
                            	<p><?php echo $s['sucursal']; ?></p>
                            </td>
                            <td align="center">
                            	<?php 
								if($s['liga'] != '') {
									?> <p><a href="<?php echo $s['liga']; ?>" target="_blank" class="link2">Ver m&aacute;s</a></p> <?php
								} else {
									echo "<p>Informaci&oacute;n no disponible</p>";
								}
                            	?>
                            </td>
                   		</tr>
                        <?php 
					}
					?>
				</table>
                <?php
			} else {
				?> <p style="padding-top:20px; margin-left:20px;">Por el momento no hay eventos disponibles. </p> <?php 
			}
			?>
            <br><br><br>
    
    
    
    
    
                </div></div></div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

  

   
    <?php include 'footer.php';?>








<script src="assets/bootstrap/js/bootstrap.min.js"></script>
 
<script type="text/javascript" src="assets/js/jquery.parallax-1.1.js"></script>
 
<script type="text/javascript" src="assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
 
<script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js"></script>
 
<script type="text/javascript" src="assets/plugins/icheck-1.x/icheck.min.js"></script>
 
<script src="assets/js/grids.js"></script>
 
<script src="assets/js/owl.carousel.min.js"></script>
 
 
<script src="assets/js/bootstrap.touchspin.js"></script>
 
<script src="assets/js/script.js"></script>

      <?php include 'scripts.php';?>
    </body>
</html>

    
    