<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<html lang="es">
       
<head>
 
    
    
       <?php include 'menu.php';?>
       <?php include 'scriptsTop.php';?>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
       
       <script language="javascript">
		
		$(document).ready(function() {
    $().ajaxStart(function() {
        $('#loading').show();
        $('#aviso').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#aviso').fadeIn('slow');
    });
    $('#form, #fat, #form').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
				  $('#aviso').addClass("showA style5");
                $('#aviso').html(data);
 
            }
        })
        
        return false;
    }); 
})  
		
		</script>
        
        
    
        <!--[if IE 6]>
            <link rel="stylesheet" href="loginie6.css" type="text/css" media="all" />
        <![endif]-->
        <![if !(IE 6)]>
    <link rel="stylesheet" href="login.css" type="text/css" media="all" />
        <![endif]>
        <title>.:: Bienvenido a me ::.</title>
</head>
    <body>
        
        
        
        
        
        
        
         <div class="container main-container headerOffset">
        <div class="row innerPage">
             
            <div class="col-md-4 col-md-offset-4">
                <div class="row userInfo">
                    <div class="col-xs-12 col-sm-12">


                        <div id="tabla" class="center">
        <form action="renovar_pwdNuevo.php" method="post" id="form" name="form">
            <table>
             <tr>
                   
                   
                   
              </tr>
                <tr>
                    
                    
                                                    <div class="col-sm-12">
                                    <span class="input input--chisato">
					<input class="input__field input__field--chisato" type="text"  id="fUsuario" name="fUsuario" />
					<label class="input__label input__label--chisato" for="fUsuario">
						<span class="input__label-content input__label-content--chisato" data-content="Usuario">Usuario</span>
                                    </label>
                                    </span>
                                </div>
                    
                    
                    
                
                </tr>
                <tr>
                    
                    
                     <div class="col-sm-12">
                                    <span class="input input--chisato">
					<input class="input__field input__field--chisato" type="text"  id="fCorreo" name="fCorreo" />
					<label class="input__label input__label--chisato" for="fCorreo">
						<span class="input__label-content input__label-content--chisato" data-content="Correo">Correo</span>
                                    </label>
                                    </span>
                                </div>
                    
                    
                    
                  
                </tr>
              
                    
                        <input type="submit" class="btn  btn-block btn-lg btn-primary" id="entrar" name="Renovar" value=" Renovar "/>
                   
                    
               
            </table>
            <input type="hidden" class="btn  btn-block btn-lg btn-primary"  name="fmtipo" id="fmtipo" value="cliente"/>
             </form></div></div></div></div></div>
        <div id="aviso"></div>

    </div>
    <div class="left">
      <table width="100" border="0" cellpadding="0" cellspacing="0">
      <tr>
  
          </tr>
        </table>
    </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
             <div style="margin-top:50px"></div>
    <?php include 'footer.php';?>

      <?php include 'scripts.php';?>
</body>
</html>