<?php

  require ("consultas/conexion.php");
  $mysqli = getConn();
 $exitos = "No entro";
	  
      if(isset($_POST["id_carpintero"] )  )
      {  

            $id_carpintero  = $_POST["id_carpintero"];
            $nombre 		= $_POST["nombre"];
            $email 	        = $_POST["mail"];
            $telefono 		= $_POST["telefono"];

          
          $query = "  
           UPDATE red_carpinteros    
           SET 
           	nombre 		='$nombre',   
           	email 		='$email',   
           	telefono 		= '$telefono'
		   WHERE id_carpintero =$id_carpintero";  
         		 
          
          
        $result = $mysqli->query($query);
        if($result){

            $exitos = "actualizo el carpintero";
        }
          
  }  
 
echo $exitos;
 
 ?>