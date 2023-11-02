<?php
include("../include/conexion.php");
//recibir la informacion

$ruc=$_POST['ruc'];
$razon=$_POST['nombre'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$metodo=$_POST['m_p'];



    $consulta="INSERT INTO proveedor(ruc,razon_social,correo,telefono,direccion,metodo_pago)
    VALUES ('$ruc','$razon','$correo','$telefono','$direccion','$metodo')";

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

