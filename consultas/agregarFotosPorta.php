<?php
$id_carpintero = $_POST['CARPINTERO'];
echo '
<div class="modal-body">
<input id="id_carp" name="id_carp" type="hidden" class="form-control" value="'.$id_carpintero.'">
    <div class="form-group">
        <label>Foto 1</label>
            <input id="foto1" name="foto1" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto 2</label>
        <input id="foto2" name="foto2" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto 3</label>
        <input id="foto3" name="foto3" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto 4</label>
        <input id="foto4" name="foto4" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto 5</label>
        <input id="foto5" name="foto5" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto 6</label>
        <input id="foto6" name="foto6" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto 7</label>
        <input id="foto7" name="foto7" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto 8</label>
        <input id="foto8" name="foto8" type="file" class="form-control">
    </div>
    <div class="form-group">
        <label>Foto 9</label>
        <input id="foto9" name="foto9" type="file" class="form-control">
    </div>
</div>
<div class="modal-footer">
    <input id="btn_insertPorta" btn_insertPorta name="btn_insertPorta" type="submit" class="btn btn-info" value="Agregar">
</div>
';
?>