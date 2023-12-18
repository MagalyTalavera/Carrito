<?php
include('../include/conexion.php');
session_start();

$array_productos = $_SESSION['productos'];
$id = $_POST['producto'];
$cantidad = $_POST['cant'];


if (array_key_exists($id, $array_productos)) {

    $array_productos[$id] = $cantidad;
}

$cont = 0;
$suma_total = 0;
$tabla = "";
foreach ($array_productos as $key => $value) {
    $buscar_producto = "SELECT * FROM producto WHERE id='$key'";
    $ejec_b_producto = mysqli_query($conn, $buscar_producto);
    $r_b_producto = mysqli_fetch_array($ejec_b_producto);
    $cont++;
    $tabla .= "<tr>";
    $importe = $r_b_producto['precio_venta'] * $value;
    $suma_total += $importe;
    $tabla .= "<td>" . $cont . "</td><td>" . $r_b_producto['descripcion'] . "</td><td><input type='number' class='form-control' value='" . $value . "' ></td><td>" . $r_b_producto['precio_venta'] . "</td><td>" . $importe . "</td><td><button class='btn btn-danger'>X</button></td>";
    $tabla .= "</tr>";
}
$_SESSION['productos'] = $array_productos;

$tabla .= "<tr><td colspan='4' class='text-center'>TOTAL</td><td>" . $suma_total . "</td></tr>";
echo $tabla;
