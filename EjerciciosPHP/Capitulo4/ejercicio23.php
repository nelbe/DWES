<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Escribe un programa que permita ir introduciendo una serie indeterminada de 
números hasta que la suma de ellos supere el valor 10000. 
Cuando esto último ocurra, se debe mostrar el total acumulado, el contador 
de los números introducidos y la media.</h5> <br>
  </head>
  <body>
      <?php
      //$_POST[''], lo ponemos para mandarle el valor cada vez que se recargue
      $numeroIntroducido= $_POST['numeroIntroducido'];
      $suma= $_POST['suma'];
      $contador= $_POST['contador'];
      $media=$_POST['media'];
     
       //Si no ha sido introducido el número
      if (!isset($numeroIntroducido)) {
         $suma=0;
         $contador=0;
         //Hay que poner input como hidden (oculto), para que almacene la variable
         //sino siempre se inicia a 0.
         //Por ejemplo la de $suma y la de $contador
       ?> 
          <form action="ejercicio23.php" method="post">
          <input type="number" max=10000 name="numeroIntroducido" autofocus="">
          <input type="hidden" name="suma" value="<?php echo $suma; ?>">
          <input type="hidden" name="contador" value="<?php echo $contador; ?>">
          <input type="hidden" name="media" value="<?php echo $media; ?>">
          <input type="submit" value="Continuar">
          </form>
      <?php
      }else{
          if($suma<=10000){
              $suma=$suma+$numeroIntroducido;
              $contador++;
      ?>
      <form action="ejercicio23.php" method="post">
          <input type="number" max=10000 name="numeroIntroducido" autofocus="">
          <input type="hidden" name="suma" value="<?php echo $suma; ?>">
          <input type="hidden" name="contador" value="<?php echo $contador; ?>">
          <input type="hidden" name="media" value="<?php echo $media; ?>">
          <input type="submit" value="Continuar">
          </form>
      <?php
          }if($suma>10000) {
              $media=$suma/$contador;
              echo "El media de estos números es: " . $media . "<br>";
              echo "La suma: " . $suma . "<br>";
              echo "El número de números introducidos: " . $contador . "<br>";                       
          }
          
      }    

      ?>    
      
  </body>
</html>