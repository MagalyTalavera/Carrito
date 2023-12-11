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



?>