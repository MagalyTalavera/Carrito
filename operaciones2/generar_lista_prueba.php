<!-- Script obtenido desde CDN jquery -->

<?php
include('../include/conexion.php');
session_start();

$array_productos = $_SESSION['productos'];
$producto = $_POST['elemento'];

$buscar_producto = "SELECT * FROM producto WHERE codigo='$producto'";
$ejec_b_producto = mysqli_query($conn, $buscar_producto);
$cont_r = mysqli_num_rows($ejec_b_producto);


if ($cont_r > 0) {
    $r_b_producto = mysqli_fetch_array($ejec_b_producto);
    if ($array_productos=='') {
        $array_productos = array();
    }
    //si ya existe un producto agregado
    if (array_key_exists($r_b_producto['id'], $array_productos)) {
        $cant = $array_productos[$r_b_producto['id']];
        $cant = $cant + 1;
        $array_productos[$r_b_producto['id']] = $cant;
    }else {
        $array_productos[$r_b_producto['id']] = 1;
    }
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
        $importe = $r_b_producto['precio_venta']*$value;
        $suma_total += $importe;
        $tabla .= "<td>".$cont."</td><td>".$r_b_producto['descripcion']."</td><td><input type='number' class='form-control' value='".$value."' ></td><td>".$r_b_producto['precio_venta']."</td><td>".$importe."</td>
        <td><button class='btn btn-danger' onclick='eliminar_productos(".$key.");'>Eliminar</button></td>";
        $tabla .= "</tr>";
    }
    $_SESSION['productos'] = $array_productos;
    
    $tabla .= "<tr><td colspan='4' class='text-center'>TOTAL</td><td>".$suma_total."</td></tr>";
    echo $tabla;



?>

<!-- Script obtenido desde CDN jquery -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>