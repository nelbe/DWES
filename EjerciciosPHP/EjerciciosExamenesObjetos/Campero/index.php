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
        include_once 'Campero.php';

            $camperoUno = new Campero('Mediano', 'de jamón','pedido');
            $camperoDos = new Campero('Mediano', 'de pollo', 'pedido');
            $camperoTres = new Campero('Grande', 'vegetal', 'pedido');
        

        
        $camperoUno->sirve();
        $camperoTres->sirve();
        
        echo $camperoUno;
        echo $camperoDos;
        echo $camperoTres;
        
        echo Campero::getNumPedidos();
        echo Campero::getNumServidos();
        ?>

       
    </body>
</html>
