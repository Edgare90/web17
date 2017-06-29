

<?php
require_once('recomendados/clases/conexion.php');


class BuscaRecomendados {

   public function buscar(){
       $conexion = new Conexion();
	   $consulta = $conexion->prepare('SELECT * FROM web17_recomendaciones WHERE estatus = 1 LIMIT 4');
       $consulta->execute();
	   
	   while($registro = $consulta->fetch())
	   { ?>
		   <div class="item">
                <div class="product">

                    <div class="image">
                        <div class="quickview">
                        </div>
                        <a target="_blank" href="https://www.grupocva.com/detalle_articulo/articulo.php?fProdId=<?php echo $registro['id_producto']; ?>"><img data-src="recomendados/recomendaciones/<?php echo $registro['imagen_producto'];?>" alt="img" class="lazy img-responsive">
                        <div class="promotion"><span class="lazy new-product"><?php echo $registro['codigo_producto'];  ?></span> 
                        </div>
                        </a>
                    </div>
                   
                    <div class="description">
                    	<img src="images/brand/<?php echo $registro['marca_producto']; ?>" class="proRecomendado">
                        <h4><a target="_blank" href="https://www.grupocva.com/detalle_articulo/articulo.php?fProdId=<?php echo $registro['id_producto']; ?>"><?php echo $registro['encabezado_producto']; ?> </a></h4>
                        <p><?php echo $registro['descrip_producto']; ?></p>
                    </div>

                    <div class="action-control">
                        <div class="button-wrapper">
                           <a target="_blank" href="https://www.grupocva.com/detalle_articulo/articulo.php?fProdId=<?php echo $registro['id_producto']; ?>"><button class="btn  bg-gray" type="button"> VER MÁS</button></a>
                        </div>
                    </div>
                </div>
            </div>
		<?php   
	   }
       
   }
 }?>
 
 
 <div class="container main-container recomendados">

    <div class="row featuredPostContainer globalPadding style2">
        <h3 class="section-title style2 text-center"><span>RECOMENDACIONES</span></h3>
        <div id="productslider" class="owl-carousel owl-theme">
<?php
 
  $recomendacion = new BuscaRecomendados();
 $recomendacion->buscar();
?> 
        </div>

    </div>

</div>


