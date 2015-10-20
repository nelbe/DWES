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
      if ($contadorNumeros == 12) {
        $numeroTexto = $numeroTexto . " " . $numero; // añade el último número leído
        $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros
                                                // espacios de la cadena       
        $numeros = explode(" ", $numeroTexto); //Añade a la array los números
        echo "Los números introducidos son: " . "<br>";
        
       /* foreach ($numeros as $numero){
            echo $numero . " " ;
        }
        echo "<br>";*/
 
        
        //Los primos los pinto rojos y los no primos los dejo en negro
        for ($i=0; $i<12; $i++){
               // $numeros[$i] = $_POST["numero"];
                $numero2 = strrev($numeros[$i]);

              if($numeros[$i]==$numero2){
                echo "<font color='red'>" . $numeros[$i] . " " . "</font>"; 
              }else{
                echo $numeros[$i] . " ";
              }
        }
        
      }
      

      // Pide número y añade el actual a la cadena
      if (($contadorNumeros < 12) || (!isset($numero))) {
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
    
    
    
    
    
    
    
    
    
   