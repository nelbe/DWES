
<?php
  //Hago la conexion desde otro fichero, con un include
  include "conexion.php";

  $conexion->select_db("banco");
  $conexion->set_charset("utf8");

  // Hacemos una consulta para saber si el DNI mandado por el formulario existe
  $consulta = $conexion->query("SELECT COUNT(dni) AS dniexiste FROM cliente WHERE dni='".$_POST['dni']."'");

  
  //Si el COUNT devuelve 1, es que ya tiene una fila, por lo cual el DNI existe
  if (mysqli_store_result($consulta, 0, "dniexiste")==1) {
  ?>
    Ya existe un cliente con DNI <?= $_POST['dni'] ?><br>
    Por favor, vuelva a <a href="clienteNuevoForm.php">intentarlo</a>.
  <?php
  } else {
    $nuevo = $conexion->query("INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$_POST[dni]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]')");
    header("Location:listado.php");
  }
  ?>
