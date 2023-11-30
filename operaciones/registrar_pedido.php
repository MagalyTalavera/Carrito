<?php
include("../include/conexion.php");
//recibir la informacion

$id_cliente=$_POST['id_cliente'];
$fe_h_pedi=$_POST['fecha_h_pedi'];
$fec_entrega=$_POST['fecha_entrega'];
$met_p=$_POST['metodo_p'];
$monto=$_POST['monto'];
$comprob=$_POST['comprobante'];
$estado=$_POST['estado'];



    $consulta="INSERT INTO pedidos(id_cliente,fecha_hora_pedido,fecha_entrega,metodo_pago,monto,comprobante,estado)
    VALUES ('$id_cliente','$fe_h_pedi','$fec_entrega','$met_p','$monto','$comprob','$estado')";

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