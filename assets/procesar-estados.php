
<?php
mb_http_input("");
mb_http_output("");
if(isset($_POST["estados"])){
    // Capture selected country
    $country = $_POST["estados"];
     
    // Define country and city array     
    $countryArr = array( 
        "Mexico" => array("Selecciona tu estado","Aguascalientes","Baja California","Baja California Sur","Campeche","Chiapas","Chihuahua","Coahuila","Colima","Distrito Federal","Durango","M&eacute;xico","Guanajuato","Guerrero","Hidalgo","Jalisco","Michoac&aacute;n","Morelos","Nayarit","Nuevo Le&oacute;n","Oaxaca","Puebla","Quer&eacute;taro","Quintana Roo","San
Luis Potos&iacute;","Sinaloa","Sonora","Tabasco","Tamaulipas","Tlaxcala","Veracruz","Yucat&aacute;n","Zacatecas")                 );
     
    
    foreach($countryArr[$country] as $value){
        echo "<option>". $value . "</option>";
    }
}

?>