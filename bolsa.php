<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<html lang="es">

    
    <style>
        tr {
            
            text-align: center;
        }
        th {
    text-align: center;
}
    </style>
<script>
	$(document).ready(function() {
    $('#tabala').DataTable( {
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        } ]
    } );
} );
	
function postular(idOferta)
  {
 mywindow = window.open('postulaOferta.php?idOferta='+idOferta,'_blank','toolbar=0,location=0,status=0,menubar=0, scrollbars=1,resizable=0,width=600,height=1000, top=50,left=150');  
  }
  
 function dejaCV(sucursal)
  {
	 //alert(sucursal);
	  mywindow = window.open('dejarCV.php?idSucursal='+sucursal,'_blank','toolbar=0,location=0,status=0,menubar=0, scrollbars=1,resizable=0,width=600,height=1000, top=50,left=150');
	  
  }
</script>  
<head>
 
           <?php include 'scriptsTop.php';?>


    </head>
    <body>
        <div class="container main-container headerOffset">
        <div class="row innerPage">
           
            <div class="col-lg-12 col-md-12 col-sm-12">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php include 'menu.php';?>




   <?php
		 
		 ini_set ('error_reporting', E_ALL);
$mysqli = new mysqli("localhost", "mkt", "mktweb2015", "mkt");
                
                
                
               
/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

//obtenemos las diferentes sucursales donde haya ofertas
$conOfertas = array();
$sinOfertas = array();
$sucur = array();

$consultaConSuc = "SELECT DISTINCT ofer.idSucursal FROM BolsaTrab_oferta as ofer
			 INNER JOIN BolsaTrab_sucursales as bs
			 WHERE ofer.idSucursal = bs.idSucursal ORDER BY bs.sucursal ASC ";
			 
			 mysqli_query("SET NAMES 'UTF8'");
$resultados = $mysqli->query($consultaConSuc);
while ($filA = $resultados->fetch_assoc()) 
{
	 $conOfertas[] = $filA['idSucursal'];
}
?>
                
                
<div class="col-xs-12 col-sm-12">
   <div class="row row-centered">
          <img src="images/CVAAcerca.png" style="text-align:center">
    </div>
<h1 class="title-big text-center section-title-style2" style="    font-size: 29px;">
Bolsa de trabajo</h1></div>

           <p class="lead acercade text-center">
Si estas interesado en ser parte de nuestro equipo, envíanos tu información.
</p>     
                
  <table class="table" id="tabala">
                        <thead>
                        <tr>
                        	<th>Sucursal</th>
                            <th>Oferta</th>
                            <th>Vacantes</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
						

<?php

$consultaSuc = "SELECT * FROM BolsaTrab_sucursales ORDER BY idSucursal ASC ";
$resul = $mysqli->query($consultaSuc);
while ($filas = $resul->fetch_assoc()) 
{
	  if (in_array($filas['idSucursal'],$conOfertas))
		{
			$consulta = "SELECT ofer.idOferta,ofer.sueldo, ofer.sexo, ofer.requisitos, ofer.descripcion, ofer.idSucursal, ofer.CantVacantes, depto.depto, puest.puesto, sucursales.sucursal
								FROM BolsaTrab_oferta AS ofer
								INNER JOIN BolsaTrab_sucursales AS sucursales ON ofer.idSucursal = sucursales.idSucursal
								INNER JOIN BolsaTrab_puesto AS puest ON ofer.idPuesto = puest.idPuesto
								INNER JOIN BolsaTrab_depto AS depto ON ofer.idDepto = depto.idDepto
								WHERE ofer.estatus = 'A' AND ofer.idSucursal='".$filas['idSucursal']."' ORDER BY sucursales.sucursal ASC";
			$resultado = $mysqli->query($consulta);
			while ($fila = $resultado->fetch_assoc()) 
						 { 
						 ?>
                        <tr>
                         <td onClick="javascript:postular('<?php echo $fila['idOferta']; ?>');"><?php  echo ($fila['sucursal']); ?></td>
						  <td onClick="javascript:postular('<?php echo $fila['idOferta']; ?>');"><?php  echo ($fila['puesto']); ?></td>
                          <td onClick="javascript:postular('<?php echo $fila['idOferta']; ?>');"> <?php echo ($fila['CantVacantes']);?></td>
						  <td><input type="button" value="Ver M&aacute;s" onClick="javascript:postular('<?php echo $fila['idOferta']; ?>');" class="btn  bg-gray"></td>
						 </tr>   
              <?php       }          
                        
		}else
		{ ?>
        
        	<tr>
                         <td><?php  echo ($filas['sucursal']); ?></td>
						  <td>Por el momento no hay vacantes en esta sucursal</td>
                          <td>Déjanos tu CV</td>
						  <td><input type="button" value="Dejar CV" onClick="javascript:dejaCV('<?php echo $filas['idSucursal']; ?>');" class="btn  bg-gray"></td>
						 </tr> 
        
        <?php
			
		}
}

