<?php

$lista=array('jhony','Laura','Juan','Zandra','Liliana','Deysi','Raul','Zamira','Rosilda',
'Bruno','Jerson','Denisse','Aaron','Magaly');
$contar=count($lista);
print_r($lista);
/*for ($i=0; $i <= $contar; $i++) { 
    echo $lista[$i]."<br>";

}*/
echo "<br>";

array_push($lista, 'Malu');
$contar=count($lista);
for ($i=0; $i <= $contar; $i++) { 
    echo $lista[$i]."<br>";

}


include("include/conexion.php");

$lista3 = array();

$consulta ="SELECT * FROM producto";
$ejecutar =mysqli_query($conn, $consulta);
while ($r_ejecutar = mysqli_fetch_array($ejecutar)) {
    $lista3[$r_ejecutar['id']] = $r_ejecutar['descripcion'];

}

print_r($lista3);

?>