<?php
include("include/conexion.php");
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
                        <h4>Registrar Ventas</h4>
                        <a href="venta.php" class="btn btn-success">+Nuevo</a>
                        <div class="card">
                            <div class="card-body">
                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                            <th >#</th>
                                            <th >serie_venta</th>
                                            <th >Numero Venta</th>
                                            <th >Fecha_Hora_venta</th>
                                            <th >monto Total</th>
                                            <th >id_cliente</th>
                                            <th >id_usuario</th>

                                            <th >Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $consulta="SELECT v.serie_venta,v.numero_venta,v.fecha_hora_venta,v.monto_total,cli.razon_social,u.apellidos_nombres FROM ventas v INNER JOIN cliente cli ON v.id_cliente=cli.id INNER JOIN usuario u ON v.id_usuario=u.id;";
                                        $ejecutar = mysqli_query($conn, $consulta);
                                        $contador=0;
                                        while ($respuesta = mysqli_fetch_array($ejecutar)) {
                                            $contador +=1;
                                            echo "<tr>";
                                            
                                            echo "<td>".$contador."</td>";
                                            echo "<td>".$respuesta['serie_venta']."</td>";
                                            echo "<td>".$respuesta['numero_venta']."</td>";
                                            echo "<td>".$respuesta['fecha_hora_venta']."</td>";
                                            echo "<td>".$respuesta['monto_total']."</td>";
                                            echo "<td>".$respuesta['razon_social']."</td>";/*id_cliente*/
                                            echo "<td>".$respuesta['apellidos_nombres']."</td>";/*id_usuario*/
                                            echo "<td><button class='btn btn-success'>Editar</button>  <button class='btn btn-success'>Eliminar</button></td>";


                                            echo "</tr>";
                                            
                                        }



                                        ?>
                              
                                    </tbody>
                                </table>

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

</body>

</html>