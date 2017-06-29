 
<div id="search-overly" class="search-overly-mask close">
<a class=" search-close search-overly-close-trigger "> <i class=" fa fa-times-circle"> </i> </a>
<div class="container">
<form class="form-horizontal">
<fieldset>
 
 
<div class="control-group">


</div>
</fieldset>
</form>
</div>
</div>
<div class="modal signUpContent  fade" id="ModalLogin" tabindex="-1" role="dialog">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
          <a href="login.php">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
        <img  src="images/logo-me.png" style="    height: 55px;    margin: 0 auto;    display: block;    padding: 10px;" alt="CVA"></a> </div>
      <div class="modal-body">
        <div class="form-group login-username">
          <div>
            <input name="log" id="login-user" class="form-control input" size="20" placeholder="Usuario" type="text">
          </div>
        </div>
        <div class="form-group login-password">
          <div>
            <input name="Password" id="login-password" class="form-control input" size="20" placeholder="Contraseña" type="password">
          </div>
        </div>
        <div class="form-group">
          <div> </div>
        </div>
        <div>
          <div>
            <input name="submit" class="btn  btn-block btn-lg btn-primary" value="Iniciar sesión" type="submit">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <p class="text-center"> <a href="forgot-password.html"> perdiste tu contraseña? </a></p>
      </div>
    </div>
  </div>
</div>
<div class="modal signUpContent  fade" id="ModalSignup" tabindex="-1" role="dialog">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
        <img  src="images/logo-me.png" style="    height: 55px;
    margin: 0 auto;
    display: block;
    padding: 10px;" alt="CVA"> </div>
      <div class="modal-body">
        <div >
          <div class="row alta registro ">
          
          <div style="height:35px"></div>
            <a href="http://cva.com.mx/formasElectronicas/distribuidor/altaDistribuidor.php" ><div class=" col-xs-12  col-md-6 dateDeAlta" > <h3>Date de alta como</h3><h1> distribuidor</h1> </div></a>
              <a href="contacto.php" ><div class="col-xs-12  col-md-6 dateDeAlta" > <h3>Date de alta como</h3><h1> proveedor</h1> </div></a>
           
          </div>
        </div>
         <div class="modal-footer">
       
        </div>
      </div>
    </div>
  </div>
