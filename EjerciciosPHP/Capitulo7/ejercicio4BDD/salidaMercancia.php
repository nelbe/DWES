<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <style>
        h2,h5{
           text-align: center;
        }
        
        table{
            margin-left: 300px;
        }
       
        #listado{
            text-align: center;
           
        }
        
        button{
            margin-left: 450px;
            margin-top: 20px;
        }
        
        form{
           margin-left: 310px;
           margin-top: 20px;
        }
        
    </style>
  </head>
  <body>

<?php
  //Hago la conexion desde otro fichero, con un include
  include "conexion.php";

  mysql_select_db("gestisimal", $conexion); //Seleccionamos base de datos
  mysql_set_charset('utf8');
 
  if($_POST['accion']== "Vender"){
      echo "STOCK" . $_POST['stock'];
      echo "cantidad" . $_POST['cantidad'];
      
      
      if($_POST['stock'] >= $_POST['cantidad']){
            $quedan = $_POST['stock'] - $_POST['cantidad'];
            echo "STOCK" . $_POST['stock'];
            $modificacion = "UPDATE articulo SET stock='" . $quedan . "' WHERE codigo='" . $_POST['codigo'] . "';"; 
            mysql_query($modificacion, $conexion);
            header("Location: listado.php");  
        }else{
            echo "Quiere comprar más unidades de las que quedan disponibles";
        }
     }

      
      
     
     $consulta = mysql_query("SELECT * FROM articulo WHERE codigo='".$_POST['codigo']."'",$conexion); 
      
      $codigo = mysql_result($consulta, 0, 'codigo');
      $descripcion = mysql_result($consulta, 0, 'descripcion');
      $precioCompra = mysql_result($consulta, 0, 'precio_compra');
      $precioVenta = mysql_result($consulta, 0, 'precio_venta');
      $stock = mysql_result($consulta, 0, 'stock');
      
?>  
    <table border="1">
            <tr>    
                <td><b>Código</b></td>
                <td><b>Descripción</b></td>
                <td><b>Precio de compra</b></td>
                <td><b>Precio de venta</b></td>
                <td><b>Stock</b></td>
                <td><b>Unidades Salida</b></td>
            </tr>

            <tr>
              <td><?= $codigo?></td> 
              <td><?= $descripcion?></td>
              <td><?= $precioCompra ?></td>
              <td><?= $precioVenta ?></td>
              <td><?= $stock ?></td>
              <td><?= $_POST['cantidad'] ?></td>
            </tr>

        </table>   
    
      
    <form action="#" method="post">
        <input type="hidden" name="codigo" value="<?=$_POST['codigo']?>">
        <input type="hidden" name="stock" value="<?=$stock?>">
        <input type="hidden" name="cantidad" value="<?=$_POST['cantidad']?>">
        ¿Desea vender <?= $_POST['cantidad'] ?> unidades de este articulo? <input size="9" type="submit" name='accion' value="Vender">
    </form>
   
     <a href="listado.php"><button>Listado <i class="fa fa-list"></i></button></a> 
</body>
</html>      