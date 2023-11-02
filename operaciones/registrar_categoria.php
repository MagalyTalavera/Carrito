<?php
include("../include/conexion.php");
//recibir la informacion

$cate=$_POST['categoria'];







    $consulta="INSERT INTO categoria(nombre)
VALUES ('$cate')";

$ejecutar= mysqli_query($conn, $consulta);

if ($ejecutar) {
    echo "Registro Exitoso";
}else {
    echo "Registro Fallido";

}
//mostrar la informacion

//echo $dni."<br>";
//echo $ape_nom."<br>";
//echo $correo."<br>";
//echo $telefono."<br>";
//echo $direccion."<br>";
//echo $fecha_naci."<br>";



?>

