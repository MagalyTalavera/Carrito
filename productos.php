
<?php 
    // Lenguaje en php
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
                    <h4>Registrar Productos</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">

                        <form action="operaciones/registrar_producto.php" method="post"enctype="multipart/form-data">
                          


                        <div class="form-group row ">
                                <label class="col-lg-2 col-md-2 col-sm-12" for="">Codigo</label>
                                <input type="number"class="form-control col-lg-4 col-md-4 col-sm-12"  name="codigo"placeholder="Ingrese  el precio venta "required>

                            </div>






                            <div class="form-group row">
                            <label class="col-lg-2 col-md-2 col-sm-12" for="">Descripcion</label>
                            <input type="text"class="form-control ol-lg-10 col-md-10 col-sm-12"  name="descripcion"placeholder="Ingrese la descripcion  "required>

                            </div>

                            <div class="form-group row ">
                                <label class="col-lg-2 col-md-2 col-sm-12" for="">Detalle</label>
                                <input type="text"class="form-control col-lg-10 col-md-10 col-sm-12"  name="detalles"placeholder="Ingrese el detalle"required>

                            </div>









                            <div class="form-group row ">
                                <label class="col-lg-2 col-md-2 col-sm-12" for="">id_Categoria</label>
                                
                             <select name="categoria" class="form-control col-lg-4 col-md-4 col-sm-12" id="" type="file">
                           <optio value=""></optio>
                             <?php
                             $consulta_categoria="SELECT*FROM categoria";
                             $ejecutar= mysqli_query($conn, $consulta_categoria);
                             while($datos_categoria=mysqli_fetch_array($ejecutar)){?>
                            


                              <option value="<?php echo  $datos_categoria['id'];?>"><?php  echo $datos_categoria['nombre'];?></option>
                          
                     
                             <?php }?>
                            
                             </select>
                            </div>






                            <div class="form-group row ">
                                <label class="col-lg-2 col-md-2 col-sm-12" for="">Precio compra</label>
                                <input type="number"class="form-control col-lg-4 col-md-4 col-sm-12"  name="precio_compra"placeholder="Ingrese  el precio venta "required>

                            </div>


                            <div class="form-group row ">
                                <label class="col-lg-2 col-md-2 col-sm-12" for="">Precio Venta</label>
                                <input type="number"class="form-control col-lg-4 col-md-4 col-sm-12"  name="precio_venta"placeholder="Ingrese  el precio venta "required>

                            </div>




                            <div class="form-group row">
                                <label class="col-lg-2 col-md-2 col-sm-12">Stock</label>
                               
                                    <select name="stock" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    <option>Seleccione Estock </option>
                                    <option>1</option>
                                     <option>0</option>
                                      
  
                                      
                                    </select>
                                 </div>



                                 <div class="form-group row">
                                <label class="col-lg-2 col-md-2 col-sm-12">Estado</label>
                               
                                    <select name="estado" class="form-control col-lg-4 col-md-4 col-sm-12" required>
                                    <option>Seleccione Estado </option>
                                    <option>1</option>
                                    <option>2</option>
                                       
  
                                      
                                    </select>
                                 </div>



                          


                                 <div class="form-group row ">
                                <label class="col-lg-2 col-md-2 col-sm-12" for="">Imagen</label>
                                <input type="file"class="form-control col-lg-4 col-md-4 col-sm-12" accept="image/*"  name="img"   placeholder="Ingrese su Fecha de Nacimiento "required>

                            </div>







                            <div class="form-group row ">
                                <label class="col-lg-2 col-md-2 col-sm-12" for="">id_Proveedor</label>
                                
                             <select name="proveedor" class="form-control col-lg-4 col-md-4 col-sm-12" id="" type="file">
                           <optio value=""></optio>
                             <?php
                             $consulta_proveedor="SELECT*FROM proveedor";
                             $ejecutar= mysqli_query($conn, $consulta_proveedor);
                             while($datos_proveedor=mysqli_fetch_array($ejecutar)){?>
                            


                              <option value="<?php echo  $datos_proveedor['id'];?>"><?php  echo $datos_proveedor['razon_social'];?></option>
                          
                     
                             <?php }?>
                            
                             </select>
                            </div>








                    

                            <div class="form-group row ">
                                <label class="col-lg-2 col-md-2 col-sm-12" for=""></label>
                                <button type="submit" class="btn btn-primary ">Registrar</button>

                            </div>

                      
                      


                        </form>
                        </div>
                        
                    </div>

                    <div class="card">
                        <div class="card-body">

                        

                        
<!-- table -->
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

    <!-- App js -->
    <script src="plantilla/Admin/vertical/assets/js/theme.js"></script>

</body>

</html>