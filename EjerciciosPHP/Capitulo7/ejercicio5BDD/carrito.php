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
          height: 1800px;
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
<h1>GESTISIMAL</h1>
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

      mysql_select_db("gestisimal", $conexion); //Seleccionamos base de datos
      mysql_set_charset('utf8');
      
      //Aquí hago el listado de todos los elementos de cliente
      $consulta = mysql_query("SELECT * FROM articulo", $conexion);
    
      
    //Con el siguiente bucle, se ejecuta mientras que haya datos
      while ($campo = mysql_fetch_array($consulta)){ //Sacamos datos fila a fila, registro a registro 
        
        $productos[$campo[codigo]] = array( 
         "codigo" => $campo['codigo'],
         "descripcion" =>  $campo['descripcion'],
         "precio_venta" => $campo['precio_venta'],   
        );
        
      } //Fin del while

      
  
    foreach ($productos as $codigo => $elemento) {
    ?>        
    <?=$elemento[descripcion]?><br>Precio: <?=$elemento[precio_venta]?> €
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
    if ($accion == "-"){
        $_SESSION['carrito'][$codigo]--;
    }
    
    //Si pincho en +, se incrementa la cantidad
    if ($accion == "+"){
        $_SESSION['carrito'][$codigo]++;
    }
    
    
   /********* ESTA ES LA PARTE DEL CARRITO *********/ 
  // Muestra lo que tiene el carrito
  $totalcarrito = 0;
  foreach ($productos as $codigocarrito => $elemento) {
      
    if ($_SESSION['carrito'][$codigocarrito] > 0) {
      $totalcarrito = $totalcarrito + ($_SESSION['carrito'][$codigocarrito] * $elemento[precio_venta]);
      ?>
   
      <?=$elemento[descripcion]?><br>Precio: <?=$elemento[precio_venta]?> €<br>
      
      Unidades: <?=$_SESSION['carrito'][$codigocarrito]?>
 
      <form action="#" method="post">
          <input type="hidden" name="codigo" value="<?=$codigocarrito?>">
          <input type="submit" name="accion" value="+">
          <input type="submit" name="accion" value="-">
          <input type="submit" name="accion" value="eliminar">
      </form>
      
      <br><br>

      <?php
    }
  }
  ?>
  <b>Total: <?=$totalcarrito?> €</b>
  
    <form action="cancelar.php" method="post">
          <input type="hidden" name="codigo" value="<?=$codigocarrito?>">
          <input type="submit" name="accion" value="cancelar">
      </form>
    <form action="factura.php" method="post">
        <input id="finalizar" type="submit" name="accion" value="finalizar">
    </form>
 
 </td>
</tr> 
</table>

</div>    
 </body>
</html>     