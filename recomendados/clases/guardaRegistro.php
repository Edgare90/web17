<?php
require_once('conexion.php');

class guardaRegistro
{
	private $imagen;
	private $codigo;
	private $encabezado;
	private $descripcion;
	private $marca;
	private $id = 0;
	private $idProducto;
	const estatus = 1;
	
	public function __construct($imagen,$codigo,$encabezado,$descripcion,$marca,$idProducto)
	{
		$this->imagen = $imagen;
		$this->codigo = $codigo;
		$this->encabezado = $encabezado;
		$this->descripcion = $descripcion;
		$this->marca = $marca;
		$this->idProducto = $idProducto;
	}
	
	public function registro()
	{
		$conexion = new Conexion();
		$consulta = $conexion->prepare('INSERT INTO web17_recomendaciones(imagen_producto,codigo_producto,id_producto,encabezado_producto,descrip_producto,marca_producto) VALUES(:img,:codigo,:idProd,:encabezado,:descripcion,:marca)');
		$consulta->bindParam(':img',$this->imagen);
		$consulta->bindParam(':codigo',$this->codigo);
		$consulta->bindParam(':idProd',$this->idProducto);
		$consulta->bindParam(':encabezado',$this->encabezado);
		$consulta->bindParam(':descripcion',$this->descripcion);
		$consulta->bindParam(':marca',$this->marca);
		$consulta->execute();
		$this->id = $conexion->lastInsertId();
		
		if($this->id != 0)
		{
			return true;
		}else
		{
			return false;
		}
	}
}

?>