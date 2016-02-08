<?php

require('config.php');

$query_num_articulos = mysql_query("SELECT * FROM articulosBin", $conexion);
$num_total_registros = mysql_num_rows($query_num_articulos);

//Si hay registros
if ($num_total_registros > 0) {
    //numero de registros por página
    $rowsPerPage = 3;

    //por defecto mostramos la página 1
    $pageNum = 1;

    // si $_GET['page'] esta definido, usamos este número de página
    if (isset($_GET['page'])) {
        sleep(1);
        $pageNum = $_GET['page'];
    }

    //echo 'page'.$_GET['page'];
    //contando el desplazamiento
    $offset = ($pageNum - 1) * $rowsPerPage;
    $total_paginas = ceil($num_total_registros / $rowsPerPage);
    
    
    $query_articulos = mysql_query("SELECT codigo, nombre, descripcion FROM articulosBin ORDER BY codigo DESC LIMIT $offset, $rowsPerPage", $conexion);
    while ($resultado = mysql_fetch_array($query_articulos)) {
        //$service = new Service($resultado['service_id']);

        $descripcion_desformateada = strip_tags($resultado['descripcion']);
        $arrayTexto = split(' ', $descripcion_desformateada);
        $texto = '';
        $contador = 0;

        // Reconstruimos la cadena
        while (300 >= strlen($texto) + strlen($arrayTexto[$contador])) {
            $texto .= ' ' . $arrayTexto[$contador];
            $contador++;
        }
        $p_desc = $texto . '...<br>';

        echo "<b>" . $resultado['nombre']. "</b>" . $resultado['codigo'] . $resultado['descripcion'];
    }

    if ($total_paginas > 1) {
        echo '<div class="pagination">';
        echo '<ul>';
        if ($pageNum != 1)
            echo '<li><a class="paginate" data="' . ($pageNum - 1) . '">Anterior</a></li>';
        for ($i = 1; $i <= $total_paginas; $i++) {
            if ($pageNum == $i)
            //si muestro el índice de la página actual, no coloco enlace
                echo '<li class="active"><a>' . $i . '</a></li>';
            else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
                echo '<li><a class="paginate" data="' . $i . '">' . $i . '</a></li>';
        }
        if ($pageNum != $total_paginas)
            echo '<li><a class="paginate" data="' . ($pageNum + 1) . '">Siguiente</a></li>';
        echo '</ul>';
        echo '</div>';
    }
}