<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <p>Realiza un programa que pida 8 números enteros y 
        que luego muestre esos números de colores, los pares de un color y 
        los impares de otro.</p>
</head>
   <body>
       <?php
      $numero = $_GET['numero'];
      $contadorNumeros = $_GET['contadorNumeros'];
      $numeroTexto = $_GET['numeroTexto'];
    
      if (!isset($numero)) {
        $contadorNumeros = 0;
        $numeroTexto = "";
      }

      // Muestra los números introducidos
      if ($contadorNumeros == 8) {
        $numeroTexto = $numeroTexto . " " . $numero; // añade el último número leído
        $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros
                                                // espacios de la cadena       
        $numeros = explode(" ", $numeroTexto); //Añade a la array los números
        echo "Los números introducidos son: " . "<br>";
        
        foreach ($numeros as $n){
            echo $n . " ";
        }
        
        echo "<br>";
        /*for($i=0; $i<8; $i++){
            echo $i . " ";
        }
        
        for ($i = 0; $i < 8; $i++) {
            echo $numeros[$i]. "<br>";
         }*/
        
        for($i=0;$i<8;$i++){
            if ( ($numeros[$i] % 2) == 0) { 
               echo "<font color='red'>" . $numeros[$i] . " " . "</font>";
            }else{
              echo "<font color='blue'>" . $numeros[$i] . " " . "</font>"; 
            }
       }
      }
      
      // Pide número y añade el actual a la cadena
      if (($contadorNumeros < 8) || (!isset($numero))) {
        ?>
        <form action="#" method="get">
          Introduzca un número:
          <input type="number" name ="numero" autofocus>
          <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
          <input type="hidden" name="numeroTexto" value="<?= $numeroTexto . " " . $numero ?>">
          <input type="submit" value="Enviar">
        </form>
        <?php
      }
    ?>
      
   </body>
</html>