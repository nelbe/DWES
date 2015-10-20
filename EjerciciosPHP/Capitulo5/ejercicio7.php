<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Escribe un programa que genere 20 números enteros aleatorios entre 
       0 y 100 y que los almacene en un array. El programa debe ser capaz 
       de pasar todos los números pares a las primeras posiciones del
       array (del 0 en adelante) y todos los números impares a las celdas 
       restantes. Utiliza arrays auxiliares si es necesario.</p>
</head>
   <body>
      <?php
      $contadorPares = 0;
      $contadorImpares =0;
      
          //Creo un array de 20 números aleatorios del 0 al 100
           for ($i = 0; $i < 20; $i++) {
                // números aleatorios entre 0 y 100 (ambos incluidos)
                $generado = rand(0, 100);
                $numero[$i] = $generado;
            }
            //Lo muestro
            for ($i = 0; $i < 20; $i++) {
                echo  $numero[$i] . " ";
            }
            ?>
       <br>
            <?php
            //Compruebo los pares y los meto en un array y luego los mismo 
            //con los impares
            for ($i=0; $i<20; $i++){
                if ( ($numero[$i] % 2) == 0) {  
                   $pares[$contadorPares]= $numero[$i];
                   $contadorPares++;

                }else{
                   $impares[$contadorImpares]= $numero[$i];
                   $contadorImpares++;    
                }
            }
            
            //Ordeno los pares e impares
            for ($i=0; $i<$contadorPares; $i++){
                $numero[$i]=$pares[$i]; 
            }
            
            for ($i=$contadorPares; $i<$contadorPares+$contadorImpares; $i++){
                $numero[$i] = $impares[$i - $contadorPares]; // PREGUNTAR ESTA PARTE
            }
            
            //Muestro el array nuevo
            for ($i = 0; $i < 20; $i++) {
                echo  $numero[$i] . " ";
            }

        ?>
   </body>

</html>