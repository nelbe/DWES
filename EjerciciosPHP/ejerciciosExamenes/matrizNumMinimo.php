<!DOCTYPE html>

<html>
  <head>
      <meta charset="UTF-8">
      <style type="text/css">
          td {
            border: 1px solid black;
            height: 20px;
            width: 40px;
            text-align: center;
          }
                    
      </style>
  </head>
    <body>
                     
      <?php
      $numMinimo = 300;
      $filaMin;
      $columnaMin;
       
       
      //Relleno la matriz
      for ($i = 0; $i < 8; $i++) {
        for($j = 0; $j < 8; $j++) {
          $arrayNum [$i][$j]= rand(100, 300);
        }
      }
       
      //Busco en el array cual es el máximo y que posición ocupa
      for ($i = 0; $i < 8; $i++) {
        for($j = 0; $j < 8; $j++) {
          if ($arrayNum [$i][$j] < $numMinimo) {
            $numMinimo = $arrayNum [$i][$j];
            $filaMin = $i;    //Posición de minimo
            $columnaMin = $j; //Posición del minimo
          }
        }
      }
      echo "Número mínimo: ", $numMinimo, "<br>";
      echo "Fila mínima: ", $filaMin, "<br>";
      echo "Columna mínima: ", $columnaMin, "<br>";
       
      //Imprimo la tabla con los cercanos en negrita
      echo "<table>";
      for ($i = 0; $i < 8; $i++) {
        echo "<tr>";
        for($j = 0; $j < 8; $j++) {
          if ((abs($i - $filaMin) <= 1) && (abs($j - $columnaMin) <= 1)) {
          echo "<td><strong>", $arrayNum [$i][$j], "</strong></td>";  
          }else{
          echo "<td>", $arrayNum [$i][$j], "</td>";
          }
        }
        echo "</tr>";  
      }
      echo "</table>";
       
      ?>
 
    </body>
</html>