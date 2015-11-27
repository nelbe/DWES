
<?php
  //Hago la conexion desde otro fichero, con un include
  include "conexion.php";

  mysql_select_db("banco", $conexion); //Seleccionamos base de datos
  mysql_set_charset('utf8');

  $borrar = "DELETE FROM cliente WHERE dni=\"$_GET[dni]\"";
    mysql_query($borrar,$conexion);


  header("Location:listado.php");
