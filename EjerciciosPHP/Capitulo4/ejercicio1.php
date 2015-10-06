<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Muestra los números múltiplos de 5 de 0 a 100 utilizando 
        un bucle for .</h5> <br>
  </head>
  <body>
   <?php   
      $numero=$_POST["num"];
   ?>   
    <?php
    if (!isset($numero)){
 ?>       
        <form action="ejercicio1.php"  method="POST" >
        Meta un número<br>
        <input type="text" name="num" autofocus=""> 
        <input type="submit" value="Calcular"> 
   <?php 
     }else{
        ?>
            <form action="ejercicio1.php"  method="POST" >
            Meta un número<br>
            <input type="text" name="num" autofocus=""> 
            <input type="submit" value="Calcular"> 
        
        <?php
        echo "Los múltiplos de" . " $numero " . "son: ";
        for($i=0;$i<=100;$i++){?><br><?php
              echo "$numero"*"$i" . "<br>";
           }
           
     }   
    ?>    
      
  </body>
</html>
