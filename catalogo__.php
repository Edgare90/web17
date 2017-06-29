<?php
include_once("conexion.php");
$space='';
?>
<!DOCTYPE html>
<html >
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Comercializadora de Valor Agregado - Mayorista en Computo, Mexico</title>
    <meta name="Description" content="Comercializadora de Valor Agregado S.A. soluciones para tu negocio - MAYORISTA DE COMPUTO E INFORMATICA" >
	<meta name="Keywords" content="Mayorista en Computacion en Mexico,Distribuidora de Computacion,Computadoras,Laptops,Notebooks,Consumibles,pc,cartuchos" >
    <meta name="author" content="Grupo CVA" />
    <link rel="shortcut icon" href="images/icono.jpg">
      <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link id="pagestyle" rel="stylesheet" type="text/css" href="assets/css/skin-1.css">
    <link href="assets/css/style.css" rel="stylesheet">
        <script src="js/jquery.min.js">

    <script type="text/javascript">
		$(document).ready(function(){
			//eliminamos el scroll de la pagina
			$("body").css({"overflow-y":"hidden"});
			var alto=$(window).height();
			//agregamos en el body un div que sera que ocupe toda la pantalla y se muestra encima de todo
			$("body").append("<div id='pre-load-web'><div id='imagen-load'><img src='images/load.gif' alt='' /></div></div>"); 
			//le damos el alto 
			$("#pre-load-web").css({height:alto+"px"}); 
			//esta sera la capa que esta dento de la capa que muestra un gif 
			$("#imagen-load").css({"margin-top":(alto/2)-30+"px"}); 
			
			
			$("body").fadeIn( "slow" );
			
			$(window).scroll(function(){
				if ($(this).scrollTop() > 500) {
					$('.scrollup').fadeIn();
				} else {
					$('.scrollup').fadeOut();
				}
			});
	  
			$('.scrollup').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 600);
				return false;
			});
			
		})   
		
		$(window).load(function(){ 
		$("#pre-load-web").fadeOut(1000,function() { //eliminamos la capa de precarga $(this).remove();
		//permitimos scroll 
		$("body").css({"overflow-y":"auto"}); }); 
		 
		})
	</script>
    
    <script language="javascript" type="text/javascript" src="js/popup.js"></script> 
	<link href="css/popup.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript">
	function DoNav(theUrl){
	  //document.location.href = theUrl;
	  window.open(theUrl, 'newwindow');
	}
	</script>
    
    
     <script type="text/javascript">
		function DoNav(theUrl){
		  //document.location.href = theUrl;
		  window.open(theUrl, 'newwindow');
		}
	</script>
	
    <style>
            
		#pre-load-web {width:100%;position:absolute;background:#fff;left:0px;top:0px;z-index:100000}
		/*aqui centramos la imagen si coloco margin left -30 es por que la imagen mide 60 */
		#pre-load-web #imagen-load{left:50%;margin-left:-30px;position:absolute}
		
		.styled-select select {
		   width: 400px; 	
		   height: 22px;
		}
		   
		.styled-select {
		   width: 400px;
		   height: 22px;
		}
		
		input[type="text"]{
			width: 400px;
			height:22px;
		}

		
	</style>
    


<script language="javascript">

function m_sol()
	 {
var marca='%';
var sol=$("#fSolucion").val();

$.ajax({
type: "GET",
url: "soluciones.php",
data: "func=cargar&sol="+sol,
error: function(objeto, quepaso, otroobj){
alert("Hubo un problema al realizar la consulta");
},
success: function(data){
$("#marca").html(data);
$("#panel").html("");
$("#panel2").html("");
$("#panel3").html("");
$("#panel4").html("");
}
 
});

var marca=$("#fMarca").val();

$.ajax({
type: "GET",
url: "grupos.php",
data: "func=cargar&sol="+sol+"&marca=%",
error: function(objeto, quepaso, otroobj){
alert("Hubo un problema al realizar la consulta");
},
success: function(data){
$("#grupos_p").html(data);
$("#panel").html("");
$("#panel2").html("");
$("#panel3").html("");
$("#panel4").html("");
}
 
});

}

function grupos_m()
	 {
var marca=$("#fMarca").val();
var sol=$("#fSolucion").val();

$.ajax({
type: "GET",
url: "grupos.php",
data: "func=cargar&marca="+marca+"&sol="+sol,
error: function(objeto, quepaso, otroobj){
alert("Hubo un problema al realizar la consulta");
},
success: function(data){
$("#grupos_p").html(data);
$("#panel").html("");
$("#panel2").html("");
$("#panel3").html("");
$("#panel4").html("");
}
 
});

}


