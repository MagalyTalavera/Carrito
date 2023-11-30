
<?php 
    include("include/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="plantilla/Admin/vertical/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/vertical/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/vertical/assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="plantilla/Admin/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plantilla/Admin/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />   
    <link rel="shortcut icon" href="carrito.png">
</head>

<body>
<?php 
    // Lenguaje en php
    include("include/menu.php");

    ?>

     <!---INICIO DE CONTENIDO--->
<div class="main-content">
   <div class="page-content">
       <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-10">
                      <?php include("include/modal_fm_reg_prod.php");?>
                      <h4>Registrar Productos</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nº</th>
                                            <th>CODIGO</th>
                                            <th>DESCRIPCION</th>
                                            <th>DETALLE</th>
                                            <th>ID CATEGORIA</th>
                                            <th>PRECIO DE COMPRA</th>
                                            <th>PRECIO DE VENTA</th>
                                            <th>STOCK</th>
                                            <th>ESTADO</th>
                                            <th>IMAGEN</th>
                                            <th>ID PROVEEDOR</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $consulta="SELECT p.id,p.codigo,p.descripcion,p.detalle,c.nombre,p.precio_compra,p.precio_venta,p.stock,p.estado,p.imagen,pro.razon_social FROM producto p INNER JOIN categoria c ON p.id_categoria=c.id INNER JOIN proveedor pro ON p.id_proveedor=pro.id;";
                                        $ejecutar = mysqli_query($conn, $consulta);
                                        $contador=0;
                                        while ($respuesta = mysqli_fetch_array($ejecutar)) {
                                            $contador +=1;
                                            echo "<tr>";
                                            
                                            echo "<td>".$contador."</td>";
                                            echo "<td>".$respuesta['codigo']."</td>";
                                            echo "<td>".$respuesta['descripcion']."</td>";
                                            echo "<td>".$respuesta['detalle']."</td>";
                                            echo "<td>".$respuesta['nombre']."</td>";/*id_categoria*/ 
                                            echo "<td>".$respuesta['precio_compra']."</td>";
                                            echo "<td>".$respuesta['precio_venta']."</td>";
                                            echo "<td>".$respuesta['stock']."</td>";
                                            echo "<td>".$respuesta['estado']."</td>";
                                            echo "<td>".$respuesta['imagen']."</td>";
                                            echo "<td>".$respuesta['razon_social']."</td>";/*id_proveedor*/
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





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

     <!---FIN DE CONTENIDO-->
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