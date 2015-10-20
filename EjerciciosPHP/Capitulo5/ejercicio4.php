<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Escribe un programa que genere 100 números aleatorios del 0 al 20 y que 
       los muestre por pantalla separados por espacios. El programa pedirá 
       entonces por teclado dos valores y a continuación cambiará todas las 
       ocurrencias del primer valor por el segundo en la lista generada 
       anteriormente.
       Los números que se han cambiado deben aparecer resaltados de un 
       color diferente.</p>
</head>
   <body>
      <?php
      $numeroTexto = $_GET['numeroTexto'];
      $viejo = $_GET['viejo'];
      $nuevo = $_GET['nuevo'];
    
      if (!isset($numeroTexto)) {
          //Creo un array de 100 números aleatorios del 1 al 20
          for ($i=0; $i<100; $i++){
            $numeros[$i] = rand(0,20);
            echo $numeros[$i] . " ";   
          }

          //IMPLODE, convierte un array en una cadena de texto
          //$numerosGenerados, es el array que queremos convertir a cadena
          $numeroTexto = implode(" ", $numeros);
          
       ?>
       <br><br>
       <form action="ejercicio4.php" method="get">
          Número viejo: <input type="number" name ="viejo"><br>
          Número nuevo: <input type="number" name ="nuevo"><br>
          <input type="hidden" name="numeroTexto" value="<?php echo $numeroTexto; ?>">
          <input type="submit" value="Enviar">
        </form>
        <?php
        
      }else{
           // EXPLODE, convierte un string en array
           $numeros = explode(" ", $numeroTexto);
          
           foreach ($numeros as $n){
               if ($n == $viejo){
                   echo "<font color='blue'>$nuevo, </font>";
               }else{
                   echo "$n, ";
               }           
           }
           
        }
 
    ?>
   </body>
</html>

