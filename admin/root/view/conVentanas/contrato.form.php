<?php require_once('Connections/lealsh.php'); ?>
<?php require_once('Connections/funciones.php'); ?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

include("db/contratos.php");
include("db/clientes.php");
include("db/contrato_estados.php");
include("db/planes.php");

mysql_select_db($database_lealsh, $lealsh);
$query_equipo = "SELECT equipos.id as idEquipos ,   	 CONCAT ( equipos.ip , \"-\" , equipos.mac , \"- (\" , modelo.modelo, \"/\" , marcas.marca , \")\" ) as nombre  ,    	equipos.Estado,   	equipos.otrosdatos,   	estado.Descripcion FROM equipos      	 	left join           		 	equipo_estado estado       	 	on equipos.Estado = estado.idActivo     	 	 	left join           		 	equipo_modelo modelo          		 		left join              			 		equipo_marcas marcas          		 		on modelo.idMarca = marcas.id 	  	on equipos.modelo = modelo.id ORDER BY equipos.id DESC ";
$equipo = mysql_query($query_equipo, $lealsh) or die(mysql_error());
$row_equipo = mysql_fetch_assoc($equipo);
$totalRows_equipo = mysql_num_rows($equipo);

mysql_select_db($database_lealsh, $lealsh);
$query_empleados = "SELECT * FROM empleados";
$empleados = mysql_query($query_empleados, $lealsh) or die(mysql_error());
$row_empleados = mysql_fetch_assoc($empleados);
$totalRows_empleados = mysql_num_rows($empleados);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Alta o modificar contratos</title>
</head>

<body><?php

// include("ajax.contrato.php");

?><div style=""><form id="form_contratos" name="form_contratos" method="POST" action="<?php echo $editFormAction; ?>">
  <input name="idContrato" type="hidden" id="idContrato" value="<?php echo  $row_contrato['idContrato'] ; ?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td>Fecha de Alta</td>
    <td>
      <input name="fechaalta" type="text" id="fechaalta" value="<?php echo fecha($row_contrato['fechaalta']); ?>" />
    </td>
    <td>&nbsp;</td>
    <td>Fecha de Cierre</td>
<td>
      <input name="fechacierre" type="text" id="fechacierre" value="<?php echo 
		fecha( $row_contrato['fechacierre'] ); 
		?>" />
	</td>
  </tr>

  <tr>
    <td>Seccion</td>
    <td><label>
      <input name="seccion" type="text" id="seccion" value="<?php echo $row_contrato['seccion']; ?>" />
    </label></td>
    <td>&nbsp;</td>
    <td>NroContrato</td>
<td><label>
      <input name="nrocontrato" type="text" id="nrocontrato" value="<?php echo 
		nroComprobante ( $row_contrato['nrocontrato'] , "contrato"); 
		?>" />id:<?php echo 
		 $row_contrato['idContrato'] ; 
		?>

    </label></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Cliente</td>
    <td><label>
		<?php 
				echo cliente_selector( $row_contrato['idCliente'] ) 
		?>
      <a href="clientes.form.php" target="altas">nuevo</a></label></td>
    <td>&nbsp;</td>
    <td>Plan importe: </td>
    <td><label>
      <select name="idPlan" id="idPlan">
        <?php
do {  
?>
        <option value="<?php echo $row_planes['id']?>"<?php if (!(strcmp($row_planes['id'], $row_contrato['idPlan']))) {echo "selected=\"selected\"";} ?>><?php echo $row_planes['NombrePlan']?></option>
        <?php
} while ($row_planes = mysql_fetch_assoc($planes));
  $rows = mysql_num_rows($planes);
  if($rows > 0) {
      mysql_data_seek($planes, 0);
	  $row_planes = mysql_fetch_assoc($planes);
  }
?>
      </select>
    nuevo</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Equipo utilizado </td>
    <td><label>
      <select name="idEquipo" id="idEquipo">
        <?php
do {  
?>
        <option value="<?php echo $row_equipo['idEquipos']?>"<?php if (!(strcmp($row_equipo['idEquipos'], $row_contrato['idEquipo']))) {echo "selected=\"selected\"";} ?>><?php echo $row_equipo['nombre']?></option>
<?php
} while ($row_equipo = mysql_fetch_assoc($equipo));
  $rows = mysql_num_rows($equipo);
  if($rows > 0) {
      mysql_data_seek($equipo, 0);
	  $row_equipo = mysql_fetch_assoc($equipo);
  }
?>
      </select>
      <a href="equipos.form.php" target="altas">nuevo</a></label></td>
    <td>&nbsp;</td>
    <td>Empleado asociado </td>
    <td><label>
      <select name="idEmpleado" id="idEmpleado">
        <?php
do {  
?>
        <option value="<?php echo $row_empleados['id']?>"<?php if (!(strcmp($row_empleados['id'], $row_contrato['idEmpleado']))) {echo "selected=\"selected\"";} ?>><?php echo $row_empleados['Nombre']?></option>
        <?php
} while ($row_empleados = mysql_fetch_assoc($empleados));
  $rows = mysql_num_rows($empleados);
  if($rows > 0) {
      mysql_data_seek($empleados, 0);
	  $row_empleados = mysql_fetch_assoc($empleados);
  }
?>
      </select>
    nuevo</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Estado del contrato </td>
    <td><label>
      <select name="estado" id="estado">
        <?php
do {  
?>
        <option value="<?php echo $row_contrato_estados['id']?>"<?php 
        // verificar cual esta seleccionado....
			if (!(strcmp($row_contrato_estados['id'], $row_contrato['Estado']))) {
					echo "selected=\"selected\"";} ?>><?php echo $row_contrato_estados['estado']?></option>
<?php
} while ($row_contrato_estados = mysql_fetch_assoc($contrato_estados));
  $rows = mysql_num_rows($contrato_estados);
  if($rows > 0) {
      mysql_data_seek($contrato_estados, 0);
	  $row_contrato_estados = mysql_fetch_assoc($contrato_estados);
  }
?>
      </select>
      <a href="" target="altas">nuevo</a></label>
		
		</td>
    <td>&nbsp;</td>
    <td>ip asociada al cliente </td>
    <td><label>
      <input name="ip" type="text" id="ip" value="<?php echo $row_contrato['ip']; ?>" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Direccion de facturacion </td>
    <td><label>
      <input name="localidad" type="text" id="localidad" value="<?php echo $row_contrato['localidad']; ?>" />
    </label></td>
    <td>&nbsp;</td>
    <td>otros datos </td>
    <td><label>
      <input name="otrosdatos" type="text" id="otrosdatos" value="<?php echo $row_contrato['otrosdatos']; ?>" />
    </label></td>
  </tr>
</table><?php
$SINO = ! nz( $row_contrato['idContrato']  ) != "" ;
if ($SINO){ 
	?><button name="MM_insert" value="form_contratos">alta</button><?php 
	 }else{ ?><button name="MM_update" value="form_contratos">modificacion</button><?php
	 ;}

 
	?>
</form></div><div style="width:100%; heigth:100%; height: 100%;">
<iframe src="" name="altas" scrolling="yes"  id="altas" title="altas"  width="100%" height="100%"></iframe>
</div>
</body>
</html>
<?php
// liberar todas las conecciones
include("db/free.php");
?>
