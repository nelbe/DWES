<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Escribe un programa que lea una lista de diez números y determine 
        cuántos son positivos, y cuántos son negativos.</h5> <br>
  </head>
  <body>
      <?php
      //$_POST[''], lo ponemos para mandarle el valor cada vez que se recargue
      $numeroIntroducido= $_POST['numeroIntroducido'];   
      $contadorpositivos= $_POST['contadorp'];
      $contadornegativos= $_POST['contadorn'];
      
      
      
      //Si no ha sido introducido el número    
      if (!isset($numeroIntroducido)) {
         //Hay que poner input como hidden (oculto), para que almacene la variable
         //sino siempre se inicia a 0.
         //Por ejemplo la de $suma y la de $contador
          ?> 
          <form action="ejercicio13.php" method="post">
          <input type="number" max=9999 name="numeroIntroducido" autofocus
          <input type="hidden" name="contadorn" value="<?php echo $contadornegativos; ?>">
          <input type="hidden" name="contadorp" value="<?php echo $contadorpositivos; ?>">
          <input type="submit" value="Continuar">
          </form>
      <?php
      }else{
        if ($contadorpositivos+$contadornegativos!=10){  
          if($numeroIntroducido>0){
              $contadorpositivos++;
              echo "El numero " . $numeroIntroducido . " es positivo . <br>";   
              
      ?>
      <form action="ejercicio13.php" method="post">
          <input type="number" max=9999 name="numeroIntroducido" autofocus="">
          <input type="hidden" name="contadorn" value="<?php echo $contadornegativos; ?>">
          <input type="hidden" name="contadorp" value="<?php echo $contadorpositivos; ?>">
          <input type="submit" value="Continuar">
          </form>
      <?php
          }else {
              $contadornegativos++;
              echo "El número " . $numeroIntroducido . " es negativo . <br>";
              
      ?>
        <form action="ejercicio13.php" method="post">
          <input type="number" max=9999 name="numeroIntroducido" autofocus="">
          <input type="hidden" name="contadorn" value="<?php echo $contadornegativos; ?>">
          <input type="hidden" name="contadorp" value="<?php echo $contadorpositivos; ?>">
          <input type="submit" value="Continuar">
          </form>
      <?php
          }
          echo "Los números positivos son:" . $contadorpositivos . "." . "<br>";
          echo "El núermo de negativos son:" .  $contadornegativos . ".";
        }else{
            echo "Ya ha metido 10 números" . "<br>";
            echo $contadorpositivos . " Positivos." . "<br>";
            echo $contadornegativos . " Negativos." . "<br>";
        }
      }  
     ?> 
  </body>
</html>
      