</div>
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
  <div class="navbar-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8 col-xs-12 col-md-8 col-centered no-margin no-padding" >
          <ul class="userMenu">
            <li>
            <a href="login.php">
              <div class="logome"> <img  src="images/logo-me.png" style="height: 22px;         margin-top: 3px;  position: relative;" alt="CVA"></div></a>
             </li>
          
           <li class="dropdown logeo megamenu-fullwidth ajuste"><a href="#" class=" hvr-icon-wobble-horizontal" >Iniciar Sesión</a>
          <ul class="dropdown-menu" style="max-width: 427px;">
           
              
              
              
              
  
    <div class="modal-content" >
      <div class="modal-header">
       <a href="login.php">
        <img  src="images/logo-me.png" style="    height: 55px;
    margin: 0 auto;
    display: block;
    padding: 10px;     " alt="CVA"> </a></div>
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
           
              <input name="submit" id="eenviarME" class="btn  btn-block btn-lg btn-primary" value="Iniciar sesión" type="submit" >
          </div>
        </div>
          </form>
          
          
          
      </div>
       
      <div class="modal-footer">
        <p class="text-center"> <a href="renovar_pwd_bNuevo.php"> ¿perdiste tu contraseña? </a></p>
      </div>
    </div>


              
              
              
              
              
              
          </ul>
        </li>
          
          
          
            <li> <a href="#" class="hvr-icon-float-away hidden-xs ajuste" data-toggle="modal" data-target="#ModalSignup"> Date de Alta</a> </li>
          
			
		
       
          </ul>
        </div>
      <div class="col-lg-3   col-md-3 hidden-xs col-centered no-margin no-padding" style="margin-top: 3px !important;     position: absolute;"> <ul class="userMenu">
          <li> 
              
             

              
                 <form action="buscar.php">
                     <input type="text" name="q" style="height: 21px; padding:0px;     width: 85% !important;    margin-top: 2px; font-size:12px;"  /><button type="submit"><i class="fa fa-search" style="font-size:18px;     color: #fff;   margin-left: 5px;"></i></button> </form>  </li>
          
          
          
          
          
          </ul>
      </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span></button>
      <a  href="index.php" class="navbar-brand "> <img src="images/logo.png" alt="CVA" > </a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <!--Soluciones-->
        <li class="visible-xs"><a href="buscar.php">BUSCAR</a></li> 
        <li><a href="acercade.php"> NOSOTROS</a></li>
         
        <li class="dropdown megamenu-80width"><a data-toggle="dropdown" class="dropdown-toggle" href="#"> SOLUCIONES <b class="caret"> </b> </a>
          <ul  class="dropdown-menu">
            <li class="megamenu-content ProductDetailsList">
              <ul id="menuSoluciones1" class="col-lg-6  col-sm-6 col-md-6 unstyled">
               
              
              </ul>
              <ul id="menuSoluciones2" class="col-lg-6  col-sm-6 col-md-6 unstyled">
              
              
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="catalogo.php"> CATÁLOGO </a></li>
        
        <li><a href="sucursales.php"> SUCURSALES </a></li>
        <li><a href="marca.php"> MARCAS </a></li>
        <li class="dropdown megamenu-fullwidth"><a data-toggle="dropdown" class="dropdown-toggle" href="#"> PROMOCIONES <b class="caret"> </b> </a>
          <ul class="dropdown-menu">
            <li class="megamenu-content ">
              <ul class="col-lg-3  col-sm-3 col-md-3 unstyled noMarginLeft newCollectionUl">
                <li class="no-border">
                  <p class="promo-1"><strong> PROMOCIONES </strong></p>
                </li>
                <li><a href="category.html"> PROMOCIÓN DEL DÍA </a></li>
                <li><a href="category.html"> PROMOCIÓN DEL MES </a></li>

              </ul>
              <ul class="col-lg-3  col-sm-3 col-md-3  col-xs-4">
                <li> <a class="newProductMenuBlock" href="WDGreen_SSD_PowerPage.php"> <img class="img-responsive" src="images/site/promo1.jpg" alt="product"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> WD GREEN </span> </a> </li>
              </ul>
              <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                <li> <a class="newProductMenuBlock" href="product-details.html"> <img class="img-responsive" src="images/site/promo2.jpg" alt="product"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> ASUS </span> </a> </li>
              </ul>
              <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                <li> <a class="newProductMenuBlock" href="product-details.html"> <img class="img-responsive" src="images/site/promo3.jpg" alt="product"> <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> HUAWEI </span> </a> </li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="contacto.php"> CONTACTO </a></li>
        <li><a style="margin-top:5px; text-align:center" href="bolsa.php"> BOLSA DE <br /> TRABAJO </a></li>
          
      
      </ul>
      <div class="nav navbar-nav  hidden-xs"> </div>
    </div>
  </div>
  <div class="arribamem hidden-xs"><img src="images/mem.png" /></div>
  
</div>


































                        

<script> 
      var elCambio=true;
</script>

                   





                        <?php
                        
                      
                        
					    function ConectaSiil2($UserName2,$Passwd2) {
                        $DataBase2 =
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
                      
                        if ($Conn2=oci_pconnect($UserName2, $Passwd2, $DataBase2,"WE8ISO8859P1"))
                            return $Conn2;
                        } 
						
							if ($Conn2=ConectaSiil2("WEB_USER_PUBLICO","W8q5/fBv")) {
								 $SentenciaSoluciones2="select 
								cvc.vcl_id vcl_id, vcl_desc sol_desc, vcl_clave sol_clave
								from 
								CAT_VALOR_CLASIFICACION cvc
								where cla_id=2721
								and vcl_estado='AC'
								order by vcl_desc";	
								
								$SentenciaAnalizadaSoluciones2=ociparse($Conn2,$SentenciaSoluciones2);
										ociexecute($SentenciaAnalizadaSoluciones2);	
																	
								} else {
									echo "El servicio no se encuentra disponible. Por favor intentalo mas tarde";
								}
								
								while (ocifetch($SentenciaAnalizadaSoluciones2)) {
									
									$solClave2 = ociresult($SentenciaAnalizadaSoluciones2,"SOL_CLAVE");
						?>




                            

                        
                         <script type="text/javascript">  
              
                               var node = document.createElement("li"); 
                           
                             
                             
                      var elLink = document.createElement('a');
        var nodoText = document.createTextNode( ' <?php echo utf8_encode(ociresult($SentenciaAnalizadaSoluciones2,"SOL_DESC")); ?>');
       elLink.setAttribute('href', "catalogo.php?fSolucionM=<?php echo $solClave2; ?>&fMarca=TODO");
       elLink.appendChild(nodoText);        
                  

                              node.appendChild( elLink);   
                      
                             if(elCambio==true){
                                 elCambio=false;
                                  document.getElementById("menuSoluciones1").appendChild(node);
                             }else{
                                  elCambio=true;
                                  document.getElementById("menuSoluciones2").appendChild(node);
                             }
 
                          
            </script>






                        
                            <!--[if lte IE 6]></td></tr></table></a><![endif]-->

                            <?php } ?>






            
       