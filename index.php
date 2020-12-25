<?php
include ("conexion.php");
$con=conectar();
?>                    

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>San Miguel - Red de carpintería</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        
        <link href="img/favicon.png" rel="icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/venobox/venobox.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/b17361c2e1.js" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css'>
        
        <link href="css/style.css" rel="stylesheet">
    </head>
    
    <body>
        <!-- MENU -->
        <header id="header">
            <div class="container">
                <div id="logo" class="pull-left">
                    <a href="#intro" class="scrollto"><img src="img/logo_2.png" alt="" title="San Miguel"></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="#intro">Inicio</a></li>
                        <li><a href="#catalogo">Catálogo de productos</a></li>
                        <li class="buy-tickets">
                            <a href="#" data-toggle="modal" data-target="#modalInsCarpintero" id="red">Quiero ser parte de la red</a></li>
                        <li><a href="#" id="admin"><i class="fas fa-cog fa-lg" style="color:white"></i></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- FIN MENU -->
  
        <!-- INICIO -->
        <section id="intro">
            <div class="intro-container wow fadeIn">
                <h1 class="mb-4 pb-0">Red de<br><span>carpinteros</span> y profesionales</h1>
                <p class="mb-4 pb-0">Encuentra carpinteros con experiencia, arquitectos y diseñadores de mueblería y remodelación de espacios</p>
                <a href="#catalogo" class="about-btn scrollto">Ver catálogo</a>
            </div>
        </section>
        <!-- FIN INICIO -->
        
        <main id="main">
            
            <!-- CATALOGO -->
            <section id="catalogo" class="section-bg wow fadeInUp">
                <div class="container">
                    <div class="section-header">
                        <h2>Catálogo</h2>
                    </div>
                    <!-- SERVICIOS -->
                    <div class="row contact-info">
                        <div class="col-md-4">
                            <div class="contact-address">
                                <i class="ion-ios-location-outline"></i>
                                <a id="servicio-btn" value="1"; href="#catalogo"><img src="img/Carpinteros.png" style="width: 30%">
                                    <p>Carpintería</p></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-phone">
                                <i class="ion-ios-telephone-outline"></i>
                                <a id="servicio-btn" value="2"; href="#catalogo"><img src="img/muebles.png" style="width: 30%">
                                    <p>Diseño de muebles</p></a>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="contact-email">
                                <i class="ion-ios-email-outline"></i>
                                <a id="servicio-btn" value="3"; href="#catalogo"><img src="img/iconos.png" style="width: 30%">
                                    <p>Diseño de interiores</p></a>
                            </div>
                        </div>
                    </div>
                    <!-- FIN SERVICIOS -->
                    
                    <!-- UBICACIÓN -->
                    <div class="form">                       
                        <ul class="nav nav-tabs">   
                            <?php
                            $con=conectar();
                            $query ="SELECT id_sucursal, sucursal FROM red_sucursal";
                            $resultado=$con->query($query);
                            while($row=$resultado->fetch_assoc()){
                                echo '
                                <li class="nav-item">
                                <a class="nav-link" id="location-tab" value="'.$row['id_sucursal'].'"; data-toggle="tab" href="#sede">'.$row['sucursal'].'</a>
                                </li>';
                            }
                            ?>
                        </ul>
                        
                        <div class="tab-content">
                            <div class="tab-pane container active" id="sede">...</div>
                            <div class="tab-pane container fade" id="sede">...</div>
                            <div class="tab-pane container fade" id="sede">...</div>
                        </div>
                        
                    </div>
                    <!-- FIN UBICACION -->
                    
                </div>
            </section>
            <!-- FIN CATALOGO -->
        </main>
        
        <style type="text/css">
            .btn-file {
                position: relative;
                overflow: hidden;
            }
            .btn-file input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                min-width: 100%;
                min-height: 100%;
                font-size: 100px;
                text-align: right;
                filter: alpha(opacity=0);
                opacity: 0;
                outline: none;
                background: white;
                cursor: inherit;
                display: block;
            }
        </style>
        
        <!-- FORMULARIO RED -->
        <div class="modal fade" id="modalInsCarpintero" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Únete a la red de carpinteros</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" name="InsRedCarpinteros" method="POST" id="InsRedCarpinteros" enctype="multipart/form-data"
                              action="InsRedCarpinteros.php"
                              >
                            <div class="container bootstrap snippet">
                                  
                                  
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="text-center">
                                            <div id="preview" class="avatar img-circle img-thumbnail">
                                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" width ="150" height="150" alt="avatar">
                                            </div>
                                            <div class="custom-file-upload">
                                                <p>Elegir foto de perfil</p>
                                                <span class="btn btn-primary btn-file">
                                                    Subir...<input type="file" name="foto" id ="foto">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        document.getElementById("foto").onchange = function(e) {
                                            let reader = new FileReader();
                                            reader.readAsDataURL(e.target.files[0]);
                                            reader.onload = function(){
                                                let preview = document.getElementById('preview'),
                                                    image = document.createElement('img');
                                                    image.src = reader.result;
                                                    image.width = 150;
                                                    image.height = 150;
                                                    preview.innerHTML = '';
                                                preview.append(image);
                                            };
                                        }
                                    </script>
                                    <div class="col-sm-9">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="datos">
                                                <hr>                                               
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo" title="Ingrese su nombre completo.">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" title="Ingrese su número telefónico.">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo electrónico" title="Ingrese su correo electrónico.">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p style="color: #f49e11">Ubicación</p>
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label for="Ubicacion-0">
                                                                <input type="checkbox" name="ubicacion[]" value="1">
                                                                Capital
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="Ubicacion-1">
                                                                <input type="checkbox" name="ubicacion[]" value="2">
                                                                Quetzaltenango
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="Ubicacion-2">
                                                                <input type="checkbox" name="ubicacion[]" value="3">
                                                                Huehuetenango
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="Ubicacion-3">
                                                                <input type="checkbox" name="ubicacion[]" value="4">
                                                                Chimaltenango
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="Ubicacion-4">
                                                                <input type="checkbox" name="ubicacion[]" value="5">
                                                                Escuintla
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="Ubicacion-5">
                                                                <input type="checkbox" name="ubicacion[]" value="6">
                                                                Petén
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p style="color: #f49e11">Categoría</p>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label for="Categoria-0">
                                                                <input type="checkbox" name="categoria[]" value="1">
                                                                Carpintería
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="Categoria-1">
                                                                <input type="checkbox" name="categoria[]" value="2">
                                                                Diseño de interiores
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label for="Categoria-3">
                                                                <input type="checkbox" name="categoria[]" value="3">
                                                                Diseño de muebles
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <p style="color: #f49e11">Sube fotos de tus proyectos</p>
                                                    <input id="foto1" name="foto1" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input id="foto2" name="foto2" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input id="foto3" name="foto3" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input id="foto4" name="foto4" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input id="foto5" name="foto5" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input id="foto6" name="foto6" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input id="foto7" name="foto7" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input id="foto8" name="foto8" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input id="foto9" name="foto9" type="file" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-12">
                                                        <button id="btn_InsCarpinteros" class="btn btn btn-success pull-right" type="submit" href="#portafolio">Enviar datos</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN FORMULARIO RED -->   
        
        <!-- MODAL PORTAFOLIO -->
        <div id="ver_port" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Este es el portafolio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="porta">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL PORTAFOLIO -->
        
        <!-- MODAL LOGIN -->
        <div id="c_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Iniciar sesión</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="porta">
                            <article class="card-body">
                                <form action="consultas/login.php" method="POST">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            </div>
                                            <input class="form-control" name="user" id="user" placeholder="Usuario" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                            </div>
                                            <input class="form-control" name="pass" id="pass" placeholder="**********" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Iniciar sesión </button>
                                    </div>
                                </form>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL LOGIN -->
        
        <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
        
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/jquery/jquery-migrate.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/superfish/hoverIntent.js"></script>
        <script src="lib/superfish/superfish.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/venobox/venobox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="contactform/contactform.js"></script>
        <script src="js/main.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js'></script>
        
        <script type="text/javascript">
            var ubicacion=1;
            var servicio=1;
            var carpintero=0;
            var id_carpintero=0;
            
            $(document).on('click','#servicio-btn', function() {
                servicio = $(this).attr('value');
            
                 $.post("consultas/ubicacion.php",{ UBICACION:ubicacion, SERVICIO:servicio},function(data){
                    document.getElementById("sede").innerHTML = data.trim();
                });
           
            });
            
                
            $(document).on('click','#location-tab', function() {
                ubicacion = $(this).attr('value');
                
                $.post("consultas/ubicacion.php",{ UBICACION:ubicacion, SERVICIO:servicio},function(data){
                    document.getElementById("sede").innerHTML = data.trim();
                });
               
            });
            
            $(document).on('click',"#btn_InsCarpinteros22", function(event){
                // es necesaria para que capte los campos
                event.preventDefault();
                alert('hola');
                $.ajax({  
                     url:"InsRedCarpinteros.php",  
                     method:"POST",  
                     data:$("#InsRedCarpinteros").serialize(),  
                     beforeSend:function(){  
                          //$('#insert').val("Inserting");  
                     },  
                    success:function(data){  
                            alert(data); 
                        $('#InsRedCarpinteros')[0].reset();  
                          $('#modalInsCarpintero').modal('hide');  
                       //  $('#employee_table').html(data);  
                           window.location='index.php';
                    } ,error: function(data) { // if error occured
                            alert(data);
                    }
                     }); 
            });
            
            window.onload = function() {
              
                $.post("consultas/ubicacion.php",{ UBICACION:1, SERVICIO:1},function(data){
                    document.getElementById("sede").innerHTML = data.trim();
                });
            
            }
            
            $(document).on('click','#verPort', function() {
                carpintero = $(this).attr('value');
                //alert(carpintero);
                $.post("consultas/portafolio.php",{ CARPINTERO:carpintero},function(data){
                    $('#ver_port').modal('show');
                    document.getElementById("porta").innerHTML = data.trim();
                });
            });
            
            $(document).on('click','#admin', function(){
                $('#c_login').modal('show');
            });          
            
        
        </script>
    </body>
</html>