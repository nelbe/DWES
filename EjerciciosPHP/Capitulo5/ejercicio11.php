<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Crea un mini-diccionario español-inglés que contenga, al menos, 20 
       palabras (con su traducción). Utiliza un array asociativo para 
       almacenar las parejas de palabras. El programa pedirá una palabra
       en español y dará la correspondiente traducción en inglés.</p>
</head>
   <body>
       <?php
     $palabra = $_GET['palabra'];
      
      $diccionario = ["perro" => "dog", "puerta" => "door", "casa" => "house", 
                      "gato" => "cat", "nino" => "boy", "nina"=> "girl", 
                      "profesor" => "teacher", "naranja" => "orange", "pelota" => "ball",
                      "pajaro" => "bird", "uno"=>"one", "raton" => "mouse"];
    
    
      if (!isset($palabra)) {    
        echo "Mete una palabra ";
        echo "<form action='ejercicio11.php' method='get'>";
        echo "<input type='text' name='palabra'>";
        echo "<input type='submit' value='Enviar'>";
        echo"</form>";
    
        }   else {
            if ($diccionario[$palabra] != "")
            echo "$palabra" . "=" . "$diccionario[$palabra]";
            else {
                echo "Esta palabra no está en la base de datos";
            }
        }
          

    ?>
   </body>
</html>
