<?php require_once('Connections/lealsh.php'); ?>
<?php require_once('Connections/funciones.php'); ?>
<?php

include("db/facturas.php");

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>formulario facturas</title>
</head>

<body><?php
include("ajax.php"); // incluir funciones de incorporacion
?><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>LEAL - COMUNICACIONES </td>
          <td>TYPO</td>
          <td>FECHA
            <label>
            <input name="Fecha" type="text" id="Fecha" value="<?php echo  fecha( $row_facencab['Fecha'] ) ; ?>" />
            </label><?php
			if (strlen( $row_facencab["Fecha"] ) < 2 ) {
			// agregado para crear la fecha si no esta en el campo
			?> <script type="text/javascript">
	  			document.getElementById('Fecha').value = (new Date()).format("m/dd/yy");
	</script><?php } ?></td>
        </tr>
        <tr>
          <td>leandro morala - 20-25026562-0 </td>
          <td><label>
            <select name="tipFact" id="tipFact">
              <option value="A" <?php if (!(strcmp("A", $row_facencab['tipFact']))) {echo "selected=\"selected\"";} ?>>A</option>
              <option value="B" <?php if (!(strcmp("B", $row_facencab['tipFact']))) {echo "selected=\"selected\"";} ?>>B</option>
              <option value="C" <?php if (!(strcmp("C", $row_facencab['tipFact']))) {echo "selected=\"selected\"";} ?>>C</option>
              <option value="X" <?php if (!(strcmp("X", $row_facencab['tipFact']))) {echo "selected=\"selected\"";} ?>>X</option>
            </select>
            </label></td>
          <td>NRO
            <label>
            <input name="NumeroComprobante" type="text" id="NumeroComprobante" value="<?php echo nroComprobante( 
            ( $row_facencab['NumeroComprobante'] == "" ) ? "" : $row_facencab['NumeroComprobante'] 
			, "factura" ) ; ?>" />
            </label><?php
			if (strlen( $row_facencab["Fecha"] ) < 2 ) {
			// obtener el proximo nro de comprobante	
			?><script type="text/javascript">
	  			document.getElementById('NumeroComprobante').value = enviatext( document.form1 , 'nrocomprobante') ;
	</script>
            <?php } ?></td>
        </tr>
        <tr>
          <td><input name="hiddenField" type="hidden" value="<?php echo "1" /*  nz($_SESSION['usr'],"1")*/ ; ?>" /></td>
          <td>&nbsp;</td>
          <td>RNE</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>Contrato: / cliente :
            <label><input name="idCliente" type="text" value="<?php echo $row_facencab['idCliente'] 
            ?>" id="idCliente"  onblur="enviatext(this.form,'idCliente')" /><div style="display:inline" id="contratoid" ></div>
<select name="no" id="contrato"  style="width:20%" onchange="enviatext(this.form,'contrato')">
              <?php
do {  
?>
              <option value="<?php echo $row_contrato['nrocontrato']?>"<?php 
				if (!(strcmp($row_contrato['nrocontrato'], $row_facencab['idCliente']))) {
					echo "selected=\"selected\"";} ?>><?php
					 echo $row_contrato['nrocontrato'] . "( ". $row_contrato['localidad'] .")" ?></option>
              <?php
} while ($row_contrato = mysql_fetch_assoc($contrato));
  $rows = mysql_num_rows($contrato);
  if($rows > 0) {
      mysql_data_seek($contrato, 0);
	  $row_contrato = mysql_fetch_assoc($contrato);
  }
?>
            </select> 
            o 
            <select name="si" id="cliente"  style="width:20%" onchange="enviatext(this.form,'cliente')" >
			  <?php
do {  
?>
			  <option value="<?php echo $row_clientes['id']?>"<?php 
				if (!(strcmp($row_clientes['id'], $row_facencab['idCliente']))) {
					echo "selected=\"selected\"";} ?>><?php 
					echo $row_clientes['nombre'] .", ". $row_clientes['apellido'] ."(".$row_clientes['direccion'].")" 
					?></option>
			  <?php
} while ($row_clientes = mysql_fetch_assoc($clientes));
  $rows = mysql_num_rows($clientes);
  if($rows > 0) {
      mysql_data_seek($clientes, 0);
	  $row_clientes = mysql_fetch_assoc($clientes);
  }
?>
            </select>
            </label></td>
          <td><?php if (isset($_GET["id"]) ) { ?>
			  <a href="clientes.form.php?idclie=<?php echo $row_facencab['idCliente']; ?>">ver ficha</a>
			 <?php } ?></td>
          <td>&nbsp;</td>
          <td>domicilio:</td>
          <td><div id="direccion" style="display:inline"> 	</div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Apellido / Nombre : <div id="nombreapellido" style="display:inline"> este</div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><iframe src="<?php echo $editForSubForm ?>" width="100%" name="facturadetalle"></iframe></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>SubTotal</td>
          <td>Impuesto</td>
          <td>Descuentos</td>
          <td>Total</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label>
            <input type="text" name="textfield2" />
          </label></td>
          <td><label>
            <input name="Impuesto" type="text" id="Impuesto" value="<?php echo nz($row_facencab['Impuesto'],0); ?>" />
          </label></td>
          <td>&nbsp;</td>
          <td><label>
            <input name="Total" type="text" id="Total" value="<?php echo nz($row_facencab['Total'],0); ?>" />
          </label></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td></td>
          <td>Fecha de Vencimiento</td>
          <td><input name="fechavence" type="text" id="fechavence" value="<?php echo  fecha( nz($row_facencab['fechavence'],"") ) ; ?>" /></td>
          <td>total con impuesto</td>
          <td><input name="importevence" type="text" id="importevence" value="<?php echo nz($row_facencab['importevence'],0); ?>" /></td>
        </tr>
      </table></td>
    </tr>
	<tr>
      <td>OBSERVACIONES:
        <label>
        <textarea name="Observaciones" cols="100%" id="Observaciones"><?php echo nz($row_facencab['Observaciones'],""); ?></textarea>
<?php if (isset($_GET["id"]) ) {
		// modo edicion
		?>
		<button name="MM_update" value="form1">GUARDAR</button>
		   <input name="idfactura" type="hidden" id="idfactura" value="<?php echo $_GET["id"] ?>" />
        <input name="idEmpleado" type="hidden" id="idEmpleado" value="<?php echo $row_facencab['idEmpleado']; ?>" />
        <a href="fact.form.php">nueva factura</a>
<?php } else { ?>
		<button name="MM_insert" value="form1">ADD</button>
        <input name="idEmpleado" type="hidden" id="idEmpleado" value="<?php echo $_SESSION["idusuario"] ?>" />
<?php } ?>
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($facencab);

mysql_free_result($clientes);

mysql_free_result($contrato);
?>
