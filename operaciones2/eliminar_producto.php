<?php
include("../include/conexion.php");

$idReg= $_REQUEST["id_borrar"];

$sql="DELETE FROM producto WHERE codigo=$idReg";

$resultadoD = mysqli_query($conn, $sql);
?>
