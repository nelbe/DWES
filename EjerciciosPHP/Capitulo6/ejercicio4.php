<?php
 session_start(); // Inicio de sesión (Simpre al principio de tod)
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Establece un control de acceso mediante nombre de usuario y contraseña 
        para cualquiera de los programas de la relación anterior. La aplicación 
        no nos dejará continuar hasta que iniciemos sesión con un nombre de 
        usuario y contraseña correctos. /Del ejercicio 3/</h5> <br>
  </head>
  <body>
      <?php
      $nombreUsuario = $_POST['nombreUsuario'];
      $contrasena = $_POST['contrasena'];
      $nombreEntrar = "Belen";
      $contraEntrar = 1234;
      
      if (!isset ($_SESSION['nombreDeUsuario'])){
      ?>
      <form action="#" method="post">
          Nombre de usuario: <input type="text" name="nombreUsuario"> <br>
          Contraseña: <input type="number" name="contrasena">
          <input type="submit" value="Continuar">
          </form>
      <?php
      }
      
          if (($nombreUsuario==$nombreEntrar) && ($contrasena == $contraEntrar)){ 
              $_SESSION['nombreDeUsuario'] = $nombreUsuario;
            //type = password

            header('Location: suma.php'); //Para mandarlo a otra
                                                      //página
           ?>
          
      <?php
             
      }

      ?>    
      
  </body>
</html>

