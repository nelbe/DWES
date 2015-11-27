<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "banco";

    if (!($conexion = mysql_connect($host, $user, $password))) {
        echo "Error: " . mysql_errno();
      }

 ?>