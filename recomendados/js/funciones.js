// JavaScript Document
var rubros = new Array();
var pos = 'N';

function modificaRubro(idBucar)
{
	//alert(idBucar);
	if( $('#rubro_'+idBucar).prop('checked') ) 
	{
		$("#marcaRubo_"+idBucar).removeAttr("disabled");
    	//si esta seleccionado, obtenemos la marca
		var idMarca = document.getElementById("marcaRubo_"+idBucar).value;
		var idRubro = document.getElementById("rubro_"+idBucar).value;
		//buscamos el id de rubro en el arreglo
		//alert(rubros.length);
		for (i=0;i<rubros.length;i++)
		{ 	
			//si lo encuentra obtenemos la posicion en el arreglo donde esta
			if(rubros[i].IDRUBRO == idRubro)
			{
			 pos = i;
			}
		}
		//alert('el valor de pos es:'+pos);
		//Si esta en el arreglo solo cambiamos el valor del id de la marca si no esta, lo agregamos al final del arreglo
		if(pos != 'N')
		{
			rubros[pos].IDMARCA = idMarca;
			//alert('Elemento editado');
		}else
		{
			rubros.push({IDRUBRO:idRubro, IDMARCA:idMarca});
			//alert('Elemento agregado');
		}
		
		pos = 'N';
		//alert(rubros.length);
		 console.log(rubros);
		
	}else
	{
		 $("#marcaRubo_"+idBucar).attr('disabled', true);
		 $("#marcaRubo_"+idBucar).val('0');
		//si no esta marcado el checkbox, eliminados del arrweglo
		for (i=0;i<rubros.length;i++)
		{ 	
			//si lo encuentra obtenemos la posicion en el arreglo donde esta
			if(rubros[i].IDRUBRO == idRubro)
			{
			 pos = i;
			}
		}
		//eliminamos, a partir de la posicion sonde esta el elemento, un elemento
		rubros.splice(pos,1);
		//alert('Elemento eliminado');
	}
}



$(document).ready(function() 
{    
           
    $('#num_cliente').keypress(function(e){   
        if(e.which == 13){ 
			var idCliente = document.getElementById("num_cliente").value;
			//alert(idCliente);
           $("#resClientes").load("funciones/consultaClientes.php?numeroCli="+idCliente,function(){});      
         }   
     });  
	
	
	$('#usr_final').keypress(function(e){   
        if(e.which == 13){ 
			var idUsr = document.getElementById("usr_final").value;
			//alert(idUsr);
           $("#resFinal").load("funciones/consultaUsrFina.php?numeroUsr="+idUsr,function(){});      
         }   
     }); 
	
	
              
});

function buscaCliente(){
	$.fancybox({
			'hideOnOverlayClick' : false,
			'closeBtn'	: true,
			'type' : 'iframe',
			'height' : 1000,
			'width' : 1000,
			'href' : 'funciones/buscaClienteNombre.php',
			helpers :  {
				overlay : {
					closeClick : false
				}
			}
	});
}

function buscaUsrFinal(){
	$.fancybox({
			'hideOnOverlayClick' : false,
			'closeBtn'	: true,
			'type' : 'iframe',
			'height' : 1000,
			'width' : 1000,
			'href' : 'funciones/buscaUsrFinalNombre.php',
			helpers :  {
				overlay : {
					closeClick : false
				}
			}
	});
}


function cargaInfoUsrFinal(idContactFinal)
{
	//alert(idContactFinal);
	if(idContactFinal == '0')
	{
		alert('Debes seleccionar un punto de Contacto');
	}else
	{
		$("#resFinal").load("funciones/consultaContactoUsrFina.php?idContactFinal="+idContactFinal,function(){});
	}
}


