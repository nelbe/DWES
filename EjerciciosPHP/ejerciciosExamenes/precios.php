<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
   <body>
<?php
    if (!isset($_GET['numero'])) {
    $contadorNumeros = 1;
    $numeroTexto = "";
  } else {
    $contadorNumeros = $_GET['contadorNumeros'];
    $numeroTexto = $_GET['numeroTexto'];
  }
  
  if ($contadorNumeros < 11) {
    $contadorNumeros = $_GET['contadorNumeros'];
    $numeros = $_GET['numero'];
    $numeroTexto = $_GET['numeroTexto'];

    if ($numeroTexto == "") {
        $numeroTexto = $numeros;
    } else {
        $numeroTexto = $numeroTexto.' '.$numeros;
    }
    
    $contadorNumeros++;
  }
  
  if (!isset($_GET['numero']) || ($contadorNumeros < 11)) {
  ?>
    <form action="#" method="get">
      Introduzca un precio:
      <input type="number" name ="numero" autofocus="" required="">
      <input type="hidden" name="contadorNumeros" value="<?php echo $contadorNumeros; ?>">
      <input type="hidden" name="numeroTexto" value="<?php echo $numeroTexto; ?>">
      <input type="submit" value="Enviar">
    </form>
  <?php
  }

/********Aquí mostramos los 10 números introducidos por teclado********+*/
  if ($contadorNumeros == 11) {
    $numero = explode(" ", $numeroTexto);
                             
    // Muestra el array original
    for ($i = 0; $i < 10; $i++) {
        echo $numero[$i]. "<strong>" . "€" . "</strong>" . "  ";
      }
    
    /******Pedimos el precio********/
    ?>
    <form action="#" method="get">
      Descuento <input type="number" name="descuento" min="0" max="100" required=""><br>
      <input type="hidden" name="contadorNumeros" value="12">
      <input type="hidden" name="numeroTexto" value="<?php echo $numeroTexto; ?>">
      <input type="hidden" name="numero" value="basura">
      <input type="submit" value="Enviar">
    </form>
  <?php
  }
  

  // Como hemos introducido los números y además la posicion descuento
  // más los 10 números introducidos por teclado, son 12
  if ($contadorNumeros == 12) {

    $descuento = $_GET['descuento'];
    /*echo " El descuento que elegiste es:" . $descuento; 
    echo "<br>" . "<br>";*/
    
    // Muestra el array original

    if ($descuento<$numero[$i]) { 
      echo 'Los datos introducidos no son correctos';

    } else {

      $numero = explode(" ", $numeroTexto);

      /***Este el array original***/

      for ($i = 0; $i < 10; $i++) {
        echo $numero[$i]. "<strong>" . "€" . "</strong>" . "  ";
      }
      echo "<br>" . "<br>";
      
      echo "DESCUENTO DEL: " . $descuento . "<strong>" . "%" . "</strong>";
      echo "<br>";
      echo "<br>";

      for ($i = 0; $i < 10; $i++) {
          if ($numero[$i]>$descuento){
            $descuentoAplicado =  $numero[$i]*$descuento/100;
            $resultado = $numero[$i] - $descuentoAplicado;
            echo $numero[$i] . "€" . " con el descuento, se queda en: " . 
                 $resultado . "€" . "<br>";
          }else{
              echo "El precio " . $numero[$i] . "€" . " es inferior al descuento " . $descuento . "%" . "<br>";
          }  
      }
  }
 }
  ?>    
   
   </body>
</html>