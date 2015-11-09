<?php
session_start(); // Inicio de sesión (Simpre al principio de todo)
 ?>
        <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <style> 
      #primeratabla{
          float: left;
          //pull-left para flotar con bootstrap
      }
      
      #segundatabla{
          border: 1px; 
          margin-left: 560px;
          //border: solid 2px;
          //width: 200px;
          //height: 400px; 
      }
      
      div{
          width: 900px;
          height: 1300px;
          margin-left: 15%;
          background-color: #CECEF6;
      }
      h1{
          text-align: center;
          color: #5882FA;
      
      }
      .letras{
          text-align: center;
          color: #0000FF;
      }
      img{
         border: solid #5882FA 1px;
      }
      
  </style>
 </head>
  <body>    
<h1>TIENDA OL-LINE</h1>
<div>
<table id="primeratabla" style="border: 1px; margin-left: 50px"><tr><td>

<tr>
    <td><strong><h3 class="letras">Productos</h3><hr></strong></td>
</tr>
 
<tr>
    <td>
    <?php

    $productos = array ( 
    "junior" => array( "nombre" => "Optima Cachorros", 
                       "precio" => 32.95, 
                       "imagen" =>"optima-junior.jpg",
                       "detalles" => "Cotecnica Optima Junior es un pienso para cachorros muy equilibrado indicado para animales hasta los 12 meses. Su receta es rica en proteínas y ayuda a desarrollar la musculatura del animal gracias a su gran aporte energético."),
    "adult" => array( "nombre" => "Optima Adultos", 
                      "precio" => 37.2, 
                      "imagen" => "optima-energy.pg",
                      "detalles" => "El pienso Cotecnica Optima Energy es un alimento seco en forma de croquetas indicado para la nutrición de perros deportistas, de trabajo o que realizan mucha actividad física."),
    "fish" => array( "nombre" => "Optima Pescado", 
                     "precio" => 34.6, 
                     "imagen" => "optima-fish.jpg",
                     "detalles" => "Cotecnica Optima Fish ha elaborado este pienso para perros con sabor a pescado. Se trata de un alimento seco indicado para la nutrición diaria de perros adultos de cualquier tamaño o raza. "),
    "adult-alergia" => array( "nombre" => "Optima cordero y arroz", 
                           "precio" => 34.6, 
                           "imagen" => "ptima-cordero.jpg",
                           "detalles" => "El pienso Cotecnica Optima con cordero y arroz en forma de croquetas está indicado para la alimentación diaria de perros con alergias, sensibilidad o intolerancia alimenticia.")
    );     
    
    
      $_SESSION['producto'] = $productos;
      
      foreach ($productos as $codigo => $elemento) {
    ?>
<img src="images/<?=$elemento[imagen]?>" width="150" height="200"><br>
<b><?=$elemento[nombre]?></b><br>Precio: <?=$elemento[precio]?> €
    <form action="#" method="post">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <input type="hidden" name="accion" value="comprar">
      <input type="submit" value="Comprar">
    </form>

    <form action="detalles.php" method="post">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <input type="hidden" name="detalle" value="detalle">
      <input type="submit" value="Detalles">
    </form><br><br>
    <?php
     }

    ?>  
    </td>
</tr>
</table>

<table id="segundatabla"><tr><td>

<tr>
    <td><strong><h3 class="letras">Carrito</h3><hr></strong></td>
</tr>
 
<tr>
    <td>
        <?php
    
    // Inicializo por primera vez el carrito
    $codigo = $_POST['codigo'];    
    $accion = $_POST['accion'];
    $restar = $_POST['restar'];
    $sumar = $_POST['sumar'];
    
    //Si no existe nada en el carrito, el array esta vacia
    if (!isset($_SESSION['carrito'])){
        $_SESSION['carrito']=array(); 
    }
    
    //Si pincho en comprar, se pasa el codigo del articulo
    if ($accion == "comprar"){
        $_SESSION['carrito'][$codigo]++;
    }
    
    //Si pincho en eliminar, se queda el codigo a 0
    if ($accion == "eliminar"){
        $_SESSION['carrito'][$codigo]=0;
    }
    
    //Si pincho en -, se decrementa la cantidad 
    if ($restar == "restar"){
        $_SESSION['carrito'][$codigo]--;
    }
    
    //Si pincho en +, se incrementa la cantidad
    if ($sumar == "sumar"){
        $_SESSION['carrito'][$codigo]++;
    }
   /********* ESTA ES LA PARTE DEL CARRITO *********/ 
  // Muestra lo que tiene el carrito
  $totalcarrito = 0;
  foreach ($productos as $codigocarrito => $elemento) {
      
    if ($_SESSION['carrito'][$codigocarrito] > 0) {
      $totalcarrito = $totalcarrito + ($_SESSION['carrito'][$codigocarrito] * $elemento[precio]);
      ?>
    <img src="images/<?=$elemento[imagen]?>" width="50" height="80" border="1"><br>
      <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €<br>
      
      Unidades: <?=$_SESSION['carrito'][$codigocarrito]?>
      <form action="#" method="post">
        <input type="hidden" name="codigo" value="<?=$codigocarrito?>">
        <input type="hidden" name="accion" value="eliminar">
        <input type="submit" value="Eliminar"> 
      </form>
      <form action="#" method="post">
          <input type="hidden" name="codigo" value="<?=$codigocarrito?>">
          <input type="hidden" name="restar" value="restar">
          <input type="submit" value="-">
      </form>
      <form action="#" method="post">
          <input type="hidden" name="codigo" value="<?=$codigocarrito?>">
          <input type="hidden" name="sumar" value="sumar">
          <input type="submit" value="+">
      </form>
      <br><br>
      <?php
    }
  }
  ?>
  <b>Total: <?=$totalcarrito?> €</b>
 </td>
</tr> 
</table>
</div>    
 </body>
</html>   