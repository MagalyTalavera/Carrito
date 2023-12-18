<?php
session_start();
include("../include/conexion.php");

$codigo = $_POST['cod'];
$array_productos = $_SESSION['productos'];

$consulta = "SELECT * FROM producto WHERE codigo='$codigo'";
$ejecutar = mysqli_query($conn, $consulta);
$producto = mysqli_fetch_array($ejecutar);
$id = $producto['id'];
$contar_r = mysqli_num_rows($ejecutar);

if ($producto['stock']>0) {
    if ($contar_r > 0) {

        if (array_key_exists($id, $array_productos)) {
            $cantidad = $array_productos[$id];
            $cantidad = $cantidad+1;
            $array_productos[$id] = $cantidad;
        }else {
            $array_productos[$id] = 1;
        }
        $_SESSION['productos'] = $array_productos;
    }
}


$contador = 0;
$suma_total = 0;
$para_imprimir = '';
foreach ($array_productos as $key => $value) {
    $contador++;
    $consulta = "SELECT * FROM producto WHERE id='$key'";
    $ejecutar = mysqli_query($conn, $consulta);
    $producto = mysqli_fetch_array($ejecutar);

    $importe = $producto['precio_venta'] * $value;
    $para_imprimir .='<tr>
    <td>'.$contador.'</td>
    <td>'.$producto['descripcion'].'</td>
    <td><input type="number" id="cantidad_'.$key.'" value="'.$value.'" class="cantidad" onchange="actualizar_cantidad('.$key.');" min="1" max="'.$producto['stock'].'"></td>
    <td>S/. '.$producto['precio_venta'].'</td>
    <td>S/. '.$importe.'</td>
    <td><button class="btn btn-danger" onclick="eliminar_producto('.$key.');">hhh</button></td>
</tr>';
$suma_total += $importe;
}
$para_imprimir.='<tr>
<td colspan="4" class="text-center">TOTAL</td>
<td>S/. '.$suma_total.'</td>
</tr>';

echo $para_imprimir;


