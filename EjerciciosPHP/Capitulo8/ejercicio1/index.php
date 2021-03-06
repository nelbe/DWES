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
        include_once 'DadoPoker.php';

        //Si no existe la sesión de tiradasTotales, se crean los 5 dados.
        if (!isset($_SESSION["tiradasTotales"])) {
            for ($i = 0; $i < 5; $i++) {
                //Aplano los onjetos para no hacer 5 sesiones
                $_SESSION['dado' . $i] = serialize(new DadoPoker());
            }
            $_SESSION['tiradasTotales'] = DadoPoker::getTiradasTotales();
        }

        DadoPoker::setTiradasTotales($_SESSION['tiradasTotales']);
        
        //Unserializo los 5 dados
        for ($i = 0; $i < 5; $i++) {
            $dado[$i] = unserialize($_SESSION['dado' . $i]);
        }
        
        echo "Dado anterior: ";
        for ($i = 0; $i < 5; $i++) {
            echo $dado[$i]->getFigura();
        }
        
        echo "<br>";
        
        echo "Dado lazado: ";
        for ($i = 0; $i < 5; $i++) {
            $dado[$i]->tira();
            echo $dado[$i]->getFigura();
        }
        
        //Pinto los 5 dados
        for ($i = 0; $i < 5; $i++) {
            $_SESSION['dado' . $i] = serialize($dado[$i]);
        }

        $_SESSION['tiradasTotales'] = DadoPoker::getTiradasTotales();
        
        echo "<br>";
        echo "Tiradas totales: " . $_SESSION['tiradasTotales'] . "<br>";
        ?>

    </body>
</html>

