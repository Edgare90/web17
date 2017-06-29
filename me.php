<script>
function check()
{
	if(document.me_e.fUsuario.value=='' || document.me_e.fContrasenia.value=='')
	{
	return false;
    }
	else
	{
	window.open('', 'ventana');
	return limpiar();
	return true;
	}
}
</script>
                <div id="me">
                    <div id="btn_me">
                        <span>INGRESO </span>
                        <img src="images/me.png" border="0" />
                    </div>
                	<form class="me_form" style="margin:0px;" name="me_e" id="me_e" method="post" target="ventana" action="https://www.grupocva.com/me_bpm/logincontrol.php" onSubmit="return check();">
                    	<label>USUARIO</label><br/>
                        <input type="text" name="fUsuario" id="fUsuario" class="log" style="padding-left:10px;" />
                        <br/><br/>
                        <label>CONTRASE&Ntilde;A</label>
                        <input type="password" name="fContrasenia" id="fContrasenia" class="log"  style="padding-left:10px;"/>
                        <input name="fmtipo" type="hidden" id="fmtipo" size="10" value="contacto">
                        
                   		<table cellpadding="0" >
                     		<tr>
                            	<td>
                                	<input type="submit" id="ingresar" value="INGRESAR" style="cursor:pointer;" /> <br/>
                                    <div id="olvidaste"> <a href="javascript:void(window.open('/me_bpm/renovar_pwd_b.php','_blank','fullscreen,scrollbars,toolbar,menubar'))" >contrase&ntilde;a<br/><span>olvidada?</span> </a></div>
                                </td>
                      			<td> <img src="images/shop.png" width="50" border="0" /> </td>
                           	</tr>
                      	</table>
                    </form>
                </div> 
                
               