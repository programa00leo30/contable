<?php require_once('Connections/lealsh.php'); ?>
<?php require_once('Connections/funciones.php'); ?>
<?php
$cl= isset($_GET["cliente"])?"where `cl`.`id` ='".$_GET["cliente"]."'" :"";
mysql_select_db($database_lealsh, $lealsh);
$query_facturas = "SELECT * , 
`factura`.`id` as idFact ,  
`factura`.`Observaciones` as OBS ,
`factura`.`Fecha` as FacFecha , 
CONCAT( 
	LEFT('000000', 5 - LENGTH(`factura`.`cajero`)), 
	 `factura`.`cajero`   , 
        '-' ,
	LEFT('00000000000', 10 - LENGTH(`factura`.`nrofactura`)), 
         `factura`.`nrofactura`
	 )
 as NumeroComprobante 
 
FROM factura 
left join 
	clientes cl 
on cl.id = factura.idCliente 
	left join 
		empleados em 
	on em.id = factura.idEmpleado 
$cl
ORDER BY factura.id DESC
LIMIT 0 , 500";
$facturas = mysql_query($query_facturas, $lealsh) or die(mysql_error());
$row_facturas = mysql_fetch_assoc($facturas);
$totalRows_facturas = mysql_num_rows($facturas);
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
  <tr>
    <th scope="col">id</th>
    <th scope="col">Cliente:</th>
    <th scope="col">tipo</th>
    <th scope="col">fecha</th>
    <th scope="col">nro comprobante </th>
    <th scope="col">total</th>
    <th scope="col">observ</th>
    <th scope="col">nrocupon</th>
    <th scope="col">editar:</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_facturas['idFact']; ?></td>
      <td><?php echo "[".$row_facturas['idCliente']."]".$row_facturas['apellido']."-".$row_facturas['nombre']; ?></td>
      <td><?php echo $row_facturas['tipFact']; ?></td>
      <td><?php echo fecha($row_facturas['FacFecha']); ?></td>
      <td><?php echo $row_facturas['NumeroComprobante']; ?></td>
      <td><?php echo $row_facturas['Total']; ?></td>
      <td><?php echo $row_facturas['OBS']; ?></td>
      <td><?php echo $row_facturas['nroCupon']; ?></td>
      <td><a href="fact.form.php?id=<?php echo $row_facturas['idFact']; ?>" target="mainFrame">editar</a></td>
      <td>&nbsp;</td>
    </tr>
    <?php } while ($row_facturas = mysql_fetch_assoc($facturas)); ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
mysql_free_result($facturas);
?>
