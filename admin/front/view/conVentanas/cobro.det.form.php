<?php require_once('Connections/lealsh.php'); ?>
<?php require_once('Connections/funciones.php'); ?>
<?php

include("db/cobro.det.php");


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>cobros detalles</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">Factura</th>
    <th scope="col">imporet aplicado </th>
    <th scope="col">accion</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_recivosdetalles['idFactura']; ?></td>
      <td><?php echo $row_recivosdetalles['ImporteAplicado']; $suma_total +=  $row_recivosdetalles['ImporteAplicado'] ; ?></td>
      <td><a href="?borrar=true&id=<?php echo $row_recivosdetalles["id"] ?>">borrar</a></td>
    </tr>
    <?php } while ($row_recivosdetalles = mysql_fetch_assoc($recivosdetalles)); ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
    <td>
      <label></label>
   
      <label>
      <select name="idFactura" id="idFactura">
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset1facturas['id']?>"<?php if (!(strcmp($row_Recordset1facturas['id'], $row_recivosdetalles['idFactura']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset1facturas['Fecha']." -" . $row_Recordset1facturas['NumeroComprobante']."  $" .$row_Recordset1facturas['total'] . " ( ".$row_Recordset1facturas['adeuda'] .")" ; ?></option>
        <?php
} while ($row_Recordset1facturas = mysql_fetch_assoc($Recordset1facturas));
  $rows = mysql_num_rows($Recordset1facturas);
  if($rows > 0) {
      mysql_data_seek($Recordset1facturas, 0);
	  $row_Recordset1facturas = mysql_fetch_assoc($Recordset1facturas);
  }
?>
      </select>
      </label></td>
    <td>
      <label>
        <input name="ImporteAplicado" type="text" id="ImporteAplicado" />
        </label>
    
      <input name="idComprobante" type="hidden" id="idComprobante" value="<?php echo $_GET['id']; ?>" /></td>
    <td><button name="MM_insert" value="form1">ADD</button></td>
  </form></tr>
</table><script type="text/javascript">

parent.vertotal(<?php echo $suma_total ?>);

</script>
</body>
</html>
<?php
mysql_free_result($recivosdetalles);

mysql_free_result($Recordset1facturas);
?>
