<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  
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
        
        
        
        //Compruebo que sean o no primos con
        // Una funcion que recorre todos los numero desde el 2 hasta el valor recibido
        function primo($numeros)
        {
        $contadorNumeros=0;
        for($i=2;$i<=$numeros;$i++){
            if($numeros%$i==0){
            # Si se puede dividir por algun numero mas de una vez, no es primo
                if(++$contadorNumero>1){
                    return false;
                } 
            }
        }
        return true;
        }
        $contadorPrimos=0;
        $contadorNoPrimos=0;
        
       
        for ($i=0; $i<8; $i++){
            //Los primos los pinto rojos y los no primos los dejo en negro
            if(primo($numeros[$i])){
                echo "<font color='blue'>" . $numeros[$i] . " " . "</font>"; 
            }
            //Ahora compruebo los pares, si son pares los pinto en verde, sino 
            //los dejo negros
            if ( ($numeros[$i] % 2) == 0) { 
               echo "<font color='green'>" . $numeros[$i] . " " . "</font>";
            }else{
              echo $numeros[$i] . " ";
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