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
            margin-left: 380px;
        }
        
        input{
            size: 10px;
        }
        
        #botones{
            margin-left: 530px;
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
      
      $contarRegistros = "SELECT COUNT(dni) AS cuenta FROM cliente";
      $registros = mysql_query($contarRegistros, $conexion);
      
      $numRegistros = mysql_result($registros, 0, 'cuenta');
        
      $numPaginas = ceil($numRegistros / 5);
 
      
      //El primer numero del limit son los que devuelve por página y el segundo a partir del cual
      $consulta = mysql_query("SELECT * FROM cliente ORDER BY nombre LIMIT " . (5 * ($_SESSION['pagina']-1)) . ",5", $conexion);
      
  
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