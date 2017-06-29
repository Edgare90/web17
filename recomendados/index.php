<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Documento sin t&iacute;tulo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
</head>
<body>
<?php
function listar_archivos($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
			?>
            
            <select id="marca" name="marca" required>
            <option value="">Seleccione una marca</option>
			<?php
            while(($archivo = readdir($dir)) !== false)
			{
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess')
				{
                    echo "<option value='".$archivo."'>".$archivo."</option>";
                }
            }?>
            </select>
			<?php
            closedir($dir);
        }
    }
}
?>
<script>
function cuentaCabecera(){
	  var cabecera = 42;
       var caracteresCabecera = document.forms[0].encabezado_producto.value.length;
	   var restantes = cabecera - caracteresCabecera;
	   
	   if(restantes<=5)
	   {
	   		$('#encabezadoDiv').html('<font strong color="red">'+restantes+'</strong>');
	   }else
	   {
		   $('#encabezadoDiv').html('<strong>'+restantes+'</strong>');
	   }
	   //alert(caracteresCabecera);
}

function cuentaDescrip(){
	   var descripcion = 143;
       var caracteresDescrip = document.forms[0].descripcion_producto.value.length;
	   var restantes = descripcion - caracteresDescrip;
	   
	   if(restantes<=5)
	   {
	   $('#descripcionDiv').html('<font strong color="red">'+restantes+'</strong>');
	   }else
	   {
		  $('#descripcionDiv').html('<strong>'+restantes+'</strong>'); 
	   }
	   //alert(caracteresDescrip);
}
</script> 
<?php
require_once('clases/subirArchivo.php');
require_once('clases/guardaRegistro.php');

if(isset($_POST['codigo_producto']))
{
	$upload = new Upload('recomendaciones/', true, array('jpg', 'png'));
    if ($upload->moveFile('img_producto')) 
	{
		$nvoRegistro = new guardaRegistro($_FILES['img_producto']['name'],$_POST['codigo_producto'],$_POST['encabezado_producto'],$_POST['descripcion_producto'],$_POST['marca'],$_POST['id_producto']);
		$guardo = $nvoRegistro->registro();
		if($guardo)
		{
			echo "Producto Guardado";
		}else
		{
			echo "Producto no Guardado";
		}
    } 
	else 
	{
        echo "La imagen del producto no esta en el formato correcto o no hay archivo";
    }
}
?>
<div class="container">
<form id="recomendado" name="recomendado" enctype="multipart/form-data" method="post" action="#">
	
    <div class="form-group ">
    <label for="img_producto">Imagen del producto:</label>
    <input type="file" id="img_producto" name="img_producto"/>
    </div>
    
    <div class="form-group">
    <label for="id_producto">Id del producto:</label>
    <input type="text" id="id_producto" name="id_producto" required/>
    </div>
    
    <div class="form-group">
    <label for="codigo_producto">Codigo del producto:</label>
    <input type="text" id="codigo_producto" name="codigo_producto" required/>
    </div>
    
    <div class="form-group">
    <label for="codigo_producto">Encabezado:</label>
    <input type="text" id="encabezado_producto" name="encabezado_producto" onKeyDown="javascript:cuentaCabecera();" onKeyUp="javascript:cuentaCabecera();" required size="120"/>
    <div id="encabezadoDiv"></div>
    </div>
    
    <div class="form-group">
    <label for="codigo_producto">Descripcion:</label>
    <textarea id="descripcion_producto" name="descripcion_producto" onKeyDown="javascript:cuentaDescrip();" onKeyUp="javascript:cuentaDescrip();" required rows="10" cols="100"></textarea>
    <div id="descripcionDiv"></div>
    </div>
    
    <div class="form-group">
    <label for="marca_producto">Marca:</label>
    <?php echo listar_archivos('../images/brand'); ?>
    </div>
	
    <button type="submit" class="btn btn-default">Subir</button>
</form>
</div>


</body>
</html>