?>
 </tbody>
                        </table> 
                <div style="margin-top:50px"></div>      </div></div></div>
    <?php include 'footer.php';?>


    <script src="assets/js/jquery/jquery-1.10.1.min.js">


    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/jquery.cycle2.min.js">


    </script>

    <script src="assets/js/jquery.easing.1.3.js">


    </script>

    <script type="text/javascript" src="assets/js/jquery.parallax-1.1.js">


    </script>

    <script type="text/javascript" src="assets/js/helper-plugins/jquery.mousewheel.min.js">


    </script>

    <script type="text/javascript" src="assets/js/jquery.mCustomScrollbar.js">


    </script>

    <script type="text/javascript" src="assets/plugins/icheck-1.x/icheck.min.js"></script>

    <script src="assets/js/grids.js"></script>

    <script src="assets/js/owl.carousel.min.js">


    </script>

    <script type="text/javascript" src="assets/js/smoothproducts.min.js">


    </script>

    <script src="js/select2/4.0.0/js/select2.min.js"></script>

    <script src="assets/js/bootstrap.touchspin.js">


    </script>

    <script src="assets/js/script.js"></script>
      <?php include 'scripts.php';?>
      
    </body>



    <script>
        $(document).ready(function() {
            // Obtener estados
            $.ajax({
                type: "POST",
                url: "assets/procesar-estados.php",
                data: {
                    estados: "Mexico"
                }
            }).done(function(data) {
                $("#jmr_contacto_estado").html(data);
            });
            // Obtener municipios
            $("#jmr_contacto_estado").change(function() {
                var estado = $("#jmr_contacto_estado option:selected").val();

                $.ajax({
                    type: "POST",
                    url: "assets/procesar-estados.php",
                    data: {
                        municipios: estado
                    }
                }).done(function(data) {
                    $("#jmr_contacto_municipio").html(data);
                });
            });
        });

    </script>




    <script src="js/classie.js"></script>
    <script>
        (function() {
            // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
            if (!String.prototype.trim) {
                (function() {
                    // Make sure we trim BOM and NBSP
                    var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                    String.prototype.trim = function() {
                        return this.replace(rtrim, '');
                    };
                })();
            }

            [].slice.call(document.querySelectorAll('input.input__field')).forEach(function(inputEl) {
                // in case the input is already filled..
                if (inputEl.value.trim() !== '') {
                    classie.add(inputEl.parentNode, 'input--filled');
                }

                // events:
                inputEl.addEventListener('focus', onInputFocus);
                inputEl.addEventListener('blur', onInputBlur);
            });

            function onInputFocus(ev) {
                classie.add(ev.target.parentNode, 'input--filled');
            }

            function onInputBlur(ev) {
                if (ev.target.value.trim() === '') {
                    classie.remove(ev.target.parentNode, 'input--filled');
                }
            }
        })();

    </script>


</html>
