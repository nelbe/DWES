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
        include_once 'Pizza.php';

        if (!isset($_SESSION[margarita])) {
            $_SESSION[margarita] = serialize(new Pizza('Margarita', 'mediana','pedida'));
            $_SESSION[cuatroQuesos] = serialize(new Pizza('Funghi', 'familiar', 'pedida'));
            $_SESSION[funghi] = serialize(new Pizza('Cuatro Quesos', 'mediana', 'pedida'));
        }
        
        $margarita = unserialize($_SESSION[margarita]);
        $cuatroQuesos = unserialize($_SESSION[cuatroQuesos]);
        $funghi = unserialize($_SESSION[funghi]);
        
        $margarita->sirve();
        
        echo $margarita;
        echo $cuatroQuesos;
        echo $funghi;
        
        echo Pizza::getNumPedidas();
        echo Pizza::getNumServidas();
        ?>

       
    </body>
</html>
