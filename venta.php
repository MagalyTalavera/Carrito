<?php
include("include/conexion.php");
session_start();
$_SESSION['productos']=array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link href="plantilla/Admin/vertical/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/vertical/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/vertical/assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="plantilla/Admin/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- Script obtenido desde CDN jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <style>
        .cantidad{
            width: 3em;
        }
    </style>
</head>
<body>
    <?php 
    // Lenguaje en php
    include("include/menu.php");

    ?>

    <!-- INICIO DE CONTENIDO -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h4>Registrar Nueva Venta</h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                    <form action="operaciones/registrar_ventas.php" method="POST">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-12" >DNI:</label>
                                        <input type="number" name="dni" class="form-control col-lg-4 col-md-4 col-sm-12" required placeholder="dni cliente">
                                        <button class="btn btn-info col-lg-2 col-md-2 col-sm-4" >Buscar</button>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-12" >Apellidos y Nombres: </label>
                                        <input type="text" id="nombres" class="form-control col-lg-8 col-md-8 col-sm-12" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-12" >Usuario:</label>
                                        <select name="usuario" id="usuario" class="form-control col-lg-8 col-md-8 col-sm-12">
                                        <option></option>
                                            <?php
                                            $b_roles = "SELECT * FROM usuario";
                                            $r_b_roles = mysqli_query($conn, $b_roles);
                                            while ($datos_roles = mysqli_fetch_array($r_b_roles)) {?>
                                                <option value="<?php echo $datos_roles['id'];?>"><?php echo $datos_roles['apellidos_nombres'];?></option>
                                            <?php }?>                                         
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-12" >Producto:</label>
                                        <input type="number" name="producto" id="producto" class="form-control col-lg-4 col-md-4 col-sm-12" required placeholder="Codigo producto">
                                        <button type="button" class="btn btn-info col-lg-2 col-md-2 col-sm-4" onclick="agregar_producto();">Agregar</button>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-md-4 col-sm-12" >Fecha y Hora: </label>
                                        <label for="" class=" form-control col-lg-4 col-md-4 col-sm-12" >
                                            <?php date_default_timezone_set("America/Lima"); echo date("d-m-y h:i:s");?>
                                        </label>
                                    </div>                                  
                                    </form>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th colspan="5" class="text-center">PRODUCTOS</th>
                                                </tr>
                                                <tr>
                                                    <th width="5%">Nro</th>
                                                    <th width="60%">Descripción</th>
                                                    <th width="10%">Cantidad</th>
                                                    <th width="10%">P.unit.</th>
                                                    <th width="10%">Importe</th>
                                                    <th width="5%"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="contenido_tabla">
                                                <?php
                                                $array_productos=$_SESSION['productos'];
                                                //$key=id $value=cantidad
                                                foreach ($array_producto as $key => $value) {
                                                    $consulta = "SELECT * FROM producto WHERE id='$key'";
                                                    $ejecutar = mysqli_query($conn,$consulta);
                                                    $producto =mysqli_fetch_array($ejecutar);
                                                
                                                ?>
                                                <tr>
                                                    <td>1</td>
                                                    <td>nombre producto</td>
                                                    <td><input type="number" value="2" class="cantidad" onchange="actualizar_cantidad(id);"></td>
                                                    <td>s/. 50.00</td>
                                                    <td>s/. 100.00</td>
                                                    <td><button type="submit" class="btn btn-danger" onclick="eliminar_produdcto(id);">X</button></td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">TOTAL</td>
                                                    <td>s/. 100.00</td>
                                                </tr>

                                            </tbody>
                                        </table>                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- FIN DE CONTENIDO -->


    <!-- jQuery  -->
    <script src="plantilla/Admin/vertical/assets/js/jquery.min.js"></script>
    <script src="plantilla/Admin/vertical/assets/js/bootstrap.bundle.min.js"></script>
    <script src="plantilla/Admin/vertical/assets/js/metismenu.min.js"></script>
    <script src="plantilla/Admin/vertical/assets/js/waves.js"></script>
    <script src="plantilla/Admin/vertical/assets/js/simplebar.min.js"></script>

    <!-- third party js -->
    <script src="plantilla/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="plantilla/Admin/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/buttons.html5.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/buttons.flash.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/buttons.print.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/dataTables.select.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/pdfmake.min.js"></script>
    <script src="plantilla/Admin/plugins/datatables/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="plantilla/Admin/vertical/assets/pages/datatables-demo.js"></script>

    <!-- App js -->
    <script src="plantilla/Admin/vertical/assets/js/theme.js"></script>

    <script>
        function agregar_producto(){
            var codigo = $('#producto').val();
            $.ajax({
                type: "POST",
                url: "operaciones/agregar_producto.php",
                data: {cod: codigo},
                success: function(r) {
                    $('#contenido_tabla').html(r);
                    
                }
            })

        }
        function actualiuzar_cantidad(id) {
            
        }
        function eliminar_producto(id){

        }
    </script>

</body>

</html>