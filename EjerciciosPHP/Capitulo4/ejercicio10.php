<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Escribe un programa que calcule la media de un conjunto de números 
        positivos introducidos por teclado. A priori, el programa no 
        sabe cuántos números se introducirán. El usuario indicará que ha
        terminado de introducir los datos cuando meta un número negativo.</h5> <br>
  </head>
  <body>
      <?php
      //$_POST[''], lo ponemos para mandarle el valor cada vez que se recargue
      $numeroIntroducido= $_POST['numeroIntroducido'];
      $suma= $_POST['suma'];
      $contador= $_POST['contador'];
     
       //Si no ha sido introducido el número
      if (!isset($numeroIntroducido)) {
         $suma=0;
         $contador=0;
         //Hay que poner input como hidden (oculto), para que almacene la variable
         //sino siempre se inicia a 0.
         //Por ejemplo la de $suma y la de $contador
          ?> 
          <form action="ejercicio10.php" method="post">
          <input type="number" max=9999 name="numeroIntroducido" autofocus="">
          <input type="hidden" name="suma" value="<?php echo $suma; ?>">
          <input type="hidden" name="contador" value="<?php echo $contador; ?>">
          <input type="submit" value="Continuar">
          </form>
      <?php
      }else{
          if($numeroIntroducido>0){
              $suma=$suma+$numeroIntroducido;
              $contador++;
      ?>
      <form action="ejercicio10.php" method="post">
          <input type="number" max=9999 name="numeroIntroducido" autofocus="">
          <input type="hidden" name="suma" value="<?php echo $suma; ?>">
          <input type="hidden" name="contador" value="<?php echo $contador; ?>">
          <input type="submit" value="Continuar">
          </form>
      <?php
          }else {
              $media=$suma/$contador;
              echo "El media de estos números es= " . $media;
              
          }
          
      }    

  ?>    
      
  </body>
</html>
      