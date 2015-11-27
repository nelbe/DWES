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

      mysql_select_db("banco", $conexion); //Seleccionamos base de datos
      mysql_set_charset('utf8');
    
    
    //Esta tabla es para mostrar el cliente a modificar
    $consulta = mysql_query("SELECT * FROM cliente WHERE dni='".$_GET['dni']."'",$conexion); 
      
      $dni = mysql_result($consulta, 0, 'dni');
      $nombre = mysql_result($consulta, 0, 'nombre');
      $direccion = mysql_result($consulta, 0, 'direccion');
      $telefono = mysql_result($consulta, 0, 'telefono');
    
     if($_POST['accion']== "modificar"){
        $modificacion = "UPDATE cliente SET  nombre='" . $_POST[nombre] . "', direccion='" . $_POST[direccion] . "', telefono='" . $_POST[telefono] . "' WHERE dni='" . $_GET[dni] . "';"; 
        $consulta = mysql_query('SELECT * FROM cliente WHERE dni="' . $_GET['dni'] . '"', $conexion);
        mysql_query($modificacion, $conexion);
        header("Location: listado.php");
     } 
      
    ?>
        <table border="1">
            <tr>
              <td><b>DNI</b></td>
              <td><b>Nombre</b></td>
              <td><b>Dirección</b></td>
              <td><b>Teléfono</b></td>
            </tr>

            <tr>
              <td><?= $dni?></td> 
              <td><?= $nombre?></td>
              <td><?= $direccion ?></td>
              <td><?= $telefono ?></td>
            </tr>

            <tr>
            <form action="#" method="post">    
                <td><input size="9" type="text" name="dni" value="<?= $dni?>" required></td>
                <td><input size="9" type="text" name="nombre" value="<?= $nombre?>"></td>
                <td><input size="9" type="text" name="direccion" value="<?= $direccion?>"></td>
                <td><input size="9" type="text" name="telefono" value="<?= $telefono?>"></td>
                <td><input size="9" type="submit" name='accion' value="modificar"></td>
            </form>    
            </tr>
        </table>   
    </form>  
    <a href="listado.php"><button>Listado <i class="fa fa-list"></i></button></a>
      
        
    
  </body>
</html>