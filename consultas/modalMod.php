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
    <form id = "insertCarp" method="POST">
    <div class="modal-header">
    <h4 class="modal-title">Editar a '.$row['nombre'].'</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">    
                                    
    <input  type="hidden"  name="id_carpintero" value="'.$row['id_carpintero'].'" >
                         
    <div class="form-group">
    <label>Nombre completo</label>
    <input  id ="nombre" name="nombre" type="text" class="form-control" value="'.$row['nombre'].'">
    </div>
    
    <div class="form-group">
    <label>Correo electrónico</label>
    <input id = "mail" name="mail" type="email" class="form-control" value="'.$row['email'].'">
    </div>
    
    <div class="form-group">
    <label>Teléfono</label>
    <input id = "telefono" name="telefono" type="text" class="form-control" value="'.$row['telefono'].'">
    </div>
    
    <div class="form-group">
    <p>Ubicación</p>
    <div class="col-md-12">
    <div class="checkbox">
    <label for="Ubicacion-0">
    <input type="checkbox" name="ubicacion[]" value="1">
    Capital
    </label>
    <label for="Ubicacion-1">
    <input type="checkbox" name="ubicacion[]" value="2">
    Quetzaltenango
    </label>
    <label for="Ubicacion-2">
    <input type="checkbox" name="ubicacion[]" value="3">
    Huehuetenango
    </label>
    <label for="Ubicacion-3">
    <input type="checkbox" name="ubicacion[]" value="4">
    Chimaltenango
    </label>
    <label for="Ubicacion-4">
    <input type="checkbox" name="ubicacion[]" value="5">
    Escuintla
    </label>
    <label for="Ubicacion-5">
    <input type="checkbox" name="ubicacion[]" value="6">
    Petén
    </label>
    </div>
    </div>
    </div>
    
    <div class="form-group">
    <p>Categoría</p>
    <div class="col-md-12">
    <div class="checkbox">
    <label for="Categoria-0">
    <input type="checkbox" name="categoria[]" value="1">
    Carpintería
    </label>
    <label for="Categoria-1">
    <input type="checkbox" name="categoria[]" value="2">
    Diseño de interiores
    </label>
    <label for="Categoria-3">
    <input type="checkbox" name="categoria[]" value="3">
    Diseño de muebles
    </label>
    </div>
    </div>
    </div>
    
    </div>
    <div class="modal-footer">
    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
    <input id="btn_actualizar" btn_actualizar name="btn_actualizar" type="submit" class="btn btn-info" value="Actualizar">
    </div>
    </form>
    ';
}
?>