<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>

<?php
include_once 'Entradas.php';

if (!isset($_SESSION['zonas'])) {
    $_SESSION['zonas'] = array(
        $_SESSION[salaPrincipal] = serialize(new Entradas('Sala Principal', 1000, 35)),
        $_SESSION[compraVenta] = serialize(new Entradas('Compra-Venta', 200, 40)),
        $_SESSION[vip] = serialize(new Entradas('Zona Vip', 25, 50)));
}

$salaPrincipal = unserialize($_SESSION[salaPrincipal]);
$compraVenta = unserialize($_SESSION[compraVenta]);
$vip = unserialize($_SESSION[vip]);

/*for ($i = 0; $j < $i; $j++) {
    $zona[$i] = unserialize($_SESSION['zona' . $i]);
    echo "hola";
}*/

?>

        <p>Crea una nueva zona</p>
        <form action="#" method="post">
            <fieldset>
                Nombre de la zona: <input type="text" name="nombreZona">
                Numero de entradas: <input type="number" min="1" name="tamanoPizza">
                <button type="submit" value="pedir" name="nuevaZona">Crear Zona</button>
            </fieldset>
        </form> 
<?php

$i = 1;
if (isset($_POST['nuevaZona'])) {
    $i++;
    $nombreZona = $_POST['nombreZona'];
    $tamanoPizza = $_POST['tamanoPizza'];
    $_SESSION['zona' . $i] = serialize(new Entradas($nombreZona, $tamanoPizza));  
    $_SESSION['zonas'][] = $_SESSION['zona' . $i] = serialize(new Entradas($nombreZona, $tamanoPizza));
}

foreach ($_SESSION['zonas'] as $p) {
    //$zona[$i] = unserialize($_SESSION['zona' . $i]);
    $auxZona = unserialize($p); //Antes de usar los objetos
    echo $auxZona;
}

echo "Esto es una prueba" . $vip->getEntradasDisponibles(); //Este si funciona
echo "Esto es una prueba" .  $zona[2]->getEntradasDisponibles(); //Este no funciona
?>
    </body>
</html>
