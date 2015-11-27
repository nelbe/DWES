
<?php
  //Hago la conexion desde otro fichero, con un include
  include "conexion.php";

  mysql_select_db("banco", $conexion); //Seleccionamos base de datos
  mysql_set_charset('utf8');

  // Hacemos una consulta para saber si el DNI mandado por el formulario existe
  $consulta = mysql_query("SELECT COUNT(dni) AS dniexiste FROM cliente WHERE dni='".$_POST['dni']."'",$conexion);

  //Si el COUNT devuelve 1, es que ya tiene una fila, por lo cual el DNI existe
  if (mysql_result($consulta, 0, "dniexiste")==1) {
  ?>
    Ya existe un cliente con DNI <?= $_POST['dni'] ?><br>
    Por favor, vuelva a <a href="listado.php">intentarlo</a>.
  <?php
  } else {
    $nuevo = mysql_query("INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$_POST[dni]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]')",$conexion);
    header("Location:listado.php");
  }
  ?>