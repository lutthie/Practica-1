<?php
function conectar(){
    $user = "root";
    $pass = "";
    $server = "localhost";
    $db = "san_miguel";
    $con = mysqli_connect($server,$user,"",$db) or die ("Error al conectar a la bd ");
    return $con;
}

$con = conectar();

$nombre = $_POST['nombre'];
$telefono = $_POST ['telefono'];
$correo = $_POST['correo'];

if(isset( $_POST['ubicacion'])){
    $ubicacion = $_POST['ubicacion'];
}

if(isset( $_POST['categoria'])){
    $categoria = $_POST['categoria'];
}

$ID =0;
$sql = "SELECT ID_CARPINTERO FROM red_carpinteros WHERE email ='$correo'";
$resultado = $con->query($sql);
while($row=$resultado->fetch_assoc()){ 
    $ID = $row["ID_CARPINTERO"];
}


if($ID ==0){
    $query = "SELECT IFNULL(MAX(id_carpintero),0)+1 as NEW_ID FROM red_carpinteros";
    $resultado = $con->query($query);
    while($row=$resultado->fetch_assoc()){ 
        $NEW_ID = $row["NEW_ID"];
    }
} 
else {
    $NEW_ID = $ID;
  }


if($ID ==0){
    $query = "INSERT INTO red_carpinteros(id_carpintero, nombre, email, telefono, status, creado) Values ($NEW_ID,'$nombre','$correo','$telefono',0,now())";
} else {
    $query = "UPDATE red_carpinteros set nombre ='$nombre',  telefono = '$telefono',status=0, creacion = now() WHERE id_carpintero = $ID";
}
$resultado = $con->query($query);


if(isset( $_POST['ubicacion'] )){
$query ="DELETE red_carp_dep WHERE id_capitero = $NEW_ID";
$resultado = $con->query($query);

foreach($ubicacion as $ubi1){
    $query ="INSERT INTO red_carp_dep (id_carpintero, id_ubicacion, status) Values ($NEW_ID, $ubi1, 1)";
    $resultado = $con->query($query);
}

}

if(isset( $_POST['categoria'] )){
$query ="DELETE red_carp_serv  WHERE id_capitero = $NEW_ID";
$resultado = $con->query($query);

foreach($categoria as $cat){
$query ="INSERT INTO red_carp_serv (id_carpintero, id_servicio, status) Values ($NEW_ID, $cat, 1)";
$resultado = $con->query($query);
}

}

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
        $bannerpath="../fotos/foto_".$NEW_ID.".jpg";
        move_uploaded_file($_FILES["foto"]["tmp_name"],$bannerpath);
    }
}

/*if (isset ($_FILES['foto1'])){
    $foto1 = $_FILES['foto1']['name'];
    if($foto1 != ''){
        $expbanner1=explode('.',$foto1);
        $bannerexptype1=$expbanner1[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername1=md5($encname).'.'.$bannerexptype1;
        $bannerpath1="portafolio/port_".$NEW_ID."_1.jpg";
        move_uploaded_file($_FILES["foto1"]["tmp_name"],$bannerpath1);
    }
}

if (isset ($_FILES['foto2'])){
    $foto2 = $_FILES['foto2']['name'];
    if($foto2 != ''){
        $expbanner2=explode('.',$foto2);
        $bannerexptype2=$expbanner2[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername2=md5($encname).'.'.$bannerexptype2;
        $bannerpath2="portafolio/port_".$NEW_ID."_2.jpg";
        move_uploaded_file($_FILES["foto2"]["tmp_name"],$bannerpath2);
    }
}

if (isset ($_FILES['foto3'])){
    $foto3 = $_FILES['foto3']['name'];
    if($foto3 != ''){
        $expbanner3=explode('.',$foto3);
        $bannerexptype3=$expbanner3[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername3=md5($encname).'.'.$bannerexptype3;
        $bannerpath3="portafolio/port_".$NEW_ID."_3.jpg";
        move_uploaded_file($_FILES["foto3"]["tmp_name"],$bannerpath3);
    }
}

if (isset ($_FILES['foto4'])){
    $foto4 = $_FILES['foto4']['name'];
    if($foto4 != ''){
        $expbanner4=explode('.',$foto4);
        $bannerexptype4=$expbanner4[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername4=md5($encname).'.'.$bannerexptype4;
        $bannerpath4="portafolio/port_".$NEW_ID."_4.jpg";
        move_uploaded_file($_FILES["foto4"]["tmp_name"],$bannerpath4);
    }
}

if (isset ($_FILES['foto5'])){
    $foto5 = $_FILES['foto5']['name'];
    if($foto5 != ''){
        $expbanner5=explode('.',$foto5);
        $bannerexptype5=$expbanner5[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername5=md5($encname).'.'.$bannerexptype5;
        $bannerpath5="portafolio/port_".$NEW_ID."_5.jpg";
        move_uploaded_file($_FILES["foto5"]["tmp_name"],$bannerpath5);
    }
}

if (isset ($_FILES['foto6'])){
    $foto6 = $_FILES['foto6']['name'];
    if($foto6 != ''){
        $expbanner6=explode('.',$foto6);
        $bannerexptype6=$expbanner6[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername6=md5($encname).'.'.$bannerexptype6;
        $bannerpath6="portafolio/port_".$NEW_ID."_6.jpg";
        move_uploaded_file($_FILES["foto6"]["tmp_name"],$bannerpath6);
    }
}

if (isset ($_FILES['foto7'])){
    $foto7 = $_FILES['foto7']['name'];
    if($foto7 != ''){
        $expbanner7=explode('.',$foto7);
        $bannerexptype7=$expbanner7[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername7=md5($encname).'.'.$bannerexptype7;
        $bannerpath7="portafolio/port_".$NEW_ID."_7.jpg";
        move_uploaded_file($_FILES["foto7"]["tmp_name"],$bannerpath7);
    }
}

if (isset ($_FILES['foto8'])){
    $foto8 = $_FILES['foto8']['name'];
    if($foto8 != ''){
        $expbanner8=explode('.',$foto8);
        $bannerexptype8=$expbanner8[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername8=md5($encname).'.'.$bannerexptype8;
        $bannerpath8="portafolio/port_".$NEW_ID."_8.jpg";
        move_uploaded_file($_FILES["foto8"]["tmp_name"],$bannerpath8);
    }
}

if (isset ($_FILES['foto9'])){
    $foto9 = $_FILES['foto9']['name'];
    if($foto9 != ''){
        $expbanner9=explode('.',$foto9);
        $bannerexptype9=$expbanner9[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername9=md5($encname).'.'.$bannerexptype9;
        $bannerpath9="portafolio/port_".$NEW_ID."_9.jpg";
        move_uploaded_file($_FILES["foto9"]["tmp_name"],$bannerpath9);
    }
}*/

header("location:../crud.php");