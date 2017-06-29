<?php
include_once("conexion.php");

session_start();

ob_start();

?>
	<!DOCTYPE html>
	<html class="no-js" lang="en">
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<LINK REL="SHORTCUT ICON" HREF="images/icon.png">
		<title>Comercializadora de Valor Agregado - Mayorista en Computo, Mexico</title>
		<meta name="Description" content="Comercializadora de Valor Agregado S.A. soluciones para tu negocio - MAYORISTA DE COMPUTO E INFORMATICA" >
		<meta name="Keywords" content="Mayorista en Computacion en Mexico,Distribuidora de Computacion,Computadoras,Laptops,Notebooks,Consumibles,pc,cartuchos" >
		<meta name="author" content="Grupo CVA" />
		<link rel="shortcut icon" href="images/icono.jpg">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		
		<script src="js/jquery-1.10.1.min.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				//eliminamos el scroll de la pagina
				$("body").css({"overflow-y":"hidden"});
				//guardamos en una variable el alto del que tiene tu browser que no es lo mismo que del DOM
				var alto=$(window).height();
				//agregamos en el body un div que sera que ocupe toda la pantalla y se muestra encima de todo
				$("body").append("<div id='pre-load-web'><div id='imagen-load'><img src='images/load.gif' alt='' /></div></div>"); 
				//le damos el alto 
				$("#pre-load-web").css({height:alto+"px"}); 
				//esta sera la capa que esta dento de la capa que muestra un gif 
				$("#imagen-load").css({"margin-top":(alto/2)-30+"px"}); 
				
				
				$("body").fadeIn( "slow" );
				
			})   
			
			$(window).load(function(){ 
			$("#pre-load-web").fadeOut(1000,function() { //eliminamos la capa de precarga $(this).remove();
			//permitimos scroll 
			$("body").css({"overflow-y":"auto"}); }); 
			 
			})
		</script>
		
		<style>
				
			#pre-load-web {width:100%;position:absolute;background:#fff;left:0px;top:0px;z-index:100000}
			/*aqui centramos la imagen si coloco margin left -30 es por que la imagen mide 60 */
			#pre-load-web #imagen-load{left:50%;margin-left:-30px;position:absolute}
			
		</style>
		
		<script language="javascript">
		function validar(){ 
			var fUsuario = document.getElementById('fUsuario');
			if(fUsuario.value == ''){ 
				// informamos del error 
				alert('Ingresa tu usuario CVA'); 
				// seleccionamos el campo incorrecto 
				fUsuario.focus(); 
				return false
			}
			
			var fContrasenia = document.getElementById('fContrasenia');
			if(fContrasenia.value == ''){ 
				// informamos del error 
				alert('Falta la contraseña'); 
				// seleccionamos el campo incorrecto 
				fContrasenia.focus(); 
				return false
			} 
			
			document.forms["comp"].submit();
			
		}
		
		<?php
		if(isset($_REQUEST['error'])) {
			?>
			alert('Usuario incorrecto. Intente de nuevo'); 
			<?php 
		}
		?>
		
		</script>
		
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-54360835-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
		
	</head>
		
	<body>
		<div id="wrapp">
			<div class="contenido">
				<div id="top">
					<div id="logo">
						<a href="recomendaciones.php"><img src="images/logo.png" border="0" /></a>
					</div>
					
					<div id="logo2"></div>
				</div>
			</div>
			
			<div class="contenido" style="margin-top:20px;">
				<p class="tema">&Aacute;REA DE INGRESO</p>
                <span>Introduce tu usuario de CVA para continuar</span>
				
				<form name="comp" id="comp" method="post" action="logincontrol.php" enctype="multipart/form-data">
				<table class="tabla"  cellpadding="5" cellspacing="0">
					<tr>
						<td align="right" class="label2">Usuario CVA</td>
						<td><input size="50" name="fUsuario" type="text" id="fUsuario"/></td>
					<tr>
					<tr>
						<td align="right" class="label2">Contrase&ntilde;a</td>
						<td><input size="50" name="fContrasenia" type="password" id="fContrasenia"/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="button" name="enviar" value="Enviar" class="boton" onClick="validar();"><br /><br />&nbsp;</td>
					</tr>
				</table>
				</form>
				
			</div>
			
			
			
		</div>
	</body>
	</html>
	<?php

ob_end_flush();
?>