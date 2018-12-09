<?php require_once('Connections/lealsh.php'); ?>
<?php

include("db/factura.detalle.php");

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="col">cant</th>
    <th scope="col">descripcion</th>
    <th scope="col">V.Unit</th>
    <th scope="col">SubTotal</th>
    <th scope="col">act.</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_detalle['Cantidad']; ?></td>
      <td><?php echo $row_detalle['Detalle']; ?></td>
      <td><?php echo $row_detalle['porunidad']; ?></td>
      <td><?php echo $row_detalle['subtotal']; $suma_total += $row_detalle['subtotal']; ?></td>
      <td><form id="modifica" name="modifica" method="post" action="">
        <label>
          <input name="borrar" type="submit" id="borrar" value="borrar" />
          <input name="id" type="hidden" id="id" value="<?php echo $row_detalle['id']; ?>" />
          </label>
        </form></td>
    </tr>
    <?php } while ($row_detalle = mysql_fetch_assoc($detalle)); ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <tr><script type="text/javascript" >
function enviarform(elform) {
  var texto ="";
  var campo=[];
  for (campo in elform) {
		try {
		   var c = elform[campo];
		   if (typeof ( c.value ) == "undefined") {
				// en caso de no definido.
			}else{
				texto +=  c.name +"="+ c.value +"&" ;
			}
		}catch (e) {
		}finally {}
	
	//	(elform[ campo ]).name +"="+ 
	//	(elform[ campo ]).value +"&" ;
  }
  parent.sndresponse(texto,"t=facturadetalle");
  return false
}
  
  </script>
  	<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>" onsubmit="enviarform(document.getElementById('form1')) ;">
    <td><label>
      <input name="Cantidad" type="text" id="Cantidad" value="1" />
    </label>     </td>
    <td><label>
      <input name="Detalle" type="text" id="Detalle" />
    </label></td>
    <td><label>
      <input name="porunidad" type="text" id="porunidad" />
    </label></td>
    <td><label>
      <input name="subtotal" type="text" id="subtotal" />
    </label></td>
    <td><label>
      <input type="submit" name="Submit" value="ADD" />
      <input name="hiddenField" type="hidden" value="<?php echo $_GET['idFactura']; ?>" />
    </label></td>
    <input type="hidden" name="MM_insert" value="form1">
    </form> </tr>
   
</table>

<script type="text/javascript">

parent.vertotal(<?php echo $suma_total ?>);

</script>
</body>
</html>
<?php
mysql_free_result($detalle);
?>
