<?php

require_once 'conexion.php';
$mysqli = getConn();

$modificar = $_POST['ACTUALIZAR'];
$id = $_POST['CARPINTERO'];

$nombre = $_POST['nombre'];
$email = $_POST['mail'];
$telefono = $_POST['telefono'];
//$status = $_POST['status'];

if($modificar == 1){
    $query = "UPDATE red_carpinteros SET nombre = '$nombre', email = '$email', telefono = '$telefono' WHERE id_carpintero = '$id'";
    $result = $mysqli->query($query);
    if($result){
        //header("location: login/login.php"); 
        echo "Guardado correctamente";
    }
    else{
        //header("location: cpexpError.php"); 
        echo "Error";
    }
}

?>