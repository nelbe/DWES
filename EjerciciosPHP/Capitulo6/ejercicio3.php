<?php
 session_start(); // Inicio de sesión (Simpre al principio de tod)
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Escribe un programa que permita ir introduciendo una serie indeterminada de 
números hasta que la suma de ellos supere el valor 10000. 
Cuando esto último ocurra, se debe mostrar el total acumulado, el contador 
de los números introducidos y la media.Utiliza sesiones.</h5> <br>
  </head>
  <body>
      <?php
      $numeroIntroducido= $_POST['numeroIntroducido'];
      
      if (!isset($_SESSION['suma'])){
          $_SESSION['suma'] = 0;
          $_SESSION['contador'] = 0;
      }
     
       //Si no ha sido introducido el número
      if (!isset($numeroIntroducido)) {
       ?> 
          <form action="#" method="post">
          <input type="number" max=10000 name="numeroIntroducido" autofocus="">
          <input type="submit" value="Continuar">
          </form>
      <?php
      }else{
          if($_SESSION['suma']<=10000){
             $_SESSION['suma']=$_SESSION['suma']+$numeroIntroducido;
             $_SESSION['contador']++;
      ?>
      <form action="#" method="post">
          <input type="number" max=10000 name="numeroIntroducido" autofocus="">
          <input type="submit" value="Continuar">
          </form>
      <?php
          }if($_SESSION['suma']>10000) {
              $media = $_SESSION['suma']/$_SESSION['contador'];
              echo "El media de estos números es: " . $media . "<br>";
              echo "La suma: " . $_SESSION['suma'] . "<br>";
              echo "El número de números introducidos: " . $_SESSION['contador'] . "<br>";                       
          }
          
      }    

      ?>    
      
  </body>
</html>