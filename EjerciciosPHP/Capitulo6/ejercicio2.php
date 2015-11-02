<?php
 session_start(); // Inicio de sesión (Simpre al principio de tod)
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Realiza un programa que vaya pidiendo números hasta que se introduzca 
        un numero negativo y nos diga cuantos números se han introducido, 
        la media de los impares y el mayor de los pares. El número negativo 
        sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
        en el cómputo. Utiliza sesiones.</h5> <br>
  </head>
  <body>
      <?php
      $numeroIntroducido = $_POST['numeroIntroducido'];
      
      //Siempre que se abre el navegador y no tiene nada
      if (!isset($_SESSION['suma'])){
          $_SESSION['suma'] = 0;
          $_SESSION['contador'] = 0;
          $_SESSION['contadorImpares']=0;
          $_SESSION['numMaximo']=0;
      }
     
      if (!isset($numeroIntroducido) || ($numeroIntroducido > 0) ) {
          $_SESSION['contador']++;
          ?> 
          <form action="#" method="post">
          <input type="number" max=9999 name="numeroIntroducido" autofocus="">
          <input type="submit" value="Continuar">
          </form>
      
          <?php
         if ( ($numeroIntroducido % 2) != 0)  {
                  $_SESSION['contadorImpares']++; 
                  $_SESSION['suma'] += $numeroIntroducido;
              }
              
              else{
                  //Busco cual es el máximo 
                    if ($numeroIntroducido > $_SESSION['numMaximo']) {
                        $_SESSION['numMaximo'] = $numeroIntroducido;
                    }
                }
    
          // print_r(get_defined_vars()); Sirve para ver cuanto valen las variables
          }else { 
              
                echo "Número par máximo: " . $_SESSION['numMaximo'] . "<br>";
                $media = $_SESSION['suma']/$_SESSION['contadorImpares']; 
                echo "La media de estos números es = " . $media . "<br>";
              }

      ?>        
      <p>Ha introducido: <?php echo ($_SESSION['contador']-1) ?> números</p>
      <?php
  ?>    
      
  </body>
</html>
      