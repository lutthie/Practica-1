<?php
require_once 'conexion.php';
$mysqli = getConn();

$borrar = $_POST['BORRAR'];
$id = $_POST['CARPINTERO'];

if($borrar == 1){
    $sql = "DELETE FROM red_carpinteros WHERE id_carpintero ='$id'";
    $resultado = $mysqli -> query($sql);
    $sql1 = "DELETE FROM red_carp_dep WHERE id_carpintero ='$id'";
    $resultado1 = $mysqli -> query($sql1);
    $sql2 = "DELETE FROM red_carp_serv WHERE id_carpintero ='$id'";
    $resultado2 = $mysqli -> query($sql2);
    
    unlink('../fotos/foto_'.$id.'.jpg');
    unlink('../portafolio/port_'.$id.'_1.jpg');
    unlink('../portafolio/port_'.$id.'_2.jpg');
    unlink('../portafolio/port_'.$id.'_3.jpg');
    unlink('../portafolio/port_'.$id.'_4.jpg');
    unlink('../portafolio/port_'.$id.'_5.jpg');
    unlink('../portafolio/port_'.$id.'_6.jpg');
    unlink('../portafolio/port_'.$id.'_7.jpg');
    unlink('../portafolio/port_'.$id.'_8.jpg');
    unlink('../portafolio/port_'.$id.'_9.jpg');
    
    if($resultado){
        echo '
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Correcto.</strong> Se borro correctamente.
        </div>
        
        ';
    }
    else{
        //header("location: cpepError.php");
        echo "Error";
    }
}
?>