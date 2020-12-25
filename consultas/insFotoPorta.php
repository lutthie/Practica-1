<?php
$id_carpintero = $_POST['id_carp'];

if (isset ($_FILES['foto1'])){
    $foto1 = $_FILES['foto1']['name'];
    if($foto1 != ''){
        $expbanner1=explode('.',$foto1);
        $bannerexptype1=$expbanner1[1];
        date_default_timezone_set('Australia/Melbourne');
        $date = date('m/d/Yh:i:sa', time());
        $rand=rand(10000,99999);
        $encname=$date.$rand;
        $bannername1=md5($encname).'.'.$bannerexptype1;
        $bannerpath1="../portafolio/port_".$id_carpintero."_1.jpg";
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
        $bannerpath2="../portafolio/port_".$id_carpintero."_2.jpg";
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
        $bannerpath3="../portafolio/port_".$id_carpintero."_3.jpg";
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
        $bannerpath4="../portafolio/port_".$id_carpintero."_4.jpg";
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
        $bannerpath5="../portafolio/port_".$id_carpintero."_5.jpg";
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
        $bannerpath6="../portafolio/port_".$id_carpintero."_6.jpg";
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
        $bannerpath7="../portafolio/port_".$id_carpintero."_7.jpg";
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
        $bannerpath8="../portafolio/port_".$id_carpintero."_8.jpg";
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
        $bannerpath9="../portafolio/port_".$id_carpintero."_9.jpg";
        move_uploaded_file($_FILES["foto9"]["tmp_name"],$bannerpath9);
    }
}

header("location:../crud.php");
?>