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
    
    //Esta tabla es para mostrar el cliente a modificar
    $consulta = $conexion->query("SELECT * FROM cliente WHERE dni='".$_GET['dni']."'"); 
      
    /*Extracción de la fila seleccionada y almacenamiento en variables para los values del form*/
        $registro = $consulta->fetchObject();
        
        $dni = $registro->dni;
        $nombre = $registro->nombre;
        $direccion = $registro->direccion;
        $telefono = $registro->telefono;
    
      /*$dni = mysqli_store_result($consulta, 0, 'dni');
      $nombre = mysqli_store_result($consulta, 0, 'nombre');
      $direccion = mysqli_store_result($consulta, 0, 'direccion');
      $telefono = mysqli_store_result($consulta, 0, 'telefono');*/
    
     if($_POST['accion']== "modificar"){
        $modificacion = "UPDATE cliente SET  nombre='" . $_POST[nombre] . "', direccion='" . $_POST[direccion] . "', telefono='" . $_POST[telefono] . "' WHERE dni='" . $_GET[dni] . "';"; 
        $consulta = $conexion->query('SELECT * FROM cliente WHERE dni="' . $_GET['dni'] . '"');
        $conexion->query($modificacion);
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