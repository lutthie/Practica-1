<?php
function conectar(){

$user="root";
$pass="";
$server="localhost";
$db= "san_miguel";
$con=mysqli_connect($server,$user,"",$db) or die ("Error al conectar a la bd ");

return $con;
}
?>