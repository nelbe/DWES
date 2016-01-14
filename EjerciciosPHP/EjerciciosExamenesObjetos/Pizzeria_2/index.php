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
 
        if(!isset($_SESSION['pizzas'])) {
            $_SESSION['pizzas'] = array();
        }
        ?>
        
        <p>Elija su pizza</p>
        <form action="#" method="post">
            <fieldset>
                <select name="tipoPizza">
                    <option value="1">Margarita</option>
                    <option value="2">Cuatro Quesos</option>
                    <option value="3">Fungui</option>       
                </select>
                <select name="tamanoPizza">
                    <option value="1">Mediana</option>
                    <option value="2">Familiar</option>      
                </select>
                <button type="submit" value="pedir" name="pedir">Pedir</button>
            </fieldset>
        </form> 
        <?php
         
        if (isset($_POST['pedir'])) {
             
            $tipoPizza = $_POST['tipoPizza'];
            $tamanoPizza = $_POST['tamanoPizza'];
             
            if($tipoPizza==1 && $tamanoPizza==1){
                $pizzaUno= serialize(new Pizza("Margarita", "mediana", "pedida"));
                $_SESSION['pizzas'][] = $pizzaUno;
                 
            }
            elseif($tipoPizza==1 && $tamanoPizza==2){
               $pizzaDos = serialize( new Pizza("Margarita", "familiar", "pedida"));
               $_SESSION['pizzas'][]= $pizzaDos;
                
            }
            elseif($tipoPizza==2 && $tamanoPizza==1){
                $pizzaTres = serialize(new Pizza("Cuatro Quesos", "mediana", "pedida"));
                $_SESSION['pizzas'][]= $pizzaTres;
                 
            }
            elseif($tipoPizza==2 && $tamanoPizza==2){
                $pizzaCuatro = serialize(new Pizza("Cuatro Quesos", "familiar", "pedida"));
                $_SESSION['pizzas'][]= $pizzaCuatro;
                 
            }
            elseif($tipoPizza==3 && $tamanoPizza==1){
                $pizzaCinco = serialize( new Pizza("Funghi", "mediana", "pedida"));
                $_SESSION['pizzas'][]= $pizzaCinco;
                 
            }
            elseif($tipoPizza==3 && $tamanoPizza==2){
                $pizzaSeis = serialize(new Pizza("Funghi", "familiar", "pedida"));
                $_SESSION['pizzas'][]= $pizzaSeis;
                 
            }
        }
         
        foreach ($_SESSION['pizzas'] as $p) {
            $auxPizza = unserialize($p);
            echo $auxPizza;
        }
        ?>
    </body>
</html>