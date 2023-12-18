<?php
session_start();
$array_productos = $_SESSION['productos'];

include('../include/conexion.php');

$dni_cliente = $_POST['dni'];
$id_usuario = $_POST['usuario'];

$fecha_hora = date('Y-m-d H:i:s');

$serie = "B002";

$buscar_ventas = "SELECT * FROM ventas ORDER BY numero_venta DESC LIMIT 1";
$ejecutar = mysqli_query($conn, $buscar_ventas);
$ultima_venta = mysqli_fetch_array($ejecutar);

$numero = $ultima_venta['numero_venta'] + 1;

$b_cliente = "SELECT * FROM cliente WHERE ruc_dni='$dni_cliente'";
$ejecutar_cliente = mysqli_query($conn, $b_cliente);
$cliente = mysqli_fetch_array($ejecutar_cliente);

$id_cliente = $cliente['id'];

//calcular monto total de venta
$monto_total_venta = 0;
foreach ($array_productos as $key => $value) {
    $consulta = "SELECT * FROM producto WHERE id='$key'";
    $ejecutar = mysqli_query($conn, $consulta);
    $producto = mysqli_fetch_array($ejecutar);
    $importe = $producto['precio_venta'] * $value;
    $monto_total_venta +=$importe;
}



$registrar_venta = "INSERT INTO ventas (serie_venta, numero_venta, fecha_hora_venta,monto_total	,id_cliente,id_usuario) VALUES('$serie','$numero','$fecha_hora','$monto_total_venta','$id_cliente','$id_usuario')";
$ejecutar_venta = mysqli_query($conn, $registrar_venta);

if($ejecutar_venta){


    echo"REGISTRO DE VENTA EXITOSA";
}else{

    echo"REGISTRO FALLIDO";
}

$buscar_ventas = "SELECT * FROM ventas ORDER BY id DESC LIMIT 1";
$ejecutar = mysqli_query($conn, $buscar_ventas);
$ultima_venta = mysqli_fetch_array($ejecutar);
$id_venta = $ultima_venta['id'];

foreach ($array_productos as $key => $value) {
    $consulta = "SELECT * FROM producto WHERE id='$key'";
    $ejecutar = mysqli_query($conn, $consulta);
    $producto = mysqli_fetch_array($ejecutar);
    $importe = $producto['precio_venta'] * $value;

    $consulta = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, descuentos, importe) VALUES ('$id_venta','$key','$value','','$importe')";
    if (mysqli_query($conn, $consulta)) {
        $nuevo_stock = $producto['stock'] - $value;
       $consulta = "UPDATE producto SET stock='$nuevo_stock' WHERE id='$key'";
       $ejecutar = mysqli_query($conn, $consulta);
    }

}