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
            <div class="col-md-4 col-md-offset-4">
                <div class="row userInfo">
                    <div class="col-xs-12 col-sm-12">


                        <div id="tabla" class="center">
                              <div class="col-sm-12" >
                                  <img src="images/mePrincipal.png" style="    margin: 41px auto;
    display: block;">
                            </div>
                           <div class="modal-body">
         <form   method="post" target="ventana" action="https://www.grupocva.com/me_bpm/logincontrol.php" onSubmit="return check();">
        <div class="form-group login-username">
          <div>
            <input name="fUsuario" id="login-user" class="form-control input" size="20" placeholder="Usuario" type="text">
          </div>
        </div>
        <div class="form-group login-password">
          <div>
            <input name="fContrasenia" id="login-password" class="form-control input" size="20" placeholder="Contraseña" type="password">
          </div>
        </div>
     
        <div>
          <div>
            
              <input name="submit"  disabled id="eenviarME" class="btn  btn-block btn-lg btn-primary" value="Iniciar sesión" type="submit" >
          </div>
        </div>
          </form>
          
          
          
      </div>
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
