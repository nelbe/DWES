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

  mysql_select_db("banco", $conexion); //Seleccionamos base de datos
  mysql_set_charset('utf8');
 
  if($_POST['accion']== "Borrar"){
   
      $borrar = "DELETE FROM cliente WHERE dni=\"$_GET[dni]\"";
      mysql_query($borrar,$conexion);
    
     header("Location:listado.php");  
     }
     
     
     $consulta = mysql_query("SELECT * FROM cliente WHERE dni='".$_GET['dni']."'",$conexion); 
      
      $dni = mysql_result($consulta, 0, 'dni');
      $nombre = mysql_result($consulta, 0, 'nombre');
      $direccion = mysql_result($consulta, 0, 'direccion');
      $telefono = mysql_result($consulta, 0, 'telefono');
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

        </table>   
 

    <form action="#" method="post">    
        <td>¿Seguro que desea borrar este cliente? <input size="9" type="submit" name='accion' value="Borrar"></td>
    </form>
      
     <a href="listado.php"><button>Listado <i class="fa fa-list"></i></button></a> 
</body>
</html>      