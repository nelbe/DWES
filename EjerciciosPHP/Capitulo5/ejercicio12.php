<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Realiza un programa que escoja al azar 5 palabras en español del 
       mini-diccionario del ejercicio anterior. El programa pedirá 
       que el usuario teclee la traducción al inglés de cada una de las palabras
       y comprobará si son correctas. Al final, el programa deberá mostrar 
       cuántas respuestas son válidas y cuántas erróneas.</p>
</head>
   <body>
       <?php
     $palabra = $_GET['palabra'];
     $palabraenviada = $_GET['palabraenviada'];
     $contadorPuntos = $_GET['puntos'];
 
     //$contadorPuntos = (!isset($_GET['puntos']))? 0:$_GET['puntos'];
     
      $diccionario = ["perro" => "dog", "puerta" => "door", "casa" => "house", 
                      "gato" => "cat", "nino" => "boy", "nina"=> "girl", 
                      "profesor" => "teacher", "naranja" => "orange", "pelota" => "ball",
                      "pajaro" => "bird", "uno"=>"one", "raton" => "mouse"];
    
     
      ///Recorro el array asociativo $diccionario, y introduzco la clave en
      /// un array de índice numérico.
      foreach ($diccionario as $clave => $valor){
          $palabraEspanol[] = $clave;
          $palabraIngles[] = $valor;
      }
      

      $aleatorio = rand(0,11);

      if($palabraIngles[$palabraenviada] == $palabra){
            $contadorPuntos++;  
        }
 
        echo "¿Cómo se dice $palabraEspanol[$aleatorio] en inglés?";
        echo "<form action='ejercicio12.php' method='get'> ";
        echo "<input type='text' name='palabra' autofocus>";
        echo "<input type='hidden' name='palabraenviada' value='$aleatorio'>";
        echo "<input type='hidden' name='puntos' value='$contadorPuntos'>";
        echo "<input type='submit' value='Enviar'>";
        echo"</form>";
    
        if($palabraIngles[$palabraenviada] == $palabra){
            echo "Has acertado <br>";
            echo "Puntos:" . ($contadorPuntos-1) ;
           
        }else {
            echo "No has acertado <br>";
            echo "Puntos:" . ($contadorPuntos-1);
            }    

    ?>
   </body>
</html>
