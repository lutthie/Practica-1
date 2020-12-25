<?php
require_once 'conexion.php';
$mysqli = getConn();

$status = $_POST['STATUS'];
$id = $_POST['CARPINTERO'];

if($status == 1){
    $query = "UPDATE red_carpinteros SET status = 0 WHERE id_carpintero = '$id'";
    $result = $mysqli->query($query);
}
else{
    $query = "UPDATE red_carpinteros SET status = 1 WHERE id_carpintero = '$id'";
    $result = $mysqli->query($query);
}
?>