function enviarFormulario()
{
	//alert('validar');
	//validar si hay registros en el arreglo
	if(rubros.length == 0)
	{
		 alert('Debes seleccionar minimo un rubro');
		 location.reload();
	}else{
		var formulario = $('#contactform').serialize();
		/*alert(rubros);*/
		 $.ajax({
			 type: "POST",
			 url: "funciones/guardaOportunidad.php",
			 data: {rubro : rubros, datos : $('#contactform').serialize()},
			 dataType: "html",
			 beforeSend: function()
				{
				  //imagen de carga $("#contactform").hide(); cargando.show().fadeIn();
				  $("#contactform").hide();
				  $("#resultado").html("<p align='center'><img src='icons/ajax-loader.gif' alt='' /></p>");
				}, error: function()
			{
				 //alert("error petición ajax");
			}, success: function(data)
			{ 
				 //alert(data);
				 if(data != '')
				 {
					 $("#resultado").empty(); 
					 $('#documentos').css('display', 'block');
					 $('#contact').css('display','none');
					 document.getElementById("folioRegistro").value = data;
				 }else
				 {
					 alert('Error al guardar registro de oportunidad');
				 }
				 //$("#resultado").empty(); 
				 //$("#resultado").append(data); 
			} 
		});
		/* 
		 alert(formulario);*/
	}
}


function enviarArchivos()
{
	
}

function clonar()
{
	$('#formu').clone().appendTo($('#clonado'));
}


var numero = 0; //Esta es una variable de control para mantener nombres
            //diferentes de cada campo creado dinamicamente.
evento = function (evt) { //esta funcion nos devuelve el tipo de evento disparado
   return (!evt) ? event : evt;
}

//Aqui se hace lamagia... jejeje, esta funcion crea dinamicamente los nuevos campos file
addCampo = function () { 
//Creamos un nuevo div para que contenga el nuevo campo
   nDiv = document.createElement('div');
//con esto se establece la clase de la div
   nDiv.className = 'archivo';
//este es el id de la div, aqui la utilidad de la variable numero
//nos permite darle un id unico
   nDiv.id = 'file' + (++numero);
//creamos el input para el formulario:
   nCampo = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
   nCampo.name = 'archivos[]';
//Establecemos el tipo de campo
   nCampo.type = 'file';  
 //creamos el input para el formulario:
   nCampoText = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
   nCampoText.name = 'nombre_archivos[]';
   nCampoText.placeholder = 'Escriba el título del documento';
//Establecemos el tipo de campo
   nCampoText.type = 'text';    
//Ahora creamos un link para poder eliminar un campo que ya no deseemos
   a = document.createElement('a');
//El link debe tener el mismo nombre de la div padre, para efectos de localizarla y eliminarla
   a.name = nDiv.id;
//Este link no debe ir a ningun lado
   a.href = '#';
//Establecemos que dispare esta funcion en click
   a.onclick = elimCamp;
//Con esto ponemos el texto del link
   a.innerHTML = 'Eliminar';
//Bien es el momento de integrar lo que hemos creado al documento,
//primero usamos la función appendChild para adicionar el campo file nuevo
   nDiv.appendChild(nCampoText);
   nDiv.appendChild(nCampo);  
//Adicionamos el Link
   nDiv.appendChild(a);
//Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
//con esta función obtenemos una referencia a ella para usar de nuevo appendChild
//y adicionar la div que hemos creado, la cual contiene el campo file con su link de eliminación:
   container = document.getElementById('adjuntos');
   container.appendChild(nDiv);
}
//con esta función eliminamos el campo cuyo link de eliminación sea presionado
elimCamp = function (evt){
   evt = evento(evt);
   nCampo = rObj(evt);
   div = document.getElementById(nCampo.name);
   div.parentNode.removeChild(div);
}
//con esta función recuperamos una instancia del objeto que disparo el evento
rObj = function (evt) { 
   return evt.srcElement ?  evt.srcElement : evt.target;
}


function buscaRegistrosOportunidad(estatus)
{
	$("#resultados").load("funciones/busquedaRegsOpor.php?estatus="+estatus,function(){});
}
