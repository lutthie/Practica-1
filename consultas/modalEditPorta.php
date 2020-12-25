<?php

$id_carpintero= $_POST['CARPINTERO'];

echo '<div class="modal-body">';
if(file_exists("../portafolio/port_".$id_carpintero."_1.jpg") == true){
    
    echo '<div class="row" style="margin:15px">';
    echo '<a href="#" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_1.jpg" class="img-fluid rounded">
          </a>';
    echo '<a href="portafolio/port_'.$id_carpintero.'_2.jpg" data-gallery="gallery" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_2.jpg" class="img-fluid rounded">
          </a>';
    echo '<a href="portafolio/port_'.$id_carpintero.'_3.jpg" data-gallery="gallery" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_3.jpg" class="img-fluid rounded">
          </a>';
    echo '</div>';
    
    echo '<div class="row" style="margin:15px">';
    echo '<a href="portafolio/port_'.$id_carpintero.'_4.jpg" data-gallery="gallery" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_4.jpg" class="img-fluid rounded">
          </a>';
    echo '<a href="portafolio/port_'.$id_carpintero.'_5.jpg" data-gallery="gallery" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_5.jpg" class="img-fluid rounded">
          </a>';
    echo '<a href="portafolio/port_'.$id_carpintero.'_6.jpg" data-gallery="gallery" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_6.jpg" class="img-fluid rounded">
          </a>';
    echo '</div>';
    
    echo '<div class="row" style="margin:15px">';
    echo '<a href="portafolio/port_'.$id_carpintero.'_7.jpg" data-gallery="gallery" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_7.jpg" class="img-fluid rounded">
          </a>';
    echo '<a href="portafolio/port_'.$id_carpintero.'_8.jpg" data-gallery="gallery" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_8.jpg" class="img-fluid rounded">
          </a>';
    echo '<a href="portafolio/port_'.$id_carpintero.'_9.jpg" data-gallery="gallery" class="col-md-4">
            <img src="portafolio/port_'.$id_carpintero.'_9.jpg" class="img-fluid rounded">
          </a>';
    echo '</div>';
                
}
else{
    echo '<div class="row" style="margin:15px">';
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "</div>";
    
    echo '<div class="row" style="margin:15px">';
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "</div>";
    
    echo '<div class="row" style="margin:15px">';
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "<a href='portafolio/default.png' data-gallery='gallery' class='col-md-4'>
            <img src='portafolio/default.png' class='img-fluid rounded'>
          </a>";
    echo "</div>";
}
echo '</div>';
echo '<div class="modal-footer">
   <input id="btn_editPorta" btn_editPorta name="'.$id_carpintero.'" type="submit" class="btn btn-info" value="Editar Portafolio">
</div>';
?>