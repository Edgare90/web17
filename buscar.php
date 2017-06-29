<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <title>CVA - Comercializadora de Valor Agregado</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



    <script type="text/javascript" src="tipuesearch/tipuesearch_set.js"></script>
    <script type="text/javascript" src="tipuesearch/tipuesearch_content.js"></script>
    <link rel="stylesheet" type="text/css" href="tipuesearch/css/tipuesearch.css">
    <script type="text/javascript" src="tipuesearch/tipuesearch.min.js"></script>

    <?php header('Content-Type: text/html; charset=UTF-8'); ?>


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




        <script>
            
            function limpiarDiv() {
                $("#productos").empty();
            }

            $(document).ready(function() {
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






            function cargaProductos() {
                document.getElementById("tabla").style.display = 'block';
                document.getElementById("cargar1").style.display = 'block';
                var libre = $("#tipue_search_input").val();



                $("#productos").load("busquedaCatalogo.php?libre=" + encodeURIComponent(libre) + "&fMarcas='0'", function() {});
                setTimeout('limpiar()', 9000);






            }

        </script>

        <script type="text/javascript">
            function DoNav(theUrl) {
                //document.location.href = theUrl;
                window.open(theUrl, 'newwindow');
            }

        </script>
        <?php include 'scriptsTop.php';?>

</head>

<body>
    <?php include 'menu.php';?>



    <!-- head -->




    <!-- body -->
   <div class="container main-container headerOffset">
<div class="row innerPage">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="row userInfo">
<div class="col-xs-12 col-sm-12">
   <div class="row row-centered">



<div class="block " style="padding-top: 31px;">

<form action="buscar.php" class="centrar">
<div class="tipue_search_left"><img src="tipuesearch/search.png" class="tipue_search_icon"></div>
<div class="tipue_search_right"><input type="text" name="q" id="tipue_search_input" pattern=".{3,}" title="At least 3 characters" required></div>
<div style="clear: both;"></div>
</form>
<div id="tipue_search_content"></div>



    </div>
           </div></div></div></div></div></div> 


            <div class="col-md-8 col-sm-12 col-xs-8 col-centered text-center centro">

                <div id="nuevos-productos" class="carousel slide " data-ride="carousel">


                    <!-- Wrapper for slides -->

                </div>
            </div>
            <div class="container">
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
            <div class="modal fade" id="productSetailsModalAjax" tabindex="-1" role="dialog" aria-labelledby="productSetailsModalAjaxLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>

                </div>

            </div>
            <input type="button" onClick="javascript:cargaProductos('siguiente')" value="siguiente" class="btn bg-gray busqueda" />
            <div id="cargar1" style="display:none;">
                <div id="preloader1">
                    <div class="loader1">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row userInfo">
                            <div class="col-xs-12 col-sm-12">
                                <div class="row row-centered">



                                    <div class="block " style="padding-top: 31px;">

                                        <form action="buscar.php" class="centrar">
                                            <div class="tipue_search_left"><img src="tipuesearch/search.png" class="tipue_search_icon"></div>
                                            <div class="tipue_search_right"><input type="text" name="q" id="tipue_search_input" pattern=".{3,}" title="At least 3 characters" required></div>
                                            <div style="clear: both;"></div>
                                        </form>
                                        <div id="tipue_search_content"></div>



                                    </div>










                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#tipue_search_input').tipuesearch();
                });

            </script>

            <div style="margin-top:50px"></div>
    
    <div id="cargar1" style="display:none;"> <div id="preloader1">
 <div class="loader1">
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
</div>
</div></div>
    
            <?php include 'footer.php';?>

</body>


<script type="text/javascript">
    var verifyCallback = function(response) {
      
    };


    var widgetId1;
    var widgetId2;
    var onloadCallback = function() {

        widgetId1 = grecaptcha.render('menuSesion', {
            'sitekey': '6LdWgxIUAAAAAOvoBwCHB2O-PQOj8V3bOuUaIcdx',
            'theme': 'light'
        });
        widgetId2 = grecaptcha.render('enviarContactoCaptcha', {
            'sitekey': '6LdWgxIUAAAAAOvoBwCHB2O-PQOj8V3bOuUaIcdx',
            'callback': verifyCallback,
            'theme': 'light'
        });

    };

</script>


<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>


</script>
<script>
    $(document).ready(function() {
        var lapagina = "1";

        function getLoadingElement() {
            var div = document.createElement('div');
            div.setAttribute('class', 'loading-element');


            div.innerHTML = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-50-50 100 100" height="100" width="100"><defs><linearGradient id="g" x1="0" x2="1" y1="0" y2="0"><stop offset="0%" stop-color="#fff"/><stop offset="0%" stop-color="#0096D8"/><stop offset="100%" stop-color="#0096D8"/></linearGradient></defs><circle transform="rotate(0)" cx="0" cy="0" r="50" fill="url(#g)"></circle></svg>';



            div.stop = function() {
                console.log('stop');
                div.setAttribute('style', 'height:0px;')
            }

            div.start = function() {
                console.log('start');
                div.setAttribute('style', 'height:100px;')
            }

            var stops = div.querySelectorAll('stop');
            var grad = div.querySelector('#g');
            var circ = div.querySelector('circle');
            var colors = [stops[0].getAttribute('stop-color'), stops[1].getAttribute('stop-color')];

            function step(t) {
                var oldStop = parseInt(stops[0].getAttribute('offset'));
                var newStop = (Math.floor(t) % 500) / 5;
                var rotation;
                if (oldStop > newStop) {
                    rotation = parseInt(circ.getAttribute('transform').replace(/[^\d]/g, '')) || 0;
                    rotation = (rotation + 90) % 360;
                    circ.setAttribute('transform', 'rotate(' + rotation + ')');
                    colors.reverse();
                    stops[0].setAttribute('stop-color', colors[0]);
                    stops[1].setAttribute('stop-color', colors[1]);
                    stops[2].setAttribute('stop-color', colors[1]);
                }
                stops[0].setAttribute('offset', newStop + '%');
                stops[1].setAttribute('offset', newStop + '%');
                window.requestAnimationFrame(step);
            }

            window.requestAnimationFrame(step);

            div.start();
            return div;
        }

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
                url: "assets/procesar-municipios.php",
                data: {
                    municipios: estado
                }
            }).done(function(data) {
                $("#jmr_contacto_municipio").html(data);
            });
        });








        $('li.logeo').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(200);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(200);
        });

        $(".hvr-grow-shadow").hover(function() {
            $(this).children().css("opacity", "0");
        }, function() {
            $(this).children().css("opacity", "1");
        });

        $(".search-trigger").click(function(e) {
            $(".search-overly-mask").toggleClass('search-overly-mask close').toggleClass('search-overly-mask open');

        });
        $(".search-close").click(function(e) {
            $(".search-overly-mask").toggleClass('search-overly-mask close').toggleClass('search-overly-mask open');

        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function() {

        cargaProductos();

        $(".accesoMe").hide();
        $(".melogin").show();

        $('.melogin').hover(function() {
            $(".accesoMe").slideToggle();
        });
        document.querySelector("video").play();
    });

</script>


<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-97229195-1', 'auto');
    ga('send', 'pageview');

</script>


</html>
