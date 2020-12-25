<?php
include('consultas/conexion.php');
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
    header("location:index.php");
    die();
}
?>
<html>
    <head>
        <title>Red de carpinteros - sistema</title>
        <link href="img/favicon.png" rel="icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/b17361c2e1.js" crossorigin="anonymous"></script>
        <link href="css/crud.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="./img/favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Red de carpinteros // <?php echo $_SESSION['usuario'] ?>
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="consultas/logout.php">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </div>
        </nav>        
        <br/><br/><br/>
        <div id="mensaje"></div>
        <div class="container">
            <div id="exito"></div>
            <div class="d-flex justify-content-end">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 light-table-filter" type="search" placeholder="Buscar" data-table="order-table" aria-label="Search">
                </form>
            </div>
            <script type="text/javascript">
                (function(document) {
                    'use strict';
                    var LightTableFilter = (function(Arr) {
                        var _input;
                        function _onInputEvent(e) {
                            _input = e.target;
                            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                            Arr.forEach.call(tables, function(table) {
                                Arr.forEach.call(table.tBodies, function(tbody) {
                                    Arr.forEach.call(tbody.rows, _filter);
                                });
                            });
                        }
                        
                        function _filter(row) {
                            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                        }
                        return {
                            init: function() {
                                var inputs = document.getElementsByClassName('light-table-filter');
                                Arr.forEach.call(inputs, function(input) {
                                    input.oninput = _onInputEvent;
                                });
                            }
                        };
                    })(Array.prototype);
                    
                    document.addEventListener('readystatechange', function() {
                        if (document.readyState === 'complete') {
                            LightTableFilter.init();
                        }
                    });
                })(document);
            </script>
            <div class="row">
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2>Listado de <b>carpinteros</b></h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#insertCarp" id="btn_insCarp" class="btn btn-info"><i class="material-icons">&#xE147;</i> <span>Agregar Nuevo Carpintero</span></a>
                                        <!--<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>-->	
                                    </div>
                                </div>
                            </div>
                            
                            <table class="table table-striped table-hover order-table">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Correo electrónico</th>
                                        <th>Telefono</th>
                                        <th>Status</th>
                                        <th>Portafolio</th>
                                        <th>Editar</th>
                                        <th>Borrar</th>
                                    </tr>
                                </thead>
                                <?php
                                    $mysqli = getConn();
                                    $query = "SELECT * FROM red_carpinteros";
                                    $result = $mysqli->query($query);
                                    //  echo "<h2>$query</h2>";
                                ?>
                                <style type="text/css">
                                    .card-img:hover{
                                        opacity: 0.6;
                                    }
                                </style>
                                <tbody id="muestra">
                                    <?php
                                    while($row = $result->fetch_array(MYSQLI_ASSOC)){
                                        $status = $row['status'];?>
                                    <tr>
                                        <?php if (file_exists("fotos/foto_".$row['id_carpintero'].".jpg") == true){ ?> 
                                        <td>
                                            <a href="#modFotoCarp" id="editFotoCarp" value="<?php echo $row['id_carpintero']; ?>">
                                                <img src='fotos/foto_<?php echo $row['id_carpintero']?>.jpg' onmouseout="this.src='fotos/foto_<?php echo $row['id_carpintero']?>.jpg';" onmouseover="this.src='img/edit.png';" class='card-img'  style="width:60px; height:auto;">
                                            </a>
                                        </td>
                                        <?php } else{ ?>
                                        <td>
                                            <a href="#modFotoCarp" id="editFotoCarp" value="<?php echo $row['id_carpintero']; ?>">
                                                <img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' onmouseout="this.src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png';" onmouseover="this.src='img/edit.png';" class='card-img'>
                                            </a>
                                        </td>
                                        <?php } ?>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['telefono'] ?></td>
                                        <td style="text-align:center">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input active status" id="status-<?php echo $row['id_carpintero']; ?>" name="status[]" value="<?php echo $row['status']?>" <?php if($status == 1){ echo"checked"; }?>>
                                                <label class="custom-control-label" for="status-<?php echo $row['id_carpintero']; ?>"></label>
                                            </div>
                                        </td>

                                        <td style="text-align:center">
                                            <a href="#modFotoPorta" class="image" id="btn_porta" value="<?php echo $row['id_carpintero']; ?>">
                                                <i class="material-icons" data-toggle="tooltip" title="Editar portafolio">&#xe410</i>
                                            </a>
                                        </td>
                                        <td style="text-align:center">
                                            <a href="#editCarp" id="btn_edit" class="edit" value="<?php echo $row['id_carpintero']; ?>">
                                                <i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i>
                                            </a>
                                        </td>
                                        <td style="text-align:center">
                                            <a href="#deleteCarp" id="btn_delete" class="delete" value="<?php echo $row['id_carpintero']; ?>" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                                <!--
                                <div class="clearfix">
                                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a href="#">Previous</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    
                    <!-- MODAL EDITAR -->
                    <div id="editCarp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog"> 
                            <div class="modal-content">
                                <div id="formEdit">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN MODAL EDITAR -->
                        
                    
                    <!-- MODAL BORRAR -->
                    <div id="deleteCarp" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div id="formDelete">
                                    <form action="consultas/borrarCarp.php" method="POST">
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN MODAL BORRAR -->
                    
                    <!-- MODAL FOTO DE PERFIL -->
                    <div id="modFotoCarp" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div id="formFotoCarp">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN MODAL FOTO DE PERFIL -->
                    
                    <!-- MODAL FOTOS PORTAFOLIO -->
                    <div id="modFotoPorta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar portafolio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="formFotoPorta">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN MODAL FOTOS PORTAFOLIO -->
                    
                    <!-- MODAL CAMBIAR FOTOS DE PORTAFOLIO -->
                    <div id="modEditarPorta" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Cambiar fotos de portafolio</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <form action="consultas/insFotoPorta.php" method="POST" enctype="multipart/form-data">
                                    <div id="formInsFotoPorta">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- FIN MODAL CAMBIAR FOTOS DE PORTAFOLIO -->
                    
                    <!-- MODAL INSERTAR NUEVOS CARPINTEROS -->
                    <div id="insertCarp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog"> 
                            <div class="modal-content">
                                <div id="formInsert">
                                    <form id="insertCarp" method="POST" action="consultas/insertCarp.php" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Insertar un carpintero</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Foto de perfil</label>
                                                <input  id ="foto" name="foto" type="file" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Nombre completo</label>
                                                <input  id ="nombre" name="nombre" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Correo electrónico</label>
                                                <input id = "correo" name="correo" type="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Teléfono</label>
                                                <input id = "telefono" name="telefono" type="text" class="form-control">
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
                                            <input id="btn_insertar" btn_insertar name="btn_insertar" type="submit" class="btn btn-info" value="Agregar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN MODAL INSERTAR -->
                </div>
            </div>
        </div>
    </body>
</html>

<script src="js/buscar.js"></script>

<script type="text/javascript">
    var carpintero=0;
    var borrar=0;
    var actualizar=0;
    /*---------- BOTON INSERTAR NUEVO CARPINTERO ----------*/
    $(document).on('click','#btn_insCarp',function(){
        $('#insertCarp').modal('show');
    });
    /*---------- SWITCH CAMBIA SI CARPINTERO ESTA ACTIVO O NO ----------*/
    $('.status').on('click', function() {
        var valor=$(this).attr('id');
        var status=$(this).attr('value');
        item = valor.split("-");
        id_carp = item[1];
        //alert(id_carp + status);
        $.post("consultas/modificarStatus.php",{CARPINTERO:id_carp, STATUS:status},function(data){
            document.getElementById("mensaje").innerHTML=data.trim();
            location.reload();
        });
    });
    /*---------- BOTON ABRIR MODAL PARA EDITAR FOTO DE PERFIL DEL CARPINTERO ----------*/
    $(document).on('click','#editFotoCarp',function(){
        carpintero=$(this).attr('value');
        $.post("consultas/modalFotoCarp.php",{CARPINTERO:carpintero},function(data){
            $('#modFotoCarp').modal('show');
            document.getElementById("formFotoCarp").innerHTML=data.trim();
        });
    });
    /*---------- BOTON ABRIR EDITOR DE FOTOS DEL PORTAFOLIO ----------*/
    $(document).on('click','#btn_porta',function(){
        carpintero=$(this).attr('value');
        $.post("consultas/modalEditPorta.php",{CARPINTERO:carpintero},function(data){
            $('#modFotoPorta').modal('show');
            document.getElementById("formFotoPorta").innerHTML=data.trim();
        });
    });
    /*---------- BOTON CAMBIAR X FOTO ----------*/
    $(document).on('click','#btn_editPorta',function(){
        carpintero=$(this).attr('name');
        $.post("consultas/agregarFotosPorta.php",{CARPINTERO:carpintero},function(data){
            $('#modEditarPorta').modal('show');
            document.getElementById("formInsFotoPorta").innerHTML=data.trim();
        });
    });
    /*---------- BOTON ABRIR MODAL PARA EDITAR CAMPOS DEL CARPINTERO ----------*/
    $(document).on('click','#btn_edit',function(){
        carpintero=$(this).attr('value');
        $.post("consultas/modalMod.php",{CARPINTERO:carpintero},function(data){
            $('#editCarp').modal('show');
            document.getElementById("formEdit").innerHTML = data.trim();
        });
    });   
    /*---------- BOTON SUBMIT EDITAR DATOS DEL CARPINTERO ----------*/
    $(document).on('click',"#btn_actualizar", function(event){
        // es necesaria para que capte los campos
         event.preventDefault();
         $.ajax({
             url:"insert.php",
             method:"POST",
             data:$("#insertCarp").serialize(),
             beforeSend:function(){
                 //$('#insert').val("Inserting");
             },
             success:function(data){
                 $('#insertCarp')[0].reset();
                 $('#add_data_Modal').modal('hide');
                 //  $('#employee_table').html(data);
                 window.location='crud.php';
             }
         });       
    });
    /*---------- BOTON ABRIR MODAL PARA BORRAR CARPINTERO ----------*/
    $(document).on('click',"#btn_delete",function(){
        carpintero = $(this).attr('value');
        $.post("consultas/modalDel.php",{ CARPINTERO:carpintero},function(data){
            $('#deleteCarp').modal('show');
            document.getElementById("formDelete").innerHTML = data.trim();
            $(document).on('click',"#btn_borrar", function(){
                borrar = $(this).attr('name');
                $.post("consultas/borrarCarp.php",{CARPINTERO:carpintero, BORRAR:borrar}, function(data){
                    $('#deleteCarp').modal('hide');
                    if ($('.modal-backdrop').is(':visible')) {
                        $('body').removeClass('modal-open'); 
                        $('.modal-backdrop').remove();
                    };
                    document.getElementById("exito").innerHTML = data.trim();
                    location.reload();
                });
            });
        });
    });
    
</script>