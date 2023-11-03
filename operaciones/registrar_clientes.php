<?php
include("../include/conexion.php");
//recibir la informacion

$ruc=$_POST['ruc'];
$razon=$_POST['nombre'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$direccion=$_POST['direccion'];
$d_e=$_POST['d_e'];



    $consulta="INSERT INTO cliente(ruc_dni,razon_social,telefono,correo,direccion,direccion_envio)
    VALUES ('$ruc','$razon','$correo','$telefono','$direccion','$d_e')";

$ejecutar= mysqli_query($conn, $consulta);


if ($ejecutar) {
    echo "Registro exitoso";
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

