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
 
  if($_POST['accion']== "Borrar"){
   
      $borrar = "DELETE FROM articulo WHERE codigo=\"$_GET[codigo]\"";
      mysql_query($borrar,$conexion);
    
     header("Location:listado.php");  
     }
     
     
     $consulta = mysql_query("SELECT * FROM articulo WHERE codigo='".$_GET['codigo']."'",$conexion); 
      
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
            </tr>

            <tr>
              <td><?= $codigo?></td> 
              <td><?= $descripcion?></td>
              <td><?= $precioCompra ?></td>
              <td><?= $precioVenta ?></td>
              <td><?= $stock ?></td>
            </tr>

        </table>   
 

    <form action="#" method="post">    
        <td>¿Seguro que desea borrar este cliente? <input size="9" type="submit" name='accion' value="Borrar"></td>
    </form>
      
     <a href="listado.php"><button>Listado <i class="fa fa-list"></i></button></a> 
</body>
</html>      