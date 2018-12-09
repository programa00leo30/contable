<?php require_once('Connections/lealsh.php'); ?>
<?php
$cl= isset($_GET["cliente"])?"where `comppago`.`idCliente` = '".$_GET["cliente"]."' " :"";
mysql_select_db($database_lealsh, $lealsh);
$query_cobros = "SELECT * FROM comppago $cl ORDER BY id DESC";
$cobros = mysql_query($query_cobros, $lealsh) or die(mysql_error());
$row_cobros = mysql_fetch_assoc($cobros);
$totalRows_cobros = mysql_num_rows($cobros);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Untitled Document</title>
</head>

<body>
	<form name="filtro" action="?" method="get">
	id cliente:<input type="text" value="<?php
	echo isset($_GET["cliente"])?$_GET["cliente"]:"";
	?>" name="cliente" ><input type="submit" name="enviar" value="enviar"></form>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <caption>
    listado de cobros
  </caption>
  <tr>
    <th scope="col">nroComprobante</th>
    <th scope="col">Cliente</th>
    <th scope="col">Fecha</th>
    <th scope="col">importe total Abonado </th>
    <th scope="col">observaciones</th>
    <th scope="col">accion</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_cobros['NroComprob']; ?></td>
      <td><?php echo $row_cobros['idCliente']; ?></td>
      <td><?php echo $row_cobros['Fecha']; ?></td>
      <td><?php echo $row_cobros['Importe']; ?></td>
      <td><?php echo $row_cobros['Observac']; ?></td>
      <td><a href="cobro.form.php?id=<?php echo $row_cobros["id"] ?>">editar</a></td>
    </tr>
    <?php } while ($row_cobros = mysql_fetch_assoc($cobros)); ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
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
mysql_free_result($cobros);
?>
