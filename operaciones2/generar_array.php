<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIT = htmlspecialchars(trim($_POST["producto"]));
    $array = htmlspecialchars(trim($_POST["array_productos"]));

    // Codigo para buscar en tu base de datos acá

    include '../include/conexion.php';

    $consulta = "SELECT * FROM producto WHERE codigo='$NIT'";
    $resultado = mysqli_query($conn, $consulta);

    $r_b_producto = mysqli_fetch_array($resultado);
    $cont = mysqli_num_rows($resultado);

    if ($array == '') {
        $array = array();
    }
    if (count($array) > 0) {
        if (array_key_exists($r_b_producto['id'], $array)) {
            $array[$r_b_producto['id']] += 1;
        } else {
            $array[$r_b_producto['id']] = 1;
        }
    } else {
        $array[$r_b_producto['id']] = 1;
    }


    $cont = 0;
    $suma_total = 0;
    $tabla = "";
    foreach ($array as $key => $value) {
        $cont++;
        $tabla .= "<tr>";
        $importe = $r_b_producto['precio_venta']*$value;
        $suma_total += $importe;
        $tabla .= "<td>".$cont."</td><td>".$r_b_producto['descripcion']."</td><td>".$value."</td><td>".$r_b_producto['precio_venta']."</td><td>".$importe."</td>";
        $tabla .= "</tr>";
    }
    $tabla .= "<tr><td colspan='4' class='text-center'>TOTAL</td><td>".$suma_total."</td></tr>";



    echo json_encode([
        'array' => $array,
        'contenido' => $tabla
    ]);




/*


    $id_est = $dato['id'];
    $nombre = $dato['apellidos_nombres'];
    $pe = $dato['id_programa_estudios'];
    $sem = $dato['id_semestre'];

    if ($cont > 0) {
        echo json_encode([
            'id_est' => $id_est,
            'nombre' => $nombre,
            'pe'    => $pe,
            'sem'    => $sem
        ]);
    } else {
        echo json_encode([
            'nombre' => "",
            'pe'    => "",
            'sem'    => ""
        ]);
        // verificar codigo  ALERT--------------------------------------
    }*/
} else {
    echo "<p>No se encontro el producto</p>";
}
