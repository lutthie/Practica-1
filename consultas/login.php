<?php
$usuario = $_POST['user'];
$contrasena = $_POST['pass'];
session_start();

$conexion = mysqli_connect("localhost","root","","san_miguel");

$_SESSION['usuario'] = $usuario;

$consulta = "SELECT * FROM login where usuario='$usuario' and contrasena='$contrasena'";
$resultado = mysqli_query($conexion,$consulta);
$filas = mysqli_num_rows($resultado);

if($filas){
    header("location: ../crud.php");
}else{
    echo "Error";
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>