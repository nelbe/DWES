<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Realiza un programa que escoja al azar 10 cartas de la baraja española 
       y que diga cuántos puntos suman según el juego de la brisca. Emplea un 
       array asociativo para obtener los puntos a partir del nombre de la figura 
       de la carta. Asegúrate de que no se repite ninguna carta, igual que si 
       las hubieras cogido de una baraja de verdad.</p>  
</head>
   <body>
   <?php
    $puntuacion = array (
      'as' => 11, 'dos' => 0, 'tres' => 10, 'cuatro' => 0, 'cinco' => 0,
      'seis' => 0, 'siete' => 0, 'sota' => 2, 'caballo' => 3, 'rey' => 4);
    
    $palo = array ('oros', 'copas', 'bastos', 'espadas');
    
    $figura = array ('as', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'sota', 'caballo', 'rey');
    
    $cartasEchadas = "";
    $contadorCartasEchadas = 0;
    $puntosTotales = 0;

    do {
      $paloCarta = $palo[rand(0, 3)];
      $figuraCarta = $figura[rand(0, 9)];
      $puntosCarta = $puntuacion[$figuraCarta];
      $nombreCarta = "$figuraCarta de $paloCarta";
      
      if (!in_array($nombreCarta, $cartasEchadas)) {
        echo "$nombreCarta - $puntosCarta puntos<br>";
        $cartasEchadas[] = $nombreCarta;
        $contadorCartasEchadas++;
        $puntosTotales += $puntosCarta;
      }
    } while ($contadorCartasEchadas < 10); 

    echo "<br><b>Total: $puntosTotales puntos</b>";
 ?>   
   </body>
</html>   