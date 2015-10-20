<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
   <body>     
        <?php
        
      $codigoMorse = array(
                    "1" => ". _ _ _ _",
                    "2" => ". . _ _ _",
                    "3" => ". . . _ _",
                    "4" => ". . . . _",
                    "5" => ". . . . .",
                    "6" => "_ . . . .",
                    "7" => "_ _ . . .",
                    "8" => "_ _ _ . .",
                    "9" => "_ _ _ _ .",
                    "0" => "_ _ _ _ _",
                  );
      
      if (isset($_GET['numeroIntroducido'])) {
      
        $numero = $_GET['numeroIntroducido'];
        echo "El número introducido es: ", $numero, "<br>";
       
      //Uso strlen para obtener la longitud de un string
      for ($i = 0; $i < (strlen($numero)); $i++) {
        $cifra = $numero [$i]; //En $cifra metemos el número que hemos metido por teclado 
        $morse = $morse.$codigoMorse["$cifra"]; //En $morse, concatenamos para que muestre
      }                                         //el código morse de las cifras que metamos
            
       
      echo "En código morse es: ", $morse;
      echo "<br>"; 
      echo "<br>"; 
      }
 
      ?>
       
      <form action="#" method="get"> 
        Mete un número
        <input type="text" name="numeroIntroducido" required autofocus><br>
        <input type="submit" name="enviar" value="Enviar">
      </form> 
   </body>
</html>
