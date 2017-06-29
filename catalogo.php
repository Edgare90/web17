<link rel="stylesheet" href="assets/Swiper-master/swiper.min.css">
<?php header('Content-Type: text/html;  charset=UTF-8'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
if (isset($_GET['fSolucionM'])) {
   $lasolucion =  $_GET['fSolucionM'];
}
if (isset($_GET['fMarca'])) {
    $lamarca =  $_GET['fMarca'];
}
?>
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
                                order by vcl_Desc        ";
                                    
                            /*$SentenciaMarcas="select vcl_clave, vcl_id, vcl_desc marca
                            from
                            CAT_VALOR_CLASIFICACION cvc
                            where vcl_estado='AC'
                            and cla_id=81";*/
                                    
                            $SentenciaGrupos="select vcl_id, VCL_DESC grupo from bpm_demo.CAT_VALOR_CLASIFICACION where cla_id=161  and vcl_estado='AC' order by VCL_DESC";
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



        <html lang="es">




<style>
            h2 {
    font-size: 24px;
    line-height: 36px;
    margin-bottom: 14px;
    text-transform: uppercase;
}
    
    input.btn.bg-gray.limpio.busqueda {
    background-color: #777;
}
    
    
            </style>
        <script>
            function limpiarDiv() {
                $("#productos").empty();
            }

            $(document).ready(function() {
                document.getElementById("tabla").style.display = 'none';
                document.getElementById("cargar1").style.display = 'none';
                $("input[name=libre]").click(function() {
                    limpiarDiv();
                });









            });



            paceOptions = {
                elements: true
            };

            function limpiar() {

                $('#libre').val('');
                $('#fSolucion').val($('#fSolucion > option:first').val());
                $('#fMarcas').val($('#fMarcas > option:first').val());
                $('#fGrupo').val($('#fGrupo > option:first').val());
                document.getElementById("tabla").style.display = 'none';
                document.getElementById("cargar1").style.display = 'none';
            }

            function m_solu() {
                limpiarDiv();
                var marca = '%';
                var sol = $("#fSolucion").val();

                $.ajax({
                    type: "GET",
                    url: "soluciones.php",
                    data: "func=cargar&sol=" + sol,
                    error: function(objeto, quepaso, otroobj) {
                        alert("Hubo un problema al realizar la consulta");
                    },
                    success: function(data) {
                        $("#marca").html(data);
                        $("#panel").html("");
                        $("#panel2").html("");
                        $("#panel3").html("");
                        $("#panel4").html("");
                    }

                });
            }


            function grupos_m() {
                limpiarDiv();
                var marca = $("#fMarcas").val();
                var sol = $("#fSolucion").val();

                $.ajax({
                    type: "GET",
                    url: "grupos.php",
                    data: "func=cargar&marca=" + marca + "&sol=" + sol,
                    error: function(objeto, quepaso, otroobj) {
                        alert("Hubo un problema al realizar la consulta");
                    },
                    success: function(data) {
                        $("#grupos_p").html(data);
                        $("#panel").html("");
                        $("#panel2").html("");
                        $("#panel3").html("");
                        $("#panel4").html("");
                    }

                });
            }

            function grupos_m_1() {
                limpiarDiv();
                var marca = $("#fMarcas").val();
                var grupo = $("#fGrupo").val();


                $.ajax({
                    type: "GET",
                    url: "grupos_1.php",
                    data: "func=cargar&marca=" + marca + "&grupo=" + grupo,
                    error: function(objeto, quepaso, otroobj) {
                        alert("Hubo un problema al realizar la consulta");
                    },
                    success: function(data) {
                        $("#panel").html(data);
                    }

                });
            }


            function cargaProductos(valor) {
                document.getElementById("tabla").style.display = 'block';
                document.getElementById("cargar1").style.display = 'block';





                var libre = $("#libre").val();

                if (valor == "filtros") {
                    var marca = $("#fMarcas").val();
                    var solucion = $("#fSolucion").val();
                    var grupo = $("#fGrupo").val();
                    var lapagina = "1";
                    if ($("#gpo1").length > 0) {

                        var grupo1 = $("#gpo1").val();
                        $("#productos").load("busquedaCatalogo.php?libre=" + encodeURIComponent(libre) +  "&fMarcas=" + marca + "&fSolucion=" + solucion + "&fGrupo=" + grupo + "&gpo1=" + grupo1 + "&pagina=" + lapagina, function() {});
                    } else if ($("#gpo2").length > 0) {
                        var grupo2 = $("#gpo2").val();
                        $("#productos").load("busquedaCatalogo.php?libre=" + encodeURIComponent(libre) +  "&fMarcas=" + marca + "&fSolucion=" + solucion + "&fGrupo=" + grupo + "&gpo2=" + grupo2 + "&pagina=" + lapagina, function() {});
                    } else if ($("#gpo3").length > 0) {
                        var gpo3 = $("#gpo3").val();
                        $("#productos").load("busquedaCatalogo.php?libre=" + encodeURIComponent(libre) +  "&fMarcas=" + marca + "&fSolucion=" + solucion + "&fGrupo=" + grupo + "&gpo3=" + grupo3 + "&pagina=" + lapagina, function() {});
                    } else if ($("#gpo4").length > 0) {
                        var gpo4 = $("#gpo4").val();
                        $("#productos").load("busquedaCatalogo.php?libre=" + encodeURIComponent(libre) +  "&fMarcas=" + marca + "&fSolucion=" + solucion + "&fGrupo=" + grupo + "&gpo4=" + grupo4 + "&pagina=" + lapagina, function() {});
                    } else {
                        $("#productos").load("busquedaCatalogo.php?libre=" + encodeURIComponent(libre) +  "&fMarcas=" + marca + "&fSolucion=" + solucion + "&fGrupo=" + grupo + "&pagina=" + lapagina, function() {});
                    }
                }
                if (valor == "libre") {
                    $("#productos").load("busquedaCatalogo.php?libre=" + encodeURIComponent(libre) + "&fMarcas='0'", function() {});
                    setTimeout('limpiar()', 9000);

                }




            }

        </script>

        <script type="text/javascript">
            function DoNav(theUrl) {
                //document.location.href = theUrl;
                window.open(theUrl, 'newwindow');
            }

        </script>







        <title>CVA - Comercializadora de Valor Agregado</title>

        <?php include 'scriptsTop.php';?>
      

        <body>

            <?php include 'menu.php';?>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">



            <?php include 'banerCatalogo.php';?>
            <div class="container">
                <div class="col-ms-12">

                    <hr>

                    <div class="col-md-8 col-sm-12 col-md-offset-3   text-center centro">

                        <div id="nuevos-productos" class="carousel slide " data-ride="carousel">


                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="row">
                                    <div class="item active">
                                        <div class="">


                                            <h3 style="text-align:center;"><span class="titulos" style=" color: #fff;">Catálogo</span></h3>


                                        </div>

                                    </div>
                                </div>
                            </div>






                         
                              
                                  
                                    <div class="col-sm-12 col-md-12  text-center" >
                                        <h2>Búsqueda por Solución</h2>
                                        <div class="form-group ">
                                            <h3>Soluciones</h3>
                                            <div class="styled-select">
                                                <select name="fSolucion" id="fSolucion" onChange="javascript:m_solu();">
              <option value="TODO" selected="selected">Todas las Soluciones</option>
              <?php 
										while (ocifetch($SentenciaAnalizadaSoluciones)) { 
										
										
											?>
                                  <option value="<?php echo ociresult($SentenciaAnalizadaSoluciones,"SOL_CLAVE") ?>"><?php echo utf8_encode(ociresult($SentenciaAnalizadaSoluciones,"SOL_DESC")) ?></option>
                                  <?php 
										}
										?>
            </select>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <h3>Marca</h3>
                                            <div class="styled-select" id="marca">
                                                <select name="fMarcas" id="fMarcas" onChange="grupos_m();">
              							<option value="TODO">Todas las marcas</option>
              <?php 
										while (ocifetch($SentenciaAnalizadaMarcas)) { 
										
									
											?>
											<option value="<?php echo ociresult($SentenciaAnalizadaMarcas,"VCL_ID") ?>"><?php echo utf8_encode(ociresult($SentenciaAnalizadaMarcas,"MARCA")) ?></option>
											<?php 
											
										}
										?>     
            							</select>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <h3>Grupo</h3>
                                            <div class="styled-select" id="grupos_p">
                                                <select name="fGrupo" id="fGrupo" class="styled-select" onChange="grupos_m_1();">
            							<option value="TODO"> TODOS LOS GRUPOS</option>
                                            <?php 
                                                    while (ocifetch($SentenciaAnalizadaGrupos)) { 
                                                        ?>
                                                        <option value="<?php echo ociresult($SentenciaAnalizadaGrupos,"VCL_ID") ?>"><?php echo utf8_encode(ociresult($SentenciaAnalizadaGrupos,"GRUPO")) ?></option>
                                                        <?php 
                                                    } 
                                                    ?>
          							</select>
                                            </div>
                                            <div id="panel">
                                            </div>
                                            <div id="panel2">
                                            </div>
                                            <div id="panel3">
                                            </div>
                                            <div id="panel4">
                                            </div>
<div class="divider" style="margin:40px 0;">
       <h2>Búsqueda libre</h2>
                                                              
     <h3>Ingrese la palabra o palabras con las cuales desea realizar su búsqueda</h3>
                                            <input class="form-control" id="libre" name="libre" >

                               
                             </div>                 
                                            
                                              <div class="col-sm-12 col-md-6  text-center" >
                                                  <input type="button" onClick="javascript:limpiar()" value="Limpiar" class="btn bg-gray limpio busqueda" /></div>
                                              <div class="col-sm-12 col-md-6  text-center" >
  <input type="button" onClick="javascript:cargaProductos('filtros')" value="Buscar" class="btn bg-gray busqueda" />
                                            
                                            </div>     
                                           



                                          
                                      
                                    </div>

           
                                       </div>





                        
                    </div>
                </div>
                    
                    
                    
                    
                </div></div>
            
            <div class="container" id="aquuui">
                <div class="well well-sm" id="tabla">
                    <strong>Ver como</strong>
                    <div class="btn-group">
                        <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Tabla</a>
                    </div>
                </div>



                <div id="productos">
                </div>



            </div>

            <div class="container">
                <div class="row ">
                    <div class="container alta">
                        <div class="col-md-12 col-sm-12">
                            <h1>Políticas de Devolución</h1>
                            <ul class="texto2" style="list-style-type: square">
                                <li> Es importante que si usted no conoce el producto o tiene alguna duda de lo que va a comprar haga las preguntas antes de solicitar el producto.</li>
                                <li>Toda devolución causará un cargo del 20% </li>

                                <li>Para devolver producto tiene que ser autorizado por el Gerente de Sucursal o Gerente de Ventas. </li>

                                <li>El producto deberá de ser revisado por el departamento de servicio técnico debiendo estar en perfectas condiciones con su envoltura y empaque original así como manuales, drivers, sellos, software y accesorios originales.</li>

                                <li>No se aceptan devoluciones de productos abiertos y con sellos violados.</li>

                                <li>No se aceptan devoluciones de productos sobre pedido (No de línea).</li>

                                <li>No se aceptan devoluciones de producto que estén obsoletos.</li>

                                <li>No se aceptan devoluciones que no vengan completas, en perfectas condiciones.</li>

                                <li>No se aceptan devoluciones después de 5 días de facturadas.</li>

                                <li>No se devuelve dinero se elabora nota de crédito la cual puede aplicar para sus compras posteriores.</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>









            <div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog" aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>

                </div>

            </div>

            <div id="cargar1" style="display:none;">
                <div id="preloader1">
                    <div class="loader1">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php';?>



            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/plugins/swiper-master/js/swiper.jquery.min.js"></script>
            <script>
                var swiper = new Swiper('.swiper-container', {
                    pagination: '.swiper-pagination',
                    nextButton: '.nextControl',
                    prevButton: '.prevControl',
                    keyboardControl: true,
                    paginationClickable: true,
                    slidesPerView: 'auto',
                    autoResize: true,
                    resizeReInit: true,
                    spaceBetween: 0,
                    freeMode: true
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



            <script src="assets/js/bootstrap.touchspin.js"></script>

            <script src="assets/js/home.js"></script>

            <script src="assets/js/script.js"></script>

            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

          




            <script>
                $(document).ready(function() {
                    var lapagina = "1";



                    var d = getLoadingElement();
                    document.getElementById("cargar1").appendChild(d);




                    $('#list').click(function(event) {
                        event.preventDefault();
                        $('#products .item').addClass('list-group-item');
                    });
                    $('#grid').click(function(event) {
                        event.preventDefault();
                        $('#products .item').removeClass('list-group-item');
                        $('#products .item').addClass('grid-group-item');
                    });
                });

            </script>

            <script>
                /* <![CDATA[ */
                (function(d, s, a, i, j, r, l, m, t) {
                    try {
                        l = d.getElementsByTagName('a');
                        t = d.createElement('textarea');
                        for (i = 0; l.length - i; i++) {
                            try {
                                a = l[i].href;
                                s = a.indexOf('/cdn-cgi/l/email-protection');
                                m = a.length;
                                if (a && s > -1 && m > 28) {
                                    j = 28 + s;
                                    s = '';
                                    if (j < m) {
                                        r = '0x' + a.substr(j, 2) | 0;
                                        for (j += 2; j < m && a.charAt(j) != 'X'; j += 2) s += '%' + ('0' + ('0x' + a.substr(j, 2) ^ r).toString(16)).slice(-2);
                                        j++;
                                        s = decodeURIComponent(s) + a.substr(j, m - j)
                                    }
                                    t.innerHTML = s.replace(/</g, '&lt;').replace(/\>/g, '&gt;');
                                    l[i].href = 'mailto:' + t.value
                                }
                            } catch (e) {}
                        }
                    } catch (e) {}
                })(document); /* ]]> */

            </script>





            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {

                    if (<?php echo $lasolucion; ?> != "") {

                        $("#fSolucion").val("<?php echo $lasolucion; ?>");

                        $("#fMarcas").val("<?php echo $lamarca; ?>");

                        cargaProductos('filtros');
                    }



                }, false);

            </script>

            <?php include 'scripts.php';?>


            <script src="assets/Swiper-master/swiper.min.js"></script>

            <script>
                var swiperH = new Swiper('.swiper-container-h', {
                    pagination: '.swiper-pagination-h',
                    paginationClickable: true,
                    spaceBetween: 50
                });
                var swiperV = new Swiper('.swiper-container-v', {
                    pagination: '.swiper-pagination-v',
                    paginationClickable: true,
                    direction: 'vertical',
                    spaceBetween: 50
                });

            </script>



        </body>

        </html>
