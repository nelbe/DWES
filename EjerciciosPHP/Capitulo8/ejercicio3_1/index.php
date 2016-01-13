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
            $_SESSION[salaPrincipal] = serialize(new Entradas('Sala Principal', 1000, 35));
            $_SESSION[compraVenta] = serialize(new Entradas('Compra-Venta', 200, 40));
            $_SESSION[vip] = serialize(new Entradas('Zona Vip', 25, 50));
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
                <button type="submit" value="Enviar" name="formPrincipal">Enviar</button>
            </fieldset>
        </form>    
            <?php
            $formPrincipal=$_POST['formPrincipal'];
            $zona = $_POST['zona'];
            $entradasComprar = $_POST['entradasComprar'];
            
            if (isset($formPrincipal)) {
                if ($zona==1){
                   echo "Va a comprar: " .  $entradasComprar . " entradas. <br>";
                   $salaPrincipal->precio($entradasComprar);
                   echo "El precio de las entradas es: " . $salaPrincipal->getPrecioPagar() . " €.<br><br>"; 
                    
                   ?>
            
                    <form action="#" method="post">
                    ¿Desea comprarlas?
                    <fieldset>
                        <input type="hidden" name="entradasComprar" value="<?php echo $entradasComprar; ?>">
                        <select name="elegir">
                            <option value="1">Si</option>
                            <option value="2">No</option>      
                        </select>
                        <button type="submit" value="Enviar" name="formSP">Enviar</button>
                    </fieldset>
                    </form>
                    <?php    
                }
                if ($zona==2){
                   echo "Va a comprar: " .  $entradasComprar . " entradas. <br>";
                   $compraVenta->precio($entradasComprar);
                   echo "El precio de las entradas es: " . $compraVenta->getPrecioPagar() . " €.<br><br>"; 
                   
                   ?>
            
                    <form action="#" method="post">
                    ¿Desea comprarlas?
                    <fieldset>
                        <input type="hidden" name="entradasComprar" value="<?php echo $entradasComprar; ?>">
                        <select name="elige">
                            <option value="1">Si</option>
                            <option value="2">No</option>      
                        </select>
                        <button type="submit" value="Enviar" name="formCV">Enviar</button>
                    </fieldset>
                    </form>
                    <?php
                   
                } 
                if ($zona==3){
                   echo "Va a comprar: " .  $entradasComprar . " entradas. <br>";
                   $vip->precio($entradasComprar);
                   echo "El precio de las entradas es: " . $vip->getPrecioPagar() . " €.<br><br>"; 
                   
                   ?>
            
                    <form action="#" method="post">
                    ¿Desea comprarlas?
                    <fieldset>
                        <input type="hidden" name="entradasComprar" value="<?php echo $entradasComprar; ?>">
                        <select name="eligeUno">
                            <option value="1">Si</option>
                            <option value="2">No</option>      
                        </select>
                        <button type="submit" value="Enviar" name="formV">Enviar</button>
                    </fieldset>
                    </form>
                    <?php
                } 
            }       
            
                //Para el formulario SalaPrincipal
                    $formSP=$_POST[formSP];
                    $elegir = $_POST[elegir];
                    $entradasComprar = $_POST['entradasComprar'];
            
                    if (isset($formSP)) {
                        if($elegir==1){
                            $salaPrincipal->venta($entradasComprar);
                            echo "Las has comprado. <br>";
                        }else{
                            echo "No las has comprado. <br>";
                        }
                    }
                
                //Para el formulario Compra-Venta   
                    $formCV=$_POST[formCV];
                    $elige = $_POST[elige];
                    $entradasComprar = $_POST['entradasComprar'];
            
                    if (isset($formCV)) {
                        if($elige==1){
                            $compraVenta->venta($entradasComprar);
                            echo "Las has comprado. <br>";
                        }else{
                            echo "No las has comprado. <br>";
                        }
                    }
                //Para el formulario Sala Vip
                    $formV=$_POST[formV];
                    $eligeUno = $_POST[eligeUno];
                    $entradasComprar = $_POST['entradasComprar'];
            
                    if (isset($formV)) {
                        if($eligeUno==1){
                            $vip->venta($entradasComprar);
                            echo "Las has comprado. <br>";
                        }else{
                            echo "No las has comprado. <br>";
                        }
                    }
                    
                    
                    
                $_SESSION[salaPrincipal] = serialize($salaPrincipal);
                $_SESSION[compraVenta] = serialize($compraVenta);
                $_SESSION[vip] = serialize($vip);
            
            echo $salaPrincipal;
            echo $compraVenta;
            echo $vip;
            ?>

    </body>
</html>



              