function grupos_m_1()
	 {
var marca=$("#fMarca").val();
var grupo=$("#fGrupo").val();


$.ajax({
type: "GET",
url: "grupos_1.php",
data: "func=cargar&marca="+marca+"&grupo="+grupo,
error: function(objeto, quepaso, otroobj){
alert("Hubo un problema al realizar la consulta");
},
success: function(data){
$("#panel").html(data);
}
 
});

}

function grupos_m_2()
	 {
var marca=$("#fMarca").val();
var grupo=$("#gpo1").val();



$.ajax({
type: "GET",
url: "grupos_2.php",
data: "func=cargar&marca="+marca+"&grupo="+grupo,
error: function(objeto, quepaso, otroobj){
alert("Hubo un problema al realizar la consulta");
},
success: function(data){
$("#panel2").html(data);
}
 
});

}

function grupos_m_3()
	 {
var marca=$("#fMarca").val();
var grupo=$("#gpo2").val();



$.ajax({
type: "GET",
url: "grupos_3.php",
data: "func=cargar&marca="+marca+"&grupo="+grupo,
error: function(objeto, quepaso, otroobj){
alert("Hubo un problema al realizar la consulta");
},
success: function(data){
$("#panel3").html(data);
}
 
});

}

function grupos_m_4()
	 {
var marca=$("#fMarca").val();
var grupo=$("#gpo3").val();



$.ajax({
type: "GET",
url: "grupos_4.php",
data: "func=cargar&marca="+marca+"&grupo="+grupo,
error: function(objeto, quepaso, otroobj){
alert("Hubo un problema al realizar la consulta");
},
success: function(data){
$("#panel4").html(data);
}
 
});

}

</script>
    
    <script type="text/javascript" src="js/tooltip.js"></script>
    
   

	<script type="text/javascript">
		function validar() {
			var fUsuario = document.getElementById('fUsuario');
			if(fUsuario.value == '' ){
				alert('Ingrese un usuario');
				fUsuario.focus()
				return;
			} 
			if(fContrasenia.value == '' ){
				alert('Ingrese su contraseña');
				fContrasenia.focus()
				return;
			} 
			
			document.forms["campos"].submit();
		}
		
		function color (elemento){
			elemento.style.color="#585858";
		}
    </script>

	

	<script>
		function limpia(elemento){
			elemento.value = "";
		}
		function verifica(elemento){
			if(elemento.value == "") {
				elemento.value = "PALABRA CLAVE";
			}
		}
    </script>

</head>

<body onLoad="mostrar()" >
	<div id="wrapp">
<?php require("topcat.php"); ?>
<div id="fb-root"></div>

        <div class="contenido nav">
          <?php require("menu.php"); ?>
          <?php require("me.php"); ?>
</div>
<div id="banner_cat">
            <img src="banner/banner_catalogo.jpg" />
		  </div>
        
        <div id="franja">
