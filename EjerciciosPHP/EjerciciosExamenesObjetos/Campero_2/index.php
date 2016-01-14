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
 
        if(!isset($_SESSION['camperos'])) {
            $_SESSION['camperos'] = array();
        }
        ?>
        
        <p>Elija su campero</p>
        <form action="#" method="post">
            <fieldset>
                <select name="tipoCampero">
                    <option value="1">De jamón</option>
                    <option value="2">De pollo</option>
                    <option value="3">Vegetal</option>       
                </select>
                <select name="tamanoCampero">
                    <option value="1">Grande</option>
                    <option value="2">Pequeño</option>      
                </select>
                <button type="submit" value="pedir" name="pedir">Pedir</button>
            </fieldset>
        </form> 
        <?php
         
        if (isset($_POST['pedir'])) {
             
            $tipoCampero = $_POST['tipoCampero'];
            $tamanoCampero = $_POST['tamanoCampero'];
             
            if($tipoCampero==1 && $tamanoCampero==1){
                $camperoUno= serialize(new Campero("Grande", "de jamón", "pedido"));
                $_SESSION['camperos'][] = $camperoUno;
                 
            }
            elseif($tipoCampero==1 && $tamanoCampero==2){
               $camperoDos = serialize( new Campero("Pequeño", "de jamóm", "pedido"));
               $_SESSION['camperos'][]= $camperoDos;
                
            }
            elseif($tipoCampero==2 && $tamanoCampero==1){
                $camperoTres = serialize(new Campero("Grande", "de pollo", "pedido"));
                $_SESSION['camperos'][]= $camperoTres;
                 
            }
            elseif($tipoCampero==2 && $tamanoCampero==2){
                $camperoCuatro = serialize(new Campero("Pequeño", "de pollo", "pedido"));
                $_SESSION['camperos'][]= $camperoCuatro;
                 
            }
            elseif($tipoCampero==3 && $tamanoCampero==1){
                $camperoCinco = serialize( new Campero("Grande", "vegetal", "pedido"));
                $_SESSION['camperos'][]= $camperoCinco;
                 
            }
            elseif($tipoCampero==3 && $tamanoCampero==2){
                $camperoSeis = serialize(new Campero("Pequeño", "vegetal", "pedido"));
                $_SESSION['camperos'][]= $camperoSeis;
                 
            }
        }
         
        foreach ($_SESSION['camperos'] as $c) {
            $auxCampero = unserialize($c); //Antes de usar los objetos
            echo $auxCampero;
        }
        
        ?>
    </body>
</html>