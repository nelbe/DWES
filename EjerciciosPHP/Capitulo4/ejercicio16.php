<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Escribe un programa que diga si un número introducido por teclado es o 
        no primo. Un número primo es aquel que sólo es divisible entre él mismo 
        y la unidad.</h5> <br>
  </head>
  <body>
   <?php   
      $numero=$_POST["num"];
      $s=0;
   ?>   
    <?php
    if (!isset($numero)){
 ?>       
        <form action="ejercicio16.php"  method="POST" >
        Meta un número<br>
        <input type="text" name="num" autofocus=""> 
        <input type="submit" value="Calcular"> 
   <?php 
     }else{
        ?>
            <form action="ejercicio16.php"  method="POST" >
            Meta un número<br>
            <input type="text" name="num" autofocus=""> 
            <input type="submit" value="Calcular"> 
        
        <?php
       for($i=1;$i<=$numero;$i++){
            if($numero%$i==0){
            $s=$s+1;
            }
       }
            if($s==2)
                echo "el numero " . $numero . " ES primo";
            else
                echo "el numero " . $numero . " NO es primo";              
    
            }
    ?>    
      
  </body>
</html>
