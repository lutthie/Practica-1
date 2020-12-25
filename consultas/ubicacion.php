<?php
require_once 'conexion.php';

$servicio ="";
$ubicacion ="";

if(isset($_POST["UBICACION"])){
    $ubicacion = $_POST["UBICACION"];
}

if(isset($_POST["SERVICIO"])){
    $servicio = $_POST["SERVICIO"];
}

$mysqli = getConn();

$query = "SELECT distinct a.id_carpintero, a.nombre, a.telefono, a.email  
          FROM red_carpinteros a
          JOIN red_carp_dep b ON a.id_carpintero = b.id_carpintero and b.status = 1
          JOIN red_carp_serv c ON a.id_carpintero = c.id_carpintero  and c.status = 1 
          WHERE   A.STATUS = 1
          ";   

if($ubicacion != ""){
    $query.="  and b.id_ubicacion  = $ubicacion"; 
}
if($servicio != ""){
    $query.=" and c.id_servicio  = $servicio"; 
}

$result = $mysqli->query($query);
//  echo "<h2>$query</h2>";
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo "<div class='card' style='margin: 5px; width: 30%; display: inline-block; max-width: 540px;'>";
    echo "<div class='row no-gutters'>
          <div class='col-md-4'>";
        if (file_exists("../fotos/foto_".$row['id_carpintero'].".jpg") == true){
            echo "<img src='fotos/foto_".$row['id_carpintero'].".jpg' class='card-img' alt='...'>";
        } else{
            echo "<img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' class='card-img' alt='...'>";
        }
    echo "</div>
          <div class='col-md-8'>
          <div class='card-body'>
          <h5 class='card-title'>". $row['nombre'] ."</h5>
          <p class='card-text'>
          <i class='fas fa-mobile-alt'></i> 
          ". $row['telefono'] ."
          <br/>
          <i class='fas fa-envelope'></i> 
          ". $row['email'] ."
          </p>
          <p class='card-text'><small class='text-muted'><a href='#catalogo' id='verPort' value=". $row['id_carpintero'] ." >Ver Portafolio <i class='fas fa-caret-right'></i></a></small></p>
          </div>
          </div>
          </div>
          ";
    echo "</div>";
}
?>