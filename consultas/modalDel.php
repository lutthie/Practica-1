<?php
require_once 'conexion.php';
$mysqli = getConn();

$id = $_POST['CARPINTERO'];
$query = "SELECT * FROM red_carpinteros WHERE id_carpintero=$id";
$result = $mysqli->query($query);
while($row = $result->fetch_array(MYSQLI_ASSOC)){

echo '
    <div class="modal-header">
        <h4 class="modal-title">Borrar a '. $row['nombre'] .'</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <p>Esta seguro de querer borrar a '. $row['nombre'] .'?</p>
        <p class="text-danger"><small>Al eliminar un usuario, se eliminan todos sus datos y ya no se podrán recuperar.</small></p>
    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
        <input type="submit" id="btn_borrar" name="1" class="btn btn-danger" value="Borrar">
    </div>
';
}
?>