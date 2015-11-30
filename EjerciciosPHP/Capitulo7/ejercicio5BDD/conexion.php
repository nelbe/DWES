<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "gestisimal";

    if (!($conexion = mysql_connect($host, $user, $password))) {
        echo "Error: " . mysql_errno();
      }

 ?>