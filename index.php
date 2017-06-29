<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<html lang="es">
<head>
    
 <style type="text/css">
body {
    overflow: hidden;
}
/* preloader */
#preloader {
    position: fixed;
    top:0; left:0;
    right:0; bottom:0;
    background: rgba(0, 0, 0, 0.63);
    z-index: 1000000;
}
.loader {
  position: absolute;
  top: 50%;
  left: 40%;
  margin-left: 10%;
  transform: translate3d(-50%, -50%, 0);
}
.dot {
  width: 24px;
  height: 24px;
  background: #3ac;
  border-radius: 100%;
  display: inline-block;
  animation: slide 1s infinite;
}
.dot:nth-child(1) {
  animation-delay: 0.1s;
  background: #000000;
}
.dot:nth-child(2) {
  animation-delay: 0.2s;
  background: #003444;
}
.dot:nth-child(3) {
  animation-delay: 0.3s;
  background: #006C8D;
}
.dot:nth-child(4) {
  animation-delay: 0.4s;
  background: #0096C4;
}
.dot:nth-child(5) {
  animation-delay: 0.5s;
  background: #00C3FF;
}
@-moz-keyframes slide {
  0% {
    transform: scale(1);
  }
  50% {
    opacity: 0.3;
    transform: scale(2);
  }
  100% {
    transform: scale(1);
  }
}
@-webkit-keyframes slide {
  0% {
    transform: scale(1);
  }
  50% {
    opacity: 0.3;
    transform: scale(2);
  }
  100% {
    transform: scale(1);
  }
}
@-o-keyframes slide {
  0% {
    transform: scale(1);
  }
  50% {
    opacity: 0.3;
    transform: scale(2);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes slide {
  0% {
    transform: scale(1);
  }
  50% {
    opacity: 0.3;
    transform: scale(2);
  }
  100% {
    transform: scale(1);
  }
}
     
</style>   
    
    
    
    <style class="cp-pen-styles">


.accordion {
  width: 100%;
  max-width:100%;
  height:  260px;
  overflow: hidden;
  margin: 50px auto;
}

.accordion ul {
  width: 100%;
  display: table;
  table-layout: fixed;
  margin: 0;
  padding: 0;
}

.accordion ul li {
  display: table-cell;
  vertical-align: bottom;
  position: relative;
  width: 16.666%;
  height:  260px;
background-repeat: repeat;
  background-position: center center;
  transition: all 500ms ease;
}

.accordion ul li div {
  display: block;
  overflow: hidden;
  width: 100%;
}
        
.accordion ul li .logoAcceso{
    max-width: 115px;
    display: block;
    vertical-align: middle;
 
    width: 50%;
    height: 50%;

    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
   bottom: 0;
    right: 0;
}
        
        .accordion ul li .logoAcceso img {
        width: 115px;
    overflow: auto;
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
}
.accordion ul li div a {
    border-style: solid;
    border-width: 4px;
  display: block;
  height:  260px;
  width: 100%;
  position: relative;
  z-index: 3;
  vertical-align: bottom;
  padding: 15px 20px;
  box-sizing: border-box;
  color: #fff;
  text-decoration: none;
  font-family: Open Sans, sans-serif;
  transition: all 200ms ease;
}

.accordion ul li div a * {
  opacity: 0;
  margin: 0;
  width: 100%;
  text-overflow: ellipsis;
  position: relative;
  z-index: 5;
  white-space: nowrap;
  overflow: hidden;
  -webkit-transform: translateX(-20px);
  transform: translateX(-20px);
  -webkit-transition: all 400ms ease;
  transition: all 400ms ease;
}

.accordion ul li div a h2 {
  font-family: Montserrat, sans-serif;
  text-overflow: clip;
  font-size: 24px;
  text-transform: uppercase;
  margin-bottom: 2px;
  top: 132px;
}

.accordion ul li div a p {
  top: 132px;
  font-size: 13.5px;
}

.accordion ul li:nth-child(1) { background-image: url("images/botones/me.jpg"); }

.accordion ul li:nth-child(2) { background-image: url("images/botones/catalogo.jpg"); }

.accordion ul li:nth-child(3) { background-image: url("images/botones/soluciones.jpg"); }

.accordion ul li:nth-child(4) { background-image: 
        url("images/botones/ecommerce.jpg"); }

.accordion ul li:nth-child(5) { background-image: url("images/botones/financiamiento.jpg"); }

.accordion ul:hover li { width: 8%;     background-repeat: repeat; }

.accordion ul:hover li:hover {       max-width: 350px;
    width: 16%; }

.accordion ul:hover li:hover a {     background: rgba(13, 179, 73, 0.4); }

.accordion ul:hover li:hover a * {
  opacity: 1;
  -webkit-transform: translateX(0);
  transform: translateX(0);
}
 @media screen and (max-width: 600px) {

body { margin: 0; }

.accordion { height: auto; }

.accordion ul li,
.accordion ul li:hover,
.accordion ul:hover li,
.accordion ul:hover li:hover {
  position: relative;
  display: table;
  table-layout: fixed;
  width: 100%;
  -webkit-transition: none;
  transition: none;
}
   
</style>
<link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
    


    <title>CVA - Comercializadora de Valor Agregado</title>

    <?php include 'scriptsTop.php';?>

</head>

    <body>
        
        <div id="preloader">
 <div class="loader">
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
</div>
</div>

 <?php include 'menu.php';?>
        
     <div class="mp-pusher" id="mp-pusher">
            <?php include 'solucion.php';?>

           

            <?php include 'baner.php';?>


            
         
       

<div class="accordion">
  <ul>
    <li>
      <div>
          <div class="logoAcceso">
              <img  src="images/logo-me.png"></div>
          <a href="login.php">          
        <h2>ME</h2>
        <p>Ingresa A Nuestro Portal y realiza tus pedidos</p>
        </a> </div>
    </li>
    <li>
      <div> 
           <div class="logoAcceso">
              <img  src="images/catalogo.png"></div>
          <a href="catalogo.php">
        <h2>Catálogo</h2>
        <p>Conoce la extensa oferta de marcas y productos que tenemos para ti</p>
        </a> </div>
    </li>
   
    <li>
      <div> 
           <div class="logoAcceso">
              <img  src="images/cvaSoluciones.png"></div>
          <a target="_blank" href="http://www.grupocva.com/mkt/form_creditos/necesidades_soluciones.php">
        <h2>CVA Soluciones</h2>
        <p>Recibe respaldo y asesoría para el desarrollo de tus proyectos</p>
        </a> </div>
    </li>
    <li>
      <div>
          <div class="logoAcceso">
              <img  src="images/e-commerce.png"></div>
          <a href="http://grupocva.com/mkt/imagenes/2017/05/e-commerce.jpg">
        <h2>E-Commerce</h2>
        <p>Conecta tu página con nuestro WEB SERVICE</p>
        </a> </div>
    </li>
    <li>
      <div> 
          <div class="logoAcceso">
              <img  src="images/financieros.png"></div>
          <a target="_blank" href="http://www.grupocva.com/mkt/form_creditos/necesidades_servicios.php">
        <h2>Servicios Financieros</h2>
        <p>Herramientas de financiamiento y crédito a tu servicio</p>
        </a> </div>
    </li>
  </ul>
</div>
         
         
         
         


          
            </div>
         
         
             <div class="parallax-section parallax-image-1 socios">
                <div class="container">
                    <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="parallax-content clearfix">
                                <h1 class="parallaxPrce"> </h1>
                               <br/><br/>
                                <h2>Sé parte de nuestra red de distribuidores y obtén los beneficios que CVA tiene para tí</h2>
                                <BR/>

                                <div style="clear:both"></div>
                                 <a target="_blank" href="https://www.grupocva.com/formasElectronicas/distribuidor/altaDistribuidor.php"><button class="btn  bg-gray" type="button"> Iniciar </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php include 'recomendaciones.php';?>

            <div class="container sitios">
                <div class="ghia col-xs-12  col-md-6  col-sm-6  ">

                    <a target="_blank" href="http://ghia.com.mx/page/index.php"><button class=" ghia hvr-grow-shadow hvr-radial-in" type="button"> <div style="esconder1"> <img src="images/ghialogo.png"><br>Tecnología para todos</div></button></a>

                </div>

                <div class="ghia col-xs-12  col-md-6  col-sm-6  ">


                   <a target="_blank" href="http://www.grupocva.com/mkt/form_creditos/necesidades_servicios.php"><button class="hvr-grow-shadow haier hvr-radial-in2" type="button"> <div style="esconder1"><img src="images/serviciosfinancieros.png"></div></button></a> 

                </div>

            </div>

            <div class="parallax-section parallax-image-1 banner1">
                <div id="particles-js" class=" hidden-xs">
                </div>

                <div class="container">
                    <div class="row ">
                        <div class="col-xs-12 promo">
                            <div class="item eventos col-lg-6 col-md-7 col-sm-12 ">
                                <div class="texto">
                                    <h4>Desarrollamos proyectos de cualquier dimensión con apoyo de personal especializado generando mayor negocio a nuestros partners</h4>

                                </div>
                            </div>

                            <div class="item eventos col-lg-3 col-md-3 col-sm-12 ">
                                <img class="lazy" data-src="images/banner/logoSoluciones.png">
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom: 36px;     z-index: 10000;">
                            <a target="_blank" href="mkt/form_creditos/necesidades_soluciones.php"><button class="btn  bg-gray" type="button"> Solicitar Información <i class="fa fa-long-arrow-right"> </i></button></a>
                        </div>
                    </div>

                </div>

            </div>


            <?php include 'eventos.php';?>

            <?php include 'solucionesBotones.php';?>
            

            <?php include 'nuevosProductos.php';?>

            <?php include 'banners.php';?>
        <?php include 'marcas.php';?>

    
            <div class="parallax-section parallax-image-1 madrid">
                <div class="container">
                    <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="parallax-content clearfix">
                                <h1 class="parallaxPrce"> </h1>
                                <img class="lazy" data-src="images/madrid2017CVA.png"> <img class="lazy" data-src="images/volemosjuntos.png"><br/><br/>
                                <h2 class="uppercase">TODAS TUS COMPRAS PARTICIPAN</h2>
                                <BR/>

                                <div style="clear:both"></div>
                                <a href="http://www.grupocva.com/mkt/convencion2017/index.html" class="btn btn-discover "> MÁS INFORMACIÓN </a>
                            </div>
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

            <?php include 'footer.php';?>

            <?php include 'popup.php';?>


        </div>



        <?php include 'scripts.php';?>

    </body>


</html>
