<?php
include("../include/conexion.php");

$dni = $_POST['dni_c'];

$consulta = "SELECT * FROM cliente WHERE ruc_dni='$dni'";
$ejecutar = mysqli_query($conn, $consulta);
$cliente = mysqli_fetch_array($ejecutar);

echo '<input type="text" class="form-control col-lg-6 col-md-6 col-sm-12" readonly value="'.$cliente['razon_social'].'">';