<div class="contenido" style="padding-top:50px; background-color:#FFF; height:auto;">
  		<div class="tema" style="margin-top:200px;">
			<p>
            	CAT&Aacute;LOGO
            </p>
        </div>
              <div id="banner2" style="height:100%; background-color:#FFF;">
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
                        // Variable de Conexion a Siil
                        if ($Conn=ConectaSiil("WEB_USER_PUBLICO","W8q5/fBv")) {
                            $SentenciaMarcas="select vcl_clave, vcl_id, vcl_desc marca
                                from
                                bpm_demo.cat_producto cp,
                                (select prod_id
                                from bpm_demo.cat_prod_almacen 
                                where alm_id=261
                                and vcl_id in (821,822,823,1261,1262,1263)
                                union all
                                select cp.prod_id
                                from bpm_demo.cat_producto cp, bpm_demo.cat_entidad_valorclasificacion cev 
                                where vcl_id=7101
                                and cp.prod_id=cev.entidad_id 
                                and cp.prod_estado='AC') depart,
                                (select entidad_id prod_id, vcl_clave, cvc.vcl_id, vcl_desc
                                from 
                                bpm_demo.CAT_ENTIDAD_VALORCLASIFICACION cevc,
                                bpm_demo.CAT_VALOR_CLASIFICACION cvc
                                where cevc.evc_tipo_entidad='PR'
                                and cevc.vcl_id=cvc.vcl_id
                                and cla_id=81) marca
                                where cp.prod_id=depart.prod_id
                                and cp.prod_id=marca.prod_id
                                and prod_estado='AC'
                                group by vcl_clave, vcl_id, vcl_desc
                                order by vcl_Desc";
                                    
                            /*$SentenciaMarcas="select vcl_clave, vcl_id, vcl_desc marca
                            from
                            CAT_VALOR_CLASIFICACION cvc
                            where vcl_estado='AC'
                            and cla_id=81";*/
                                    
                            $SentenciaGrupos="select vcl_id, VCL_DESC grupo from bpm_demo.CAT_VALOR_CLASIFICACION where cla_id=161 and vcl_estado='AC' order by VCL_DESC";
                            $SentenciaAnalizadaMarcas=ociparse($Conn,$SentenciaMarcas);
                            $SentenciaAnalizadaGrupos=ociparse($Conn,$SentenciaGrupos);
                            ociexecute($SentenciaAnalizadaMarcas);
                            ociexecute($SentenciaAnalizadaGrupos);
                                    
                           
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
                            echo "El servicio no se encuentra disponible por favor intentalo mas tarde";
                        }                               
                    ?>
                    <form name="form1" id="form1" method="post" action="">
                      <table cellpadding="0" cellspacing="0">
                            <tr height="40" valign="middle">
                                <td class="label">CLAVE CVA</td>
                                <td><input name="art_clave" type="text" class="input" ></td>
                            </tr>
                            <tr valign="middle">
                              <td class="label" style="padding-left:10px;">C&Oacute;DIGO DE FABRICANTE</td>
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
                      <input type="submit" id="submit" name="Submit" value="Encontrar" align="middle" class="boton" style="cursor:pointer;">
                      <p class="texto2"> Para realizar la busqueda seleccione una marca o un grupo y presione buscar, puede combinar marca y grupo para tener combinaciones.</p>
                                <h3 style="text-align:center;">Políticas de Devolución</h3>            
                      	<ul class="texto2">
                        	<li>&bull; Es importante que si usted no conoce el producto o tiene alguna duda de lo que va a comprar haga las preguntas antes de solicitar el producto.</li>
                            <br />
                            <li>&bull; Toda devolución causará un cargo del 20% </li>
                            <br />
                            <li>&bull; Para devolver producto tiene que ser autorizado por el Gerente de Sucursal o Gerente de Ventas. </li>
                            <br />
                            <li>&bull; El producto deberá de ser revisado por el departamento de servicio técnico debiendo estar en perfectas condiciones con su envoltura y empaque original así como manuales, drivers, sellos, software y accesorios originales).</li>
                            <br />
                            <li>&bull; No se aceptan devoluciones de productos abiertos y con sellos violados.</li>
                            <br />
                            <li>&bull; No se aceptan devoluciones de productos sobre pedido (No de línea).</li>
                            <br />
                            <li>&bull; No se aceptan devoluciones de producto que están obsoletos.</li>
                            <br />
                            <li>&bull; No se aceptan devoluciones que no vengan completas, en perfectas condiciones.</li>
                            <br />
                            <li>&bull; No se aceptan devoluciones después de 5 días de facturadas.</li>
                            <br />
                            <li>&bull; No se devuelve dinero se elabora nota de crédito la cual puede aplicar para sus compras posteriores.</li>
                        </ul>
                    </form>
