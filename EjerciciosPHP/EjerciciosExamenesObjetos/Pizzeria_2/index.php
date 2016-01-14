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
        
        if(!isset($_SESSION[pizzas])) {
            $_SESSION[pizzas] = serialize(array());
        }

        $pizzas = unserialize($_SESSION[pizzas]);
          
        
        ?>
        <form action="#" method="post">
            Elija su pizza
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
        
        $tipoPizza = $_POST['tipoPizza'];
        $tamanoPizza = $_POST['tamanoPizza'];
        $pedir = $_POST['pedir'];
        
        if (isset($pedir)) {
            
            if($tipoPizza==1 && $tamanoPizza==1){
                $pizzaUno= serialize(new Pizza("Margarita", "mediana", "pedida"));
                $pizzas[] = $pizzaUno;
            }
            elseif($tipoPizza==1 && $tamanoPizza==2){
               $pizzaDos = serialize( new Pizza("Margarita", "familiar", "pedida"));
               $pizzas[]= $pizzaDos;
            }
            
            elseif($tipoPizza==2 && $tamanoPizza==1){
                $pizzaTres = serialize(new Pizza("Cuatro Quesos", "mediana", "pedida"));
                $pizzas[]= $pizzaTres;
            }
            elseif($tipoPizza==2 && $tamanoPizza==2){
                $pizzaCuatro = serialize( new Pizza("Cuatro Quesos", "familiar", "pedida"));
                $pizzas[]= $pizzaCuatro;
            }
            
            elseif($tipoPizza==3 && $tamanoPizza==1){
                $pizzaCinco = serialize( new Pizza("Funghi", "mediana", "pedida"));
                $pizzas[]= $pizzaCinco;
            }
            elseif($tipoPizza==3 && $tamanoPizza==2){
                $pizzaSeis = serialize(new Pizza("Funghi", "familiar", "pedida"));
                $pizzas[]= $pizzaSeis;
            }

        }
        
        foreach ($pizzas as $p) {
                echo $p;
            }
        
        ?>

       
    </body>
</html>
