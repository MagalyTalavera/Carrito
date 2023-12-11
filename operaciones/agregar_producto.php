<?php
session_start();
include("../include/conexion.php");

$codigo = $_POST['cod'];
$array_productos= $_SESSION['productos'];

$consulta = "SELECT * FROM producto WHERE codigo='$codigo'";
$ejecutar =mysqli_query($conn,$consulta);
$producto = mysqli_fetch_array($ejecutar);
$id = $producto['id'];
$contar_r = mysqli_num_rows($ejecutar);
if ($contar_r > 0) {
    $array_productos[$id] = 1;

    if (array_key_exists($array_productos[$id], $array_productos)) {
        $array_productos[$id] +=1;
    }else {
        $array_productos[$id] =1;
    }
}
print_r($array_productos);
?>