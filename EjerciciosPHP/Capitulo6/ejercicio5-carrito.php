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
    "junior" => array( "nombre" => "Optima Cachorros", "precio" => 29, "imagen" => "optima-junior.jpg"),
    "adult" => array( "nombre" => "Optima Adultos", "precio" => 31.5, "imagen" => "optima.jpg"),
    "fish" => array( "nombre" => "Optima Pescado", "precio" => 35, "imagen" => "optima-fish.jpg"),
    "adult-mini" => array( "nombre" => "Optima Adultos mini", "precio" => 31, "imagen" => "optima_mini_adult.jpg")
    );       
      foreach ($productos as $codigo => $elemento) {
    ?>
<img src="images/<?=$elemento[imagen]?>" width="150" height="200"><br>
    <?=$elemento[nombre]?><br>Precio: <?=$elemento[precio]?> €
    <form action="#" method="post">
      <input type="hidden" name="codigo" value="<?=$codigo?>">
      <input type="hidden" name="accion" value="comprar">
      <input type="submit" value="Comprar">
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