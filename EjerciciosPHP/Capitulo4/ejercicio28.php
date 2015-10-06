<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Escribe un programa que calcule el factorial de un número entero 
        leído por teclado.</h5> <br>
  </head>
  <body>
   <?php   
      $numero=$_POST["num"];
      $factorial=1;
   ?>   
    <?php
    if (!isset($numero)){
 ?>       
        <form action="ejercicio28.php"  method="POST" >
        Meta un número<br>
        <input type="text" name="num" autofocus=""> 
        <input type="submit" value="Calcular"> 
   <?php 
     }else{
        ?>
            <form action="ejercicio28.php"  method="POST" >
            Meta un número<br>
            <input type="text" name="num" autofocus=""> 
            <input type="submit" value="Calcular"> 
        
        <?php
            //Guardo el número en una variable, para que cuando me entre 
            //en el bucle no de error.
            $factorial=$numero; 
            //Después hago el bucle de manera que recorra del 1 al número 
            //anterior del número introducido por teclado y le hago el 
            //factorial.
            if ($numero != 1){
                for ($i = 1; $i < $numero; $i++) {
                $factorial= $factorial* $i;
               
                }
                echo "Factorial:" . $factorial;
            }
            else {
                echo "El factorial de" . "$numero" . "es 0"; 
            }
        
     }   
    ?>    
      
  </body>
</html>