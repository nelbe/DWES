<?php
    session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <style>
        h2{
            text-align: center;
        }
        
        table{
            margin-left: 80px;
        }
        
        #nuevo{
            margin-left: 76px;
        }
        
        input{
            size: 10px;
        }
        
        #botones{
            margin-left: 330px;
        }
        
        .anchoInput{
            width: 70px;
        }
        
        .anchoPrecio{
            width: 150px;
        }
    
    </style>
    
  </head>
  <body>
    <h2>GESTISIMAL<br></h2>
    <?php
    //Hago la conexion desde otro fichero, con un include
      include "conexion.php";

      mysql_select_db("gestisimal", $conexion); //Seleccionamos base de datos
      mysql_set_charset('utf8');
      
      if(!isset($_SESSION['pagina'])) {
        $_SESSION['pagina'] = 1; //Empiezo en la página 1
      }
      
      if($_POST['accion']== "primera"){
        $_SESSION['pagina'] = 1;
      } 
      
      if($_POST['accion']== "siguiente"){
        $_SESSION['pagina'] ++;
      }
      
      if($_POST['accion']== "anterior"){
        $_SESSION['pagina'] --;
      }
      
      if($_POST['accion']== "ultima"){
        $_SESSION['pagina']= $numPaginas;
        
      }
      
      echo "Página: " . $_SESSION['pagina'] . "<br>";
      
      $contarRegistros = "SELECT COUNT(codigo) AS cuenta FROM articulo";
      $registros = mysql_query($contarRegistros, $conexion);
      
      $numRegistros = mysql_result($registros, 0, 'cuenta');
        
      $numPaginas = ceil($numRegistros / 5);
 
      
      //El primer numero del limit son los que devuelve por página y el segundo a partir del cual
      $consulta = mysql_query("SELECT * FROM articulo ORDER BY codigo LIMIT " . (5 * ($_SESSION['pagina']-1)) . ",5", $conexion);
      
  
    //Ahora muestro en una tabla todos los elementos   
    ?>
    <h2>Tabla de ARTÍCULOS<br></h2>
    <table border="1">
    <tr>
      <td><b>Código</b></td>
      <td><b>Descripción</b></td>
      <td><b>Precio de compra</b></td>
      <td><b>Precio de venta</b></td>
      <td><b>Stock</b></td>
      <td><b><i class="fa fa-shopping-cart"> Salida Mercancía</i></b></td>
      <td><b><i class="fa fa-plus"> Entrada Mercancía</i></b></td>
    </tr>

    <?php
    //Con el siguiente bucle, se ejecuta mientras que haya datos
      while ($campo = mysql_fetch_array($consulta)){ //Sacamos datos fila a fila, registro a registro 
        ?>
        <tr>
          <td><?= $campo['codigo'] //También se podría poner el número del campo $registro[0]?></td> 
          <td><?= $campo['descripcion'] ?></td>
          <td><?= $campo['precio_compra'] ?></td>
          <td><?= $campo['precio_venta'] ?></td>
          <td><?= $campo['stock'] ?></td>
          <td><form action="salidaMercancia.php" method="post">
                  <input type="hidden" name="codigo" value="<?=$campo['codigo']?>">
                  <input class="anchoInput" min="1" size="9" type="number" name="cantidad">  
                <input type="submit" name='accion' value="vender">
              </form></td>
          <td><form action="entradaMercancia.php" method="post">
                  <input type="hidden" name="codigo" value="<?=$campo['codigo']?>">
                  <input class="anchoInput" min="1" size="1" type="number" name="cantidad">  
                <input type="submit" name='accion' value="NuevoStock">
              </form></td>    
              
              
          
          <td><a href="borradoArticulo.php?codigo=<?=$campo['codigo']?>"><button><i class="fa fa-trash-o"></i>
</button></a> 
              <a href="modificaArticulo.php?codigo=<?=$campo['codigo']?>"><button id="modifica"><i class="fa fa-pencil-square-o"></i>
</button></a> </td>
        </tr>
  
        <?php
      } //Fin del while
     
    ?>
    </table> 
    <form action="nuevoArticulo.php" method="post">
        <table id="nuevo">
            <tr>
            <td><input size="2" type="text" name="codigo" required></td>
        <td><input size="15" type="text" name="descripcion" required></td>
            <td><input class="anchoPrecio" min="1" type="number" name="precio_compra"></td>
            <td><input class="anchoPrecio" min="1" type="number" name="precio_venta"></td>
            <td><input class="anchoInput" min="1" type="number" name="stock"></td>
            <td><input type="submit" value="Nuevo"></td>      
            </tr>
        <table>  
    </form>   
   
    
    <form method="post">
        <input id="botones" size="9" type="submit" name='accion' value="primera">
    </form> 
    
    <form method="post">
    <?php    
        if ($_SESSION['pagina']>1){ 
            echo "<input size='9' type='submit' name='accion' value='anterior'>"; 
        }
        else{ 
            echo "<input size='9' type='submit' name='accion' value='anterior' disabled>";
        }
    ?>
    </form>  
        
    <form  method="post">
    <?php    
        if ($_SESSION['pagina'] < $numPaginas){ 
            echo "<input size='9' type='submit' name='accion' value='siguiente'>"; 
        }
        else{ 
            echo "<input size='9' type='submit' name='accion' value='siguiente' disabled>";
        }
    ?>     
    </form>
    
    <form method="post">
        <input size="9" type="submit" name='accion' value="ultima">
    </form> 
    
  </body>
</html>