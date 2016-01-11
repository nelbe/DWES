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

        if (!isset($_SESSION[salaPrincipal])) {
            $_SESSION[salaPrincipal] = serialize(new Entradas('Sala Principal', 1000));
            $_SESSION[compraVenta] = serialize(new Entradas('Compra-Venta', 200));
            $_SESSION[vip] = serialize(new Entradas('Zona Vip', 25));
        }
        
        $salaPrincipal = unserialize($_SESSION[salaPrincipal]);
        $compraVenta = unserialize($_SESSION[compraVenta]);
        $vip = unserialize($_SESSION[vip]);
        
        ?>

        <form action="#" method="post">
            ¿Cuantas entradas desea comprar?
            <fieldset>
                <input type="number" name="entradasComprar" min="1" value="1">
                <select name="zona">
                    <option value="1">Sala Principal</option>
                    <option value="2">Compra-Venta</option>
                    <option value="3">Zona Vip</option>       
                </select>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>    
            <?php
            
            $zona = $_POST['zona'];
            $entradasComprar = $_POST['entradasComprar'];
            if (isset($_POST[zona])) {
                if ($zona==1){
                    $salaPrincipal->venta($entradasComprar);
                } 
                if ($zona==2){
                   $compraVenta->venta($entradasComprar);
                } 
                if ($zona==3){
                   $vip->venta($entradasComprar);
                } 
                
                $_SESSION[salaPrincipal] = serialize($salaPrincipal);
                $_SESSION[compraVenta] = serialize($compraVenta);
                $_SESSION[vip] = serialize($vip);
            }
            
            echo $salaPrincipal;
            echo $compraVenta;
            echo $vip;
            ?>

    </body>
</html>
