<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>7. Realiza el control de acceso a una caja fuerte. La combinación 
            será un número de 4 cifras. El programa nos pedirá la combinación 
            para abrirla. Si no acertamos, se nos mostrará el mensaje “Lo siento, 
            esa no es la combinación” y si acertamos se nos dirá “La caja fuerte 
            se ha abierto satisfactoriamente”. Tendremos cuatro oportunidades 
            para abrir la caja fuerte.</h5> <br>
  </head>
  <body>
  <?php     
      if (!isset($_POST['oportunidades'])) {
          $oportunidades=4;
          $numeroIntroducido=99999;
      }else{
          $oportunidades=$_POST['oportunidades'];
          $numeroIntroducido= $_POST['numeroIntroducido'];
      }
      
      $numeroSecreto=2531;
      
      if ($numeroSecreto==$numeroIntroducido){
          echo "La caja fuertese ha abierto satisfactoriamente";
      }elseif ($oportunidades==0){
          echo "Lo siento ha agotado sus oportuniadades";
      }else{
    ?>
      <div>
        <?php  
          echo "Sus oportunidades son:" . $oportunidades . "<br>";
          echo "Introduce un número de cuatro cifras.";
          echo '<form action="ejercicio7.php" method="post">';
          echo '<input type="number" min=0 max=9999 name="numeroIntroducido" autofocus>';
          echo '<input type="hidden" name="oportunidades" value="', $oportunidades, '">';
          echo '<input type="submit" value="Continuar">';
          echo '</form>';
        ?>  
      </div>
    <?php  
      }    
 ?>        
      
      
  </body>
</html>
