<?php
 session_start(); // Inicio de sesión (Simpre al principio de tod)
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Escribe un programa que calcule la media de un conjunto de números 
        positivos introducidos por teclado. A priori, el programa no 
        sabe cuántos números se introducirán. El usuario indicará que ha
        terminado de introducir los datos cuando meta un número negativo.
        Usa sesiones.</h5> <br>
  </head>
  <body>
      <?php

      $numeroIntroducido = $_POST['numeroIntroducido'];
      
      //Siempre que se abre el navegador y no tiene nada
      if (!isset($_SESSION['suma'])){
          $_SESSION['suma'] = 0;
          $_SESSION['contador'] = 0;
      }
     
      if (!isset($numeroIntroducido) || ($numeroIntroducido > 0)) {
         $_SESSION['suma'] += $numeroIntroducido;
         $_SESSION['contador']++;
     
          ?> 
          <form action="#" method="post">
          <input type="number" max=9999 name="numeroIntroducido" autofocus="">
          <input type="submit" value="Continuar">
          </form>
         
      <?php
          // print_r(get_defined_vars()); Sirve para ver cuanto valen las variables
          }else { 
              $_SESSION['contador']--; //Quita el último número
              $media = $_SESSION['suma']/$_SESSION['contador'];
              echo "La suma es: " . $_SESSION['suma'] . "<br>";
              echo "La media de estos números es = " . $media . "<br>";
              echo "Ha introducido: " . $_SESSION['contador']. " números";
              
          }  
  ?>    
      
  </body>
</html>
      