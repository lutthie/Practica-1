<?php
$id_carpintero  = $_POST["id_carpintero"];

$ruta_foto="../fotos/foto_".$id_carpintero.".jpg";

if (isset ($_FILES['foto'])){
    $foto = $_FILES['foto']['name'];
    if($foto != ''){
        $expbanner=explode('.',$foto);
        $bannerexptype=$expbanner[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername=md5($encname).'.'.$bannerexptype;
        $bannerpath="../fotos/foto_".$id_carpintero.".jpg";
        move_uploaded_file($_FILES["foto"]["tmp_name"],$bannerpath);
    }
}

header("Refresh: 0, url=../crud.php");

?>