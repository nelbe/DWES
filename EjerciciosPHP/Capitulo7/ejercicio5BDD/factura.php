<?php
    session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <style>
        h1{ 
            margin-left:430px;
        }
        
        p{ 
            margin-left:230px;
        }
        
        table{
            margin-left: 80px;
        }
        
        #nuevo{
            margin-left: 76px;
        }
        
        input{
            size: 10px;
        }
        
        #botones{
            margin-left: 330px;
        }
        
        .anchoInput{
            width: 70px;
        }
        
        .anchoPrecio{
            width: 150px;
        }
        
        #venta{
            margin-left: 200px;
            width: 100px;
            height: 100px;
        }
       
        td{
            width: 215px;
            text-align: center;
        }
        
        .peque{
            border-radius: 15px;
            -moz-border-radius: 15px;
            -webkit-border-radius: 15px;
            margin-top: 2%;
            
        }

    </style>
    
  </head>
  <body>
    <?php  
    //Hago la conexion desde otro fichero, con un include
      include "conexion.php";

      mysql_select_db("gestisimal", $conexion); //Seleccionamos base de datos
      mysql_set_charset('utf8');
      
      $consulta = mysql_query("SELECT * FROM articulo", $conexion);
      
       while ($campo = mysql_fetch_array($consulta)){ //Sacamos datos fila a fila, registro a registro 
        
        $productos[$campo[codigo]] = array( 
         "codigo" => $campo['codigo'],
         "descripcion" =>  $campo['descripcion'],
         "precio_venta" => $campo['precio_venta'],   
        );
        
      } //Fin del while
      ?>
      <h1>FACTURA</h1>
      <table>
            <tr>
              <td size="9"><b>Cantidad</b></td>
              <td size="9"><b>Referencia</b></td>
              <td size="9"><b>Precio</b></td>
            </tr>
      </table>      
       <?php     
    foreach ($productos as $codigocarrito => $elemento) {
      
        if ($_SESSION['carrito'][$codigocarrito] > 0) {
          $totalcarrito = $totalcarrito + ($_SESSION['carrito'][$codigocarrito] * $elemento[precio_venta]);
          ?>
            <table>
                <tr>   
                <td size="9"><?=$_SESSION['carrito'][$codigocarrito]?></td>
                <td size="9"><?=$elemento[descripcion]?></td>
                <td size="9"><?=$elemento[precio_venta]?> €</td>
                </tr>
            </tr>
          </table>  
          <?php
        }
    }
    $cargo=0;
    $iva= $totalcarrito * 0.21;
    $descuento_6= $totalcarrito *0.06;
    
    if ($totalcarrito<75){
        $cargo=15;
    ?>
      <table class="peque">
        <td><b>TOTAL BRUTO</b>
        <td><b>DESCUENTO</b>
        <td><b>IVA 21%</b></td>
        <td><b>TOTAL</b></td>
    </table>    
    
    <table>  
        <td><?=$totalcarrito?> €</td>
        <td>-</td>
        <td><?=$iva?> €</td>
        <td><?=$iva + $totalcarrito + 15?> €</td>
   </table>
      <p>Su pedido es inferior a <b>75€</b> por lo que tiene un coste de envío de <b>15€</b></p>
    <?php  
    }elseif ($totalcarrito>200){
        $cargo=15;
    ?>
      <table class="peque">
        <td><b>TOTAL BRUTO</b>
        <td><b>DESCUENTO</b>
        <td><b>IVA 21%</b></td>
        <td><b>TOTAL</b></td>
    </table>    
    
    <table>  
        <td><?=$totalcarrito?> €</td>
        <td>6%</td>
        <td><?=$iva?> €</td>
        <td><?=$iva + $totalcarrito - $descuento_6?> €</td>
   </table>
      <p>Su pedido es superior a <b>200€</b> por lo que tiene un descuento del <b><?=$descuento_6?> €</b></p>
    <?php  
    }else{
 
    ?>
    <table class="peque">
        <td><b>TOTAL BRUTO</b>
        <td><b>DESCUENTO</b>
        <td><b>IVA 21%</b></td>
        <td><b>TOTAL</b></td>
    </table>    
    
    <table>  
        <td><?=$totalcarrito?> €</td>
        <td>-</td>
        <td><?=$iva?> €</td>
        <td><?=$iva + $totalcarrito?> €</td>
   </table> 
   <?php
   }
   
   
   ?>
  
    
        

      
  </body>
</html>