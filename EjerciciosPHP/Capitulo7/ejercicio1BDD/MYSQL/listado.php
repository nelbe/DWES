<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <style>
        h2{
            text-align: center;
        }
        
        table{
            margin-left: 380px;
        }
        
        input{
            size: 10px;
        }
    
    </style>
    
  </head>
  <body>
    <h2>BANCO<br></h2>
    <?php
    
      //Hago la conexion desde otro fichero, con un include
      include "conexion.php";

      mysql_select_db("banco", $conexion); //Seleccionamos base de datos
      mysql_set_charset('utf8');
      
      //Aquí hago el listado de todos los elementos de cliente
      $consulta = mysql_query("SELECT * FROM cliente", $conexion);
    
    //Ahora muestro en una tabla todos los elementos  
    ?>
    <h2>Tabla de CLIENTES<br></h2>
    <table border="1">
    <tr>
      <td><b>DNI</b></td>
      <td><b>Nombre</b></td>
      <td><b>Dirección</b></td>
      <td><b>Teléfono</b></td>
      <td></td>
    </tr>

    <?php
    //Con el siguiente bucle, se ejecuta mientras que haya datos
      while ($campo = mysql_fetch_array($consulta)){ //Sacamos datos fila a fila, registro a registro 
        ?>
        <tr>
          <td><?= $campo['dni'] //También se podría poner el número del campo $registro[0]?></td> 
          <td><?= $campo['nombre'] ?></td>
          <td><?= $campo['direccion'] ?></td>
          <td><?= $campo['telefono'] ?></td>
          <td><a href="clienteBorrar.php?dni=<?=$campo['dni']?>"><button><i class="fa fa-trash-o"></i>
</button></a> <a href="modificaCliente.php?dni=<?=$campo['dni']?>"><button id="modifica"><i class="fa fa-pencil-square-o"></i>
    </button></a> </td>
        </tr>
  
        <?php
      } //Fin del while
     
    ?>
    </table> 
    <form action="clienteNuevo.php" method="post">
        <table
            <tr>
            <td><input size="9" type="text" name="dni" required></td>
            <td><input size="9" type="text" name="nombre" required></td>
            <td><input size="9" type="text" name="direccion"></td>
            <td><input size="9" type="text" name="telefono"></td>
            <td><input type="submit" value="Nuevo"></td>      
            </tr>
        <table>  
    </form>    
  </body>
</html>