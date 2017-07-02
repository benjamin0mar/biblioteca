<?php require_once('conexion.php'); ?>
<?php

mysql_select_db($database_conexion, $conexion);
$query_habitaciones = "SELECT * FROM tipo_habitacion";
$habitaciones = mysql_query($query_habitaciones, $conexion) or die(mysql_error());
$row_habitaciones = mysql_fetch_assoc($habitaciones);
$totalRows_habitaciones = mysql_num_rows($habitaciones);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>


  <?php $i=1; do { ?>
  <div style="width: 100px; height: 100px; outline: 1px solid red; display: inline;">
    <?php echo $row_habitaciones['nombre'];?>
    <?php $id[$i]=$row_habitaciones['id'];
	$i=$i+1;
	$idtipo=$row_habitaciones['id'];
	$total=$totalRows_habitaciones;
	?>
    
</div>
 <?php } while ($row_habitaciones = mysql_fetch_assoc($habitaciones)); ?>
 
 <br />
 
<?php for($j=1;$j<=$total;$j++)  
{
$valor=$id[$j];
 mysql_select_db($database_conexion, $conexion);
$query_lista = "SELECT * FROM habitacion where id_tipo_habitacion=$valor";
$lista = mysql_query($query_lista, $conexion) or die(mysql_error());
$row_lista = mysql_fetch_assoc($lista);
$totalRows_lista = mysql_num_rows($lista);
?>


 <div style="width: 100px; height: 100px; outline: 1px solid red; display: inline;">
 
<?php do { ?>
  
  
                <?php echo $row_lista['nombre']."<br>";?>        
           
            
 
    <?php } while ($row_lista = mysql_fetch_assoc($lista));  ?>
   
    
 </div> 
 
 <?php
}


?>

      
  
  
    

   
   


<br />

    
     

</body>
</html>
<?php
mysql_free_result($habitaciones);
mysql_free_result($lista);
?>
