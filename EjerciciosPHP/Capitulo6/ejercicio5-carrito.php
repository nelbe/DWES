<?php
session_start(); // Inicio de sesión (Simpre al principio de todo)
 ?>
        <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <h5>Crea una tienda on-line sencilla con un catálogo de productos y un 
        carrito de la compra. Un catálogo de cuatro o cinco productos será 
        suficiente. De cada producto se debe conocer al menos la descripción y 
        el precio. Todos los productos deben tener una imagen que los identifique. 
        Al lado de cada producto del catálogo deberá aparecer un botón Comprar 
        que permita añadirlo al carrito.
        Si el usuario hace clic en el botón Comprar de un producto que ya estaba 
        en el carrito, se deberá incrementar el número de unidades de dicho 
        producto. Para cada producto que aparece en el carrito, habrá un botón 
        Eliminar por si el usuario se arrepiente y quiere quitar un producto 
        concreto del carrito de la compra. A continuación se muestra una captura 
        de pantalla de una posible solución.</h5> <br>
  </head>
  <body>    
<h3 style="text-align: center">Tienda on-line <b><i><u>Piensos para perros</u></i></b></h3>
<table style="border: 1px; margin-left: 30px"><tr><td>
<h3>Productos</h3><hr>
<?php

    $productos = array ( 
    "junior" => array( "nombre" => "Optima Cachorros", "precio" => 29, "imagen" => "optima-junior.jpg"),
    "adult" => array( "nombre" => "Optima Adultos", "precio" => 31.5, "imagen" => "optima.jpg"),
    "fish" => array( "nombre" => "Optima Pescado", "precio" => 35, "imagen" => "optima-fish.jpg"),
    "adult-mini" => array( "nombre" => "Optima Adultos mini", "precio" => 31, "imagen" => "optima_mini_adult.jpg")
    );       
      foreach ($productos as $codigo => $elemento) {
    ?>
      <img src="images/<?=$elemento[imagen]?>" width="200" border="1"><br>
    <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €
    <form action="#" method="post">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <input type="hidden" name="accion" value="comprar">
      <input type="submit" value="Comprar">
    </form><br><br>
    <?php
     }
    ?>
    </td><td>			
    <h3>Carrito</h3><hr>
    
      <?php
    /********* ESTA ES LA PARTE DEL CARRITO *********/
    
    // Inicializo por primera vez el carrito
    $accion = $_POST['accion'];
    $codigo = $_POST['codigo'];
    
    if (!isset($_SESSION['carrito'])){
        $_SESSION['carrito']=array(); 
    }
    
    if ($accion == "comprar"){
        $_SESSION['carrito'][$codigo++];
    }
    
    if ($accion == "eliminar"){
        $_SESSION['carrito'][$codigo--];
    }
				
  // Muestra lo que tiene el carrito
  $totalcarrito = 0;
  foreach ($productos as $codigocarrito => $elemento) {
      
    if ($_SESSION['carrito'][$codigocarrito] > 0) {
      $totalcarrito = $totalcarrito + ($_SESSION['carrito'][$codigocarrito] * $elemento[precio]);
      ?>
      <img src="images/<?=$elemento[imagen]?>" width="200" border="1"><br>
      <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €<br>
      
      Unidades: <?=$_SESSION['carrito'][$codigocarrito]?>
      <form action="#" method="post">
        <input type="hidden" name="codigo" value="<?=$codigocarrito?>">
        <input type="hidden" name="accion" value="eliminar">
        <input type="submit" value="Eliminar">
      </form><br><br>
      <?php
    }
  }
  ?>
  <b>Total: <?=$totalcarrito?> €</b>
  </td>
  </tr>
</table>

 </body>
</html>    