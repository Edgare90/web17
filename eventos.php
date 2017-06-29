<?php
$_SERVER['HTTPS'];
include_once("conexion.php");
date_default_timezone_set('America/Mexico_City');
$hoy= date('Y-m-d');
    ?>




    <div class="container main-container event">

        <div class="morePost row featuredPostContainer style2 globalPaddingTop ">

            <h3 class="section-title style2 text-center"><span>EVENTOS</span></h3>
            <div class="container">
                <div class="row xsResponse categoryProduct">


                    <?php 
					
				$sel = mysql_query("SELECT * FROM reserv_eventos WHERE f_evento>'$hoy' AND tipo_evento!='Capacitacion a Ventas' AND autorizacion='si' ORDER BY f_evento LIMIT 12");
				if ( $sel !== false && mysql_num_rows($sel) > 0 ) {
					?>

                    <div id="prox">
                        <section class="eventosCarrusel slider">
                        <?php
                            while($s = mysql_fetch_assoc($sel)) {
                                $m = $s['mes'];
                                if($m == '01') {
                                    $mes = 'Ene';
                                }
                                if($m == '02') {
                                    $mes = 'Feb';
                                }
                                if($m == '03') {
                                    $mes = 'Mar';
                                }
                                if($m == '04') {
                                    $mes = 'Abr';
                                }
                                if($m == '05') {
                                    $mes = 'May';
                                }
                                if($m == '06') {
                                    $mes = 'Jun';
                                }
                                if($m == '07') {
                                    $mes = 'Jul';
                                }
                                if($m == '08') {
                                    $mes = 'Ago';
                                }
                                if($m == '09') {
                                    $mes = 'Sep';
                                }
                                if($m == '10') {
                                    $mes = 'Oct';
                                }
                                if($m == '11') {
                                    $mes = 'Nov';
                                }
                                if($m == '12') {
                                    $mes = 'Dic';
                                }
                                ?>
                            <div class="item eventos col-lg-3 col-md-3 col-sm-6 col-xs-12">

                                <h3>
                                    <?php echo $s['dia'].' '.$mes ?><br></h3><span><?php echo $s['sucursal']; ?></span>
                                <h2>
                                    <?php echo $s['marca']; ?>
                                </h2>
                                <h4><span><?php echo $s['tipo_evento']; ?></span></h4>
                                <a href="<?php echo $s['liga']; ?>"> <input type="button" onclick="location.href='todoseventos.php'" style=" " class="btnEventos  bg-gray" value="VER MÁS "></a>
                            </div>
                            <?php
                            }
                        ?>

                                <?php
				} else {
					?>
                                    <p>Por el momento no hay eventos disponibles. </p>
                                    <?php
				}
				?>
                         </section><div class="item eventos col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="action-control">
                                            <div class="button-wrapper">
                                               <input type=button onclick="location.href='todoseventos.php'" style=" margin: 54px auto;    display: block;  margin-top: 20px;" class="btn  bg-gray" value='VER MÁS EVENTOS'> </div>
                                        </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>


