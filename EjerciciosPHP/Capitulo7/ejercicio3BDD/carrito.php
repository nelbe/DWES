<?php
session_start(); // Inicio de sesión (Simpre al principio de todo)
 ?>
        <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
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
<h1>TIENDA ON-LINE</h1>
<div>
<table id="primeratabla" style="border: 1px; margin-left: 50px"><tr><td>

<tr>
    <td><strong><h3 class="letras">Productos</h3><hr></strong></td>
</tr>
 
<tr>
    <td>
    <?php
    
    //Hago la conexion desde otro fichero, con un include
      include "conexion.php";

      mysql_select_db("alimentosPerros", $conexion); //Seleccionamos base de datos
      mysql_set_charset('utf8');
      
      //Aquí hago el listado de todos los elementos de cliente
      $consulta = mysql_query("SELECT * FROM piensos", $conexion);
    
      
    //Con el siguiente bucle, se ejecuta mientras que haya datos
      while ($campo = mysql_fetch_array($consulta)){ //Sacamos datos fila a fila, registro a registro 
        
        $productos[$campo[codigo]] = array( 
         "codigo" => $campo['codigo'],
         "nombre" =>  $campo['nombre'],
         "precio" => $campo['precio'],
         "imagenes" => $campo['imagenes']   
        );
        
      } //Fin del while

      
  
    foreach ($productos as $codigo => $elemento) {
    ?>        
<img src="images/<?=$elemento[imagenes]?>" width="150" height="200"><br>
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
        unset($_SESSION['carrito'][$codigo]);
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
    <img src="images/<?=$elemento[imagenes]?>" width="50" height="80" border="1"><br>
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