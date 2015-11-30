<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
<?php
//Hago la conexion desde otro fichero, con un include
include "conexion.php";

mysql_select_db("gestisimal", $conexion); //Seleccionamos base de datos
mysql_set_charset('utf8');

// Hacemos una consulta para saber si el DNI mandado por el formulario existe
$consulta = mysql_query("SELECT COUNT(codigo) AS codigoExiste FROM articulo WHERE codigo='" . $_POST['codigo'] . "'", $conexion);

//Si el COUNT devuelve 1, es que ya tiene una fila, por lo cual el codigo existe
if (mysql_result($consulta, 0, "codigoExiste") == 1) {
    ?>
    Ya existe un artículo con el código <?= $_POST['codigo'] ?><br>
    Por favor, vuelva a <a href="listado.php">intentarlo.</a>
    <?php
} else {
    $nuevo = mysql_query("INSERT INTO articulo (codigo, descripcion, precio_compra, precio_venta, stock) VALUES ('$_POST[codigo]','$_POST[descripcion]','$_POST[precio_compra]','$_POST[precio_venta]','$_POST[stock]')", $conexion);
    header("Location:listado.php");
}
?>
  </body>
</html>