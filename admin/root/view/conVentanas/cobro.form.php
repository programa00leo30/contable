<?php require_once('Connections/lealsh.php'); ?>
<?php require_once('Connections/funciones.php'); ?>
<?php

include("db/cobro.php");

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>cobros</title>
</head>

<body><?php
include("ajax.php"); // incluir funciones de incorporacion
?>
recivos:
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><label>nroComprobante
          
  <input name="NroComprob" type="text" id="NroComprob" value="<?php echo nroComprobante($row_recivos['NroComprob'] , "comppago" ); ?>" />
  </label></td>
      <td></td>
      <td><label>fecha
          <input name="Fecha" type="text" id="Fecha" value="<?php echo fecha ( $row_recivos['Fecha'] ) ; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>cliente : 
        <label>
        <input name="idCliente" type="text" id="idCliente"  value="<?php echo $row_recivos['idCliente'] ?>"/><?php if (isset($_GET["id"]) ) { ?>
			  <a href="clientes.form.php?idclie=<?php echo $row_recivos['idCliente']; ?>">ver ficha</a>
			 <?php } ?>
             <script type="text/javascript" >
function select1_onchange() {
  document.getElementById("idCliente").value
    = document.getElementById("sidCliente").value;
	enviatext(this.form,'cliente');
	
}
</script>
        <select name="si" id="sidCliente"  onchange="select1_onchange();">
          <?php
do {  
?>
			<option value="<?php 
	echo $row_clientes['id'].'"';
	if (!(strcmp($row_clientes['id'], $row_recivos['idCliente']))) {
		echo "selected=\"selected\"";
	} 
	echo ">[".$row_clientes['id']."]"
		.$row_clientes['nombre'] .", ". $row_clientes['apellido'] 
		."(".$row_clientes['direccion'].")" ;
	?></option><?php 
/*		
          <option value="<?php echo $row_clientes['id']?>"<?php if (!(strcmp($row_clientes['id'], $row_recivos['idCliente']))) {echo "selected=\"selected\"";} ?>><?php echo $row_clientes['nombre']?></option>
          <?php
*/

} while ($row_clientes = mysql_fetch_assoc($clientes));
  $rows = mysql_num_rows($clientes);
  if($rows > 0) {
      mysql_data_seek($clientes, 0);
	  $row_clientes = mysql_fetch_assoc($clientes);
  }
?>
        </select>
      </label></td>
      <td>&nbsp;</td>
      <td><label>total cobrado:
          <input name="Importe" type="text" id="Total" value="<?php echo nz( $row_recivos['Importe'] , 0 ); ?>" />
      </label></td>
    </tr>
    <tr>
      <td colspan="3"><iframe src="<?php echo $editForSubForm ?>" width="100%" scrolling="auto"></iframe></td>
    </tr>
    <tr>
      <td><label>cobrador
          <select name="cobrador" id="cobrador">
            <?php
	do { ?><option value="<?php 
				echo $row_cobrador['id'].'"';
					if ( !(strcmp($row_cobrador['id'], nz($row_recivos['idCobrador'],"")))) 
					{
							echo "selected=\"selected\""; 
					}  
					echo " >[" . $row_cobrador['id'] . "]" . $row_cobrador['Nombre']."</option>";
		} while ($row_cobrador = mysql_fetch_assoc($cobrador));
  $rows = mysql_num_rows($cobrador);
  if($rows > 0) {
      mysql_data_seek($cobrador, 0);
	  $row_cobrador = mysql_fetch_assoc($cobrador);
  }
?>
        </select>
      </label></td>
      <td colspan="2"><label>observaciones<textarea name="Observac" id="Observac"><?php 
      echo nz($row_recivos['Observac'],"" ); 
          //<textarea name="Observac" id="Observac"><?php var_dump($row_recivos) ;? > 
          
          ?></textarea>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
<?php if (isset($_GET['id'])) { ?>
  <label>
 <input name="id" type="hidden" id="id" value="<?php echo $row_recivos['id']; ?>" />
<button name="MM_update" value="form1">GUARDAR</button> 
<a href="cobro.form.php">nuevo recivo</a></label>
 <?php } else { ?>
<button name="MM_insert" value="form1">ADD</button>
<?php } ?>

</form>

</body>
</html>
<?php
mysql_free_result($recivos);

mysql_free_result($clientes);

mysql_free_result($cobrador);
?>
