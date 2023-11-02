<?php
include("../include/conexion.php");
//recibir la informacion

$dni=$_POST['dni'];
$ape_nom=$_POST['ape_nom'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$fecha_naci=$_POST['fecha_naci'];
$id_rol=$_POST['rol'];



$nombre_archivo = $dni.".jpg";
$ruta_foto= "../img_usuarios/".$nombre_archivo;

$pass_secure = password_hash($dni, PASSWORD_DEFAULT);


if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_foto)) {
    $consulta="INSERT INTO usuario(dni, apellidos_nombres, correo, telefono, direccion, fecha_nacimiento, password, id_rol, foto, activo, reset_password, token_password)
VALUES ('$dni', '$ape_nom', '$correo', '$telefono', '$direccion', '$fecha_naci', '$pass_secure','$id_rol','$nombre_archivo ',1,0,'')";

$ejecutar= mysqli_query($conn, $consulta);

if ($ejecutar) {
    echo "Registro Exitoso";
}else {
    echo "Registro Fallido";
}
}else {
    echo "error al subir la foto";
}

//mostrar la informacion

//echo $dni."<br>";
//echo $ape_nom."<br>";
//echo $correo."<br>";
//echo $telefono."<br>";
//echo $direccion."<br>";
//echo $fecha_naci."<br>";



?>