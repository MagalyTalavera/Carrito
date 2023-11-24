<?php 
include("include/conexion.php");

$consulta="SELECT * FROM usuario";
$ejecutar = mysqli_query($conn, $consulta);
while ($respuesta = mysqli_fetch_array($ejecutar)) {
    //echo"<br>";
    echo $respuesta['dni']."   ".$respuesta['apellidos_nombres']."   ".$respuesta['correo']."   ".$respuesta['telefono']."   ".
    $respuesta['direccion']."   ".$respuesta['fecha_nacimiento']."   ".$respuesta['id_rol']."<br>";
    
}

?>