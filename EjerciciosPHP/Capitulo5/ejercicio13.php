<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
  </head>
  
  <body>

        <h5>Ejercicio 13</h5>
        <div>
        <span>Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos 
        comprendidos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
        repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
        cumplan los siguientes requisitos:<br>
        • Los números de las dos diagonales donde está el mínimo deben aparecer en color rojo.<br>
        • El mínimo debe aparecer en color azul.<br>
        • El resto de números debe aparecer en color negro.</span><br><br>

            <?php
              $minimo = 999;
              //Genero el array Bidimensional.
              for($fila = 0;$fila < 6;$fila++){
                for($columna = 0;$columna < 9;$columna++){
                  //Genero un número aleatorio entre 100 y 999 y 
                  //compruebo que no lo haya generado antes.
                  do{
                    $numAleatorio = rand(100,999);
                  }while(in_array($numAleatorio, $arrayNumerosAleatorios));
                  $arrayNumerosAleatorios[] = $numAleatorio;
                  
                //Almaceno cual es el número mas pequeño y sus coordenadas.
                  if($numAleatorio < $minimo){
                    $minimo = $numAleatorio;
                    $coordMinimoFila = $fila;
                    $coordMinimoColumna = $columna;
                  }
                  $arrayBidimensional[$fila][$columna] = $numAleatorio;
                }
              }
              //Pinto la tabla
              echo "<br><table border=1>";
              for($fila = 0;$fila < 6;$fila++){//Recorro las filas
                echo "<tr>";
                for($columna = 0;$columna < 9;$columna++){//Recorro las columnas
                  //Compruebo si es el valor mas pequeño
                  if($arrayBidimensional[$fila][$columna] == $minimo){
                    echo "<td>" . "<font color='blue'>" . $arrayBidimensional[$fila][$columna] . " " . "</font>" . "</td>";
                    //Compruebo si esta en la diagonal del número más pequeño
                  } else if(abs((abs($fila) - abs($coordMinimoFila))) == 
                            abs((abs($columna) - abs($coordMinimoColumna)))){
                    echo "<td>" . "<font color='green'>" . $arrayBidimensional[$fila][$columna] . " " . "</font>" . "</td>";
                  }else {
                    echo "<td>" . $arrayBidimensional[$fila][$columna] . "</td>";
                  }
                }
                echo "</tr>";
              }
            ?>
            </table>


  </body>
 
  
</html>