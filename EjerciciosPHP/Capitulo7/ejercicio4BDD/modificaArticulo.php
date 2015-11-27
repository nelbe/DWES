<!DOCTYPE html>
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
            margin-left: 600px;
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
    
    
    //Esta tabla es para mostrar el cliente a modificar
    $consulta = mysql_query("SELECT * FROM articulo WHERE codigo='".$_GET['codigo']."'",$conexion); 
      
      $codigo = mysql_result($consulta, 0, 'codigo');
      $descripcion = mysql_result($consulta, 0, 'descripcion');
      $precioCompra = mysql_result($consulta, 0, 'precio_compra');
      $precioVenta = mysql_result($consulta, 0, 'precio_venta');
      $stock = mysql_result($consulta, 0, 'stock');
    
     if($_POST['accion']== "modificar"){
         
        $modificacion = "UPDATE articulo SET  codigo='" . $_POST[codigo] . "', descripcion='" . $_POST[descripcion] . "', precio_compra='" . $_POST[precio_compra] . "', precio_venta='" . $_POST[precio_venta] . "', stock='" . $_POST[stock] . "' WHERE codigo='" . $_GET[codigo] . "';"; 
        
        $consulta = mysql_query('SELECT * FROM articulo WHERE codigo="' . $_GET['codigo'] . '"', $conexion);
        mysql_query($modificacion, $conexion);
        header("Location: listado.php");
     } 
      
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

            <tr>
            <form action="#" method="post">    
                <td><input size="9" type="text" name="codigo" value="<?= $codigo?>" required readonly></td>
                <td><input size="9" type="text" name="descripcion" value="<?= $descripcion?>"></td>
                <td><input size="9" type="text" name="precio_compra" value="<?= $precioCompra?>"></td>
                <td><input size="9" type="text" name="precio_venta" value="<?= $precioVenta?>"></td>
                <td><input size="9" type="text" name="stock" value="<?= $stock?>"></td>
                <td><input size="9" type="submit" name='accion' value="modificar"></td>
            </form>    
            </tr>
        </table>   
    </form>  
    <a href="listado.php"><button>Listado <i class="fa fa-list"></i></button></a>
      
        
    
  </body>
</html>