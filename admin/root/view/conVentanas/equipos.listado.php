<?php require_once('Connections/lealsh.php'); ?>
<?php
mysql_select_db($database_lealsh, $lealsh);
$query_equipos = "SELECT equipos.id as idEquipos ,   	equipos.ip,  equipos.mac,   	equipos.localidad,  equipos.modelo,   	equipos.identificador,  equipos.config,    	equipos.Estado,   	equipos.otrosdatos,     	equipos.idCliente,   	estado.Descripcion, 	modelo.idMarca,   	modelo.modelo,  modelo.observac,   	marcas.marca,  marcas.url FROM equipos      	left join           		equipo_estado estado       	on  		equipos.Estado = estado.idActivo     	left join           		equipo_modelo as modelo          		left join              			equipo_marcas as marcas          		on   			modelo.idMarca = marcas.id 	 on  		equipos.modelo = modelo.id ORDER BY equipos.id DESC ";
$equipos = mysql_query($query_equipos, $lealsh) or die(mysql_error());
$row_equipos = mysql_fetch_assoc($equipos);
$totalRows_equipos = mysql_num_rows($equipos);

mysql_select_db($database_lealsh, $lealsh);
$query_equiposestados = "SELECT * FROM equipo_estado";
$equiposestados = mysql_query($query_equiposestados, $lealsh) or die(mysql_error());
$row_equiposestados = mysql_fetch_assoc($equiposestados);
$totalRows_equiposestados = mysql_num_rows($equiposestados);

mysql_select_db($database_lealsh, $lealsh);
$query_equiposmarcas = "SELECT * FROM equipo_marcas";
$equiposmarcas = mysql_query($query_equiposmarcas, $lealsh) or die(mysql_error());
$row_equiposmarcas = mysql_fetch_assoc($equiposmarcas);
$totalRows_equiposmarcas = mysql_num_rows($equiposmarcas);

mysql_select_db($database_lealsh, $lealsh);
$query_Recordset1equiposmodelos = "SELECT * FROM equipo_modelo";
$Recordset1equiposmodelos = mysql_query($query_Recordset1equiposmodelos, $lealsh) or die(mysql_error());
$row_Recordset1equiposmodelos = mysql_fetch_assoc($Recordset1equiposmodelos);
$totalRows_Recordset1equiposmodelos = mysql_num_rows($Recordset1equiposmodelos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Untitled Document</title>
<link href="divtitle.css" rel="stylesheet" type="text/css" />
<link href="trhover.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <caption>
    listado de equipos
  </caption>
  <tr>
    <th scope="col">id</th>
    <th scope="col">direccion</th>
    <th scope="col">marca/modelo</th>
    <th scope="col">UBICACION</th>
    <th scope="col">estado</th>
    <th scope="col">accion</th>
  </tr>
  <?php do { ?>
    <tr >
      <td><?php echo $row_equipos['idEquipos']; ?></td>
      <td><?php echo $row_equipos['ip']; ?> / <?php echo $row_equipos['mac']; ?></td>
      <td><div <?php
	  if ( strlen($row_equipos['otrosdatos'] ) > 0 ) {
		echo  "title=\"" .
		"observaciones del equipo:".$row_equipos['otrosdatos'] ."\"";
	}
	
	?>><?php echo $row_equipos['marca']; ?>/<?php echo $row_equipos['modelo']; ?></div></td>
      <td><?php echo $row_equipos['localidad']; ?></td>
      <td><?php echo $row_equipos['Estado']; ?></td>
      <td><a href="equipos.form.php?idequipo=<?php echo $row_equipos['idEquipos'];  ?>">editar</a></td>
    </tr>
    <?php } while ($row_equipos = mysql_fetch_assoc($equipos)); ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($equipos);

mysql_free_result($equiposestados);

mysql_free_result($equiposmarcas);

mysql_free_result($Recordset1equiposmodelos);
?>
