<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<html lang="es">

<head>
 
    
    
    
       <?php include 'scriptsTop.php';?>

</head>

<body>
    <?php include 'menu.php';?>




    <div class="container main-container headerOffset">
        <div class="row innerPage">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row userInfo">
                    <div class="col-xs-12 col-sm-12">
                        <h1 class="title-big text-center section-title-style2">
                            <span> Contáctanos </span>
                        </h1>
                        <p class="lead text-center">
                           Para nosotros es un placer atenderte. Por eso, te ofrecemos diferentes medios para responder a cada una de tus solicitudes de la manera que más te convenga.

                        </p>
                        <hr>
                        <div class="row">
                           <form action="form.php">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">






                                <div class="col-sm-6">
                                    <span class="input input--chisato">
					<input class="input__field input__field--chisato" type="text" id="input-13" name="nombre" />
					<label class="input__label input__label--chisato" for="input-13">
						<span class="input__label-content input__label-content--chisato" data-content="Nombre">Nombre</span>
                                    </label>
                                    </span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="input input--chisato">
					<input class="input__field input__field--chisato" type="text" id="input-14" name="apellido"/>
					<label class="input__label input__label--chisato" for="input-14">
						<span class="input__label-content input__label-content--chisato" data-content="Apellido">Apellido</span>
                                    </label>
                                    </span>

                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="col-sm-4">
                                    <span class="input input--chisato">
					<input class="input__field input__field--chisato" type="text" id="input-15" name="telefono" />
					<label class="input__label input__label--chisato" for="input-15">
						<span class="input__label-content input__label-content--chisato" data-content="Teléfono">Teléfono</span>
                                    </label>
                                    </span>
                                </div>
                                <div class="col-sm-4">
                                    <span class="input input--chisato">
					<input class="input__field input__field--chisato" type="text" name="email" id="input-15" />
					<label class="input__label input__label--chisato" for="input-15">
						<span class="input__label-content input__label-content--chisato" data-content="Correo Electronico">Correo Electronico</span>
                                    </label>
                                    </span>
                                </div>
                                <div class="col-sm-4">
                                    <span class="input input--chisato">
					<input class="input__field input__field--chisato" type="text" id="input-15" name="compania" />
					<label class="input__label input__label--chisato" for="input-15">
						<span class="input__label-content input__label-content--chisato" data-content="Compañia">Compañia</span>
                                    </label>
                                    </span>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                <div class="col-sm-4">
                                    <span class="input input--chisato">
      <select id="jmr_contacto_estado" class="form-control" name="estado"><option>Selecciona tu estado</option></select>
        </span>
                                </div>



                                <div class="col-sm-4">
                                    <span class="input input--chisato">
<select id="jmr_contacto_municipio" class="form-control" name="ciudad"><option>Selecciona tu municipio</option></select>
</span>

                                </div>
                            </div>


                            <div class="col-md-12">
                                <span class="input__label-content input__label-content--chisato text-center">MENSAJE</span>
                                <textarea class="form-control" id="textarea" name="comment"></textarea>

                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="centrar2">
                                   
                                   
        <div id="enviarContactoCaptcha"></div>
      </div>   


                            </div>
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div  style="  width: 128px;
        display: block;
        margin: 0 auto;
        margin-top: 50px;" >
                                    
                                  
                                    
                                    <input class="btn bg-gray"type="submit" value="Enviar">
                                 </div>

                            </div>
                           </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        
     <div style="margin-top:50px"></div>
    <?php include 'footer.php';?>

      <?php include 'scripts.php';?>
  
    
    </body>
 
        

 
    
    
    
    
    
    
   


</html>
