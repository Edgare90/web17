<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<title>Documento sin título</title>
</head>

<body>
<?php
require_once 'clases/conexion.php';
//require_once 'alumno.entidad.php';
//require_once 'alumno.model.php';
class Recomendado
{
    private $idRecomendacion;
    private $codigo_producto;
    private $id_producto;
    private $encabezado_producto;
    private $descrip_producto;
	private $estatus;

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v;}
}


class AlumnoModel
{
    private $pdo;

    public function Listar()
    {
        try
        {
            $result = array();
			$conexion = new Conexion();
            $stm = $conexion->prepare("SELECT * FROM web17_recomendaciones");
            $stm->execute();

            while($fila = $stm->fetch())
            {
                $alm = new Recomendado();

                $alm->__SET('idRecomendacion', $fila['idRecomendacion']);
                $alm->__SET('codigo_producto', $fila['codigo_producto']);
				$alm->__SET('id_producto', $fila['id_producto']);
				$alm->__SET('encabezado_producto', $fila['encabezado_producto']);
				$alm->__SET('descrip_producto', $fila['descrip_producto']);
				$alm->__SET('estatus', $fila['estatus']);
				
				$result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
	
	
	public function Actualizar($idRecomendacion, $nvoEstatus)
    {
		 /*return $idRecomendacion;*/
       try 
        {
			$conexion = new Conexion();
			$consulta = $conexion->prepare("UPDATE web17_recomendaciones SET estatus = :estatus WHERE idRecomendacion = :reomenda");
			$consulta->bindParam(':estatus',$nvoEstatus);
			$consulta->bindParam(':reomenda',$idRecomendacion);
            if($consulta->execute())
			{
				return true;
			}else
			{
				return false;
			}
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
	
	public function Eliminar($id)
    {
        try 
        {
			$conexion = new Conexion();
            $consulta = $conexion->prepare("DELETE FROM web17_recomendaciones WHERE idRecomendacion = :reomenda");
			$consulta->bindParam(':reomenda',$id);
            if($consulta->execute())
			{
				return true;
			}else
			{
				return false;
			}
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    
}

$alm = new Recomendado();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('idRecomendacion', $_REQUEST['id']);
            $alm->__SET('estatus',$_REQUEST['nvoEstatus']);
            $actualziado = $model->Actualizar($alm->__GET('idRecomendacion'),$alm->__GET('estatus'));
			if($actualizado)
			{
            header('Location: seleccionaActivos.php');
			}else
			{?>
            	<script>alert('Recomendado no actualziado');</script>
            <?php
			header('Location: seleccionaActivos.php');
			}
            break;

        case 'eliminar':
            $eliminado = $model->Eliminar($_REQUEST['id']);
			if($eliminado)
			{
				header('Location: seleccionaActivos.php');
			}else{?>
            	<script>alert('Recomendado no eliminado');</script>
            <?php
			header('Location: seleccionaActivos.php');
			}
            break;
    }
}

?>

                <table class="table">
                    <thead>
                        <tr>
                            <th >Id Recomendacion</th>
                            <th >Id Producto</th>
                            <th >Codigo Producto</th>
                            <th >Encabezado Producto</th>
                            <th>Cambiar Estado</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('idRecomendacion'); ?></td>
                            <td><?php echo $r->__GET('id_producto'); ?></td>
                            <td><?php echo $r->__GET('codigo_producto'); ?></td>
                            <td><?php echo $r->__GET('encabezado_producto'); ?></td>
                            
                            
                            <?php $estado =  $r->estatus;
								if($estado == '1')
								{
							?>
                            	<td>
                                	<a href="?action=actualizar&id=<?php echo $r->idRecomendacion; ?>&nvoEstatus=0">Desactivar</a>
                            	</td>
                            <?php }
								else{ ?>
                           		<td>
                                	<a href="?action=actualizar&id=<?php echo $r->idRecomendacion; ?>&nvoEstatus=1">Activar</a>
                            	</td>
                            <?php } ?>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->idRecomendacion; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table> 
</body>
</html>