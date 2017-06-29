 <?php
   include_once("conecta_bpm.php");
        
		$usuario=$_POST["fUsuario"];
		$correo=$_POST["fCorreo"];
		
		$usuario=str_replace(" ","",$usuario);
		$correo=str_replace(" ","",$correo);
		
		         $user = "WEB_USER_PUBLICO";
                $pwd = "W8q5/fBv";
            
            $con=ConectaSiil($user,$pwd);
				 $SentenciaUsuario="
					select usuario, cont_email, cte_fis_email, pp.tipo
					from permisos_pwd pp, 
					bpm_demo.cat_contactos cc,
					bpm_demo.cat_cliente ccte
					where pp.idcontacto=cc.CONT_ID
					and pp.idcliente=ccte.cte_id
					and pp.usuario='$usuario'";
				$SentenciaAnalizadaUsuario=ociparse($con,$SentenciaUsuario);
                ociexecute($SentenciaAnalizadaUsuario);
                ocifetch($SentenciaAnalizadaUsuario);
				
				$ConsUsuario= ociresult($SentenciaAnalizadaUsuario,"USUARIO");
				$ConsEmailCon= ociresult($SentenciaAnalizadaUsuario,"CONT_EMAIL");
				$ConsEmailCte= ociresult($SentenciaAnalizadaUsuario,"CTE_FIS_EMAIL");
				$ConsTipo= ociresult($SentenciaAnalizadaUsuario,"TIPO");
				
				if($ConsUsuario)
				{
					if($ConsTipo==1 && $correo==$ConsEmailCte)
					{
						$chars = "abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i < 12)
        {
            $num = rand() % 61;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        
		    $select = "select count(*) total from permisos_pwd where usuario = '$usuario'";
			$SenetenciaAnalizadaSelect=ociparse($con,$select);
             ociexecute($SenetenciaAnalizadaSelect);
		     ocifetch($SenetenciaAnalizadaSelect);
		     $TotalQuery=ociresult($SenetenciaAnalizadaSelect,"TOTAL");
		
		if($TotalQuery==1)
		{
			$query = "update permisos_pwd set pwd ='$pass', fecha = sysdate-31 where usuario = '$usuario'";
			$SentenciaAnalizadaquery=ociparse($con,$query);
                ociexecute($SentenciaAnalizadaquery);
		}
		 $headers = 'From: Grupocva <mepwdadmin@grupocva.com>' . "\r\n" .
                'Reply-To: mepwdadmin@grupocva.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        $msg = "Su password de usuario para ".$ConsUsuario." ha sido reseteado por GrupoCVA, para entrar al sistema debe utilizar:"."\r\n";
        $msg .= "Login: ".$ConsUsuario."\r\n";
        $msg .= "Password: ".$pass."\r\n";
        $msg .= "Una vez que entre al sistema se le solicitara cambiarla."."\r\n";
        $msg .= "Gracias GrupoCVA";
        $valor = mail($correo,'Nuevo Password',$msg,$headers);
						
		echo "Su nuevo Password ha sido enviado a su correo.<br><a href='inicio_me.php'>Ingrese con su nuevo password</a>";			
					}else
					if($ConsTipo==0 && $correo==$ConsEmailCon)
					{
						
						$chars = "abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i < 12)
        {
            $num = rand() % 61;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        
		
		
		   $select = "select count(*) total from permisos_pwd where usuario = '$usuario'";
			$SenetenciaAnalizadaSelect=ociparse($con,$select);
             ociexecute($SenetenciaAnalizadaSelect);
		     ocifetch($SenetenciaAnalizadaSelect);
		     $TotalQuery=ociresult($SenetenciaAnalizadaSelect,"TOTAL");
		
		if($TotalQuery==1)
		{
			$query = "update permisos_pwd set pwd ='$pass', fecha = sysdate-31 where usuario = '$usuario'";
			$SentenciaAnalizadaquery=ociparse($con,$query);
                ociexecute($SentenciaAnalizadaquery);
		}
		
		 $headers = 'From: Grupocva <mepwdadmin@grupocva.com>' . "\r\n" .
                'Reply-To: mepwdadmin@grupocva.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        $msg = "Su password de usuario para ".$ConsUsuario." ha sido reseteado por GrupoCVA, para entrar al sistema debe utilizar:"."\r\n";
        $msg .= "Login: ".$ConsUsuario."\r\n";
        $msg .= "Password: ".$pass."\r\n";
        $msg .= "Una vez que entre al sistema se le solicitara cambiarla."."\r\n";
        $msg .= "Gracias GrupoCVA";
        $valor = mail($correo,'Nuevo Password',$msg,$headers);
						
		echo "Su nuevo Password ha sido enviado a su correo.<br><a href='inicio_me.php'>Ingrese con su nuevo password</a>";	
						
						
					}else
					{
						echo "EL CORREO NO COINCIDE CON EL CONTACTO";
					}
				}else
				{
					echo "EL USUARIO NO ES VALIDO";
				}
				
        ?>