</div>
        
        <div class="contenido" style="background:#FFF; margin-top:-30px; height:auto; margin:0 auto;">
          <span class="contenido" style="background:#FFF; margin-top:-30px;">
           <?php 
			if(isset($_POST['Submit']) || (isset($_GET['fSolucionM']) || isset($_GET["fMarca"])) || isset($_POST['libre'])){
				
				
				
				 $Solucion=$_GET['fSolucionM'];
				 $Marca=$_GET["fMarca"];
				
				if($Solucion=='')
				{
				$Marca=$_POST["fMarca"];
				$Solucion=$_POST["fSolucion"];
				$Grupo=$_POST["fGrupo"];
				}else
				{
					if($Marca == ""){$Marca='%';}else
					{
						$Marca =$_GET["fMarca"]; //echo $Marca;
					}
					$Grupo='%';
				}
				
				$Libre=strtoupper($_POST["libre"]);
				if($Libre != "")
				{
					//echo $Libre;
					$Marca="%";
					$Grupo="%";
					$Solucion="%";
				}
				
				if($_POST['Submit'])
				{
					$Marca=$_POST["fMarca"];
					$Solucion=$_POST["fSolucion"];
					$Grupo=$_POST["fGrupo"];
				}
				
				
				$space='10px';
		  		
		  		
		  
		  		$gpo1=$_POST["gpo1"];
		  		$gpo2=$_POST["gpo2"];
		  		$gpo3=$_POST["gpo3"];
		  		$gpo4=$_POST["gpo4"];
		  
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
		  
		  		$Clave=strtoupper($_POST["art_clave"]);
		  		$CodigoFabricante=strtoupper($_POST["cod_fab"]);
		  		
		  
			  	// Variable de Conexion a Siil  
		  
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
						where prod_clave like :ClaveArticulo
						and prod_estado='AC'
						and prod_codigo_fabricante like :CodigoFabricante
						and (prod_clave like :Libre or PROD_DESC like :Libre or PROD_CODIGO_FABRICANTE like :Libre)
						and cp.prod_id=marca.prod_id
						and cp.prod_id=solucion.prod_id
						and cp.prod_id=grupo.prod_id";
						  
					$Libre="%".$Libre."%";
					$ClaveArticulo=$Clave."%";
					$CodigoFabricante="%".$CodigoFabricante."%";
			
					$SentenciaAnalizadaProductos=ociparse($Conn,$SentenciaProductos);
					ocibindbyname($SentenciaAnalizadaProductos,":Grupo",$Grupo);
					ocibindbyname($SentenciaAnalizadaProductos,":Marca",$Marca);
					ocibindbyname($SentenciaAnalizadaProductos,":Libre",$Libre);
					ocibindbyname($SentenciaAnalizadaProductos,":CodigoFabricante",$CodigoFabricante);
					ocibindbyname($SentenciaAnalizadaProductos,":ClaveArticulo",$ClaveArticulo);
				  
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
						and (prod_clave like :Libre or PROD_DESC like :Libre or PROD_CODIGO_FABRICANTE like :Libre)
						and :MARCA ='%'
						and :SOL ='%'
						and :GRUPO = '%'";
				  
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
				  
				  
				  	$SentenciaCatalogo="select 
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
						order by prod_clave";
		  
						  //
						  //					
											  
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
				
				
				
				?>
                
                
                
                <div style='font-size:12px;text-align:center; margin-left:500px;'><?php echo 'Numero de Registros:<b>' . $NumeroDeRegistros; ?></b></div><br>
                <table border="0" width="850" style="font-size:12px;color:#4a5456; width:850px; max-width:850px; margin:0 auto; " id='result'>
                    <tr bgcolor="#eb6d26" style="text-align:center; background:url(images/top.jpg) repeat-x">
                      <td><p><font color="white">CLAVE</font></p></td>
                      <td><p><strong><font color="white">COD.FABRICANTE</font></strong></p></td>
                      <td><p><font color="white">DESCRIPCION</font></p></td>
                      <td><p><font color="white">MARCA</font></p></td>
                    </tr>
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
                        <tr bgcolor="<?php echo $color_f;?>" class="data" onClick="DoNav('<?php echo $detalle; ?>');">
                            <td style="font-weight:bold;" nowrap>
                            	<p><?php echo $TablaRegistros["CLAVE"][$i]; ?></p>
                            </td>
                            <td>
                            	<p><?php echo $TablaRegistros["COD_FABRICANTE"][$i]; ?></p>
                            </td>
                            <td>
                            	<p><?php echo $TablaRegistros["DESCRIPCION"][$i]; ?></p>
                            </td>
                            <td>
                            	<p><?php echo $TablaRegistros["MARCA"][$i]; ?></p>
                            </td>
                   		</tr>
                    <?php 
					}
					?>
            	</table>
                <?php
		 		ocifreestatement($SentenciaAnalizadaCatalogo);
			}
			
	    	echo "<div style='width:400px;".$space.";'></div>";
			 unset($_GET['fSolucionM']);
  			?>
            
            <br/><br/><br/>
      </div>
     </div> 
        <a href="#" class="scrollup">Scroll</a>
 
        <div id="pie">
          <div class="contenido" style="margin-top:600px;">
            <?php require("menu2.php"); ?>
          </div>
        </div>
        
        <div id="pie2">
<div class="contenido">
            	<table style="width:855px;" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="left"></td>
                        <td align="right">
                            <p>Copyright&copy; Comercializadora de Valor Agregado S.A. de C.V. 2012. <br/>
                            Todos los derechos reservados.<br/>
                            <a href="privacidad.php" class="link"> Aviso de Privacidad CVA.</a><br/>
                            <a href="privacidad_servicios.php" class="link"> Aviso de Privacidad CVA Servicios.</a><br/>
                            <a href="privacidad_logistica.php" class="link"> Aviso de Privacidad CVA Logistica.</a><br/>
                            </p>
                        </td>
                    </tr>
                </table>
          </div>
  </div>
     
            
</div>   
         
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>



</body>
</html>
