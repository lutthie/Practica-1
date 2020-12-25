<?php
include('conexion.php');
$mysqli = getConn();

$id = $_POST['CARPINTERO'];

$query = "SELECT * FROM red_carpinteros
          WHERE id_carpintero=$id";
$result = $mysqli->query($query);
//  echo "<h2>$query</h2>";
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    echo '
    <form id = "insertFotoCarp" method="POST" enctype="multipart/form-data" action="consultas/insFotoCarp.php">
    <div class="modal-header">
    <h4 class="modal-title">Editar foto de '.$row['nombre'].'</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    
    <div class="modal-body">
    <input  type="hidden"  name="id_carpintero" value="'.$id.'" >
    
    <div class="form-group">
    <label>Foto de perfil</label>
    <input name ="foto" id="foto" type="file" class="form-control">
    </div>
    
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
    <input id="btnFotoCarp" btnFotoCarp name="btnFotoCarp" type="submit" class="btn btn-info" value="Guardar">
    </div>
    </form>
    ';
}
?>