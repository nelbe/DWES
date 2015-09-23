<html>
<head>
    <meta charset="utf-8">
<title>Aprende los animales en inglés</title></head>
<body>
    <?php
    $per="Perro";
    $gat="Gato";
    $lor="Loro";
    ?>
 
  <table border="1">
    <tr>
      <td><strong>Español</strong></td>
      <td><strong>Inglés</strong></td>
    </tr>

    <tr>
      <td> <?php echo $per ?> </td>
      <td>Dog</td>
    </tr>

    <tr>
      <td><?php echo $gat ?></td>
      <td>Cat</td>
    </tr>
    
     <td><?php echo $lor ?></td>
     <td>Parrot</td>
  </table>
    
    <br>
    
    <table border="1">
      <?php
        echo "<tr>";
        echo "<td>" , "<strong>" , "Español" , "</strong>" , "</td>";
        echo "<td>" , "<strong>" , "Inglés" , "</strong>" , "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" , "Perro";
        echo "<td>" , "Dog";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" , "Gato";
        echo "<td>" , "Cat";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" , "Loro";
        echo "<td>" , "Parrot";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" , "Tigre";
        echo "<td>" , "Tiger";
        echo "</tr>";
      ?>
    </table>  
</body>
</html>

    