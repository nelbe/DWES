<?php
  //Hago la conexion desde otro fichero, con un include
  include "conexion.php";

  $borrar = "DELETE FROM cliente WHERE dni=\"$_GET[dni]\"";
    $conexion->query($borrar);

  header("Location:listado.php");
