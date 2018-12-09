<?php require_once('Connections/lealsh.php'); ?>
<?php

include("db/contratos.php");
$contar_contratos_activos=0;


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>contratos</title>
<link href="divtitle.css" rel="stylesheet" type="text/css" />
<link href="trhover.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>seccion</td>
    <td>NroContrato</td>
    <td>ip</td>
    <td>localidad</td>
    <td>Equipo</td>
    <td>Cliente</td>
    <td>plan</td>
    <td>empleado</td>
    <td>Estado</td>
    <td>acciones</td>
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
  </tr>
  <?php do { 
	  $contar_contratos_activos++;
	  ?>
    <tr>
      <td><?php echo $row_contratos['seccion']; ?></td>
      <td><?php echo $row_contratos['nrocontrato']; ?></td>
      <td><?php echo $row_contratos['ip']; ?></td>
      <td><?php echo $row_contratos['localidad']; ?></td>
      <td><div <?php 
	  		echo  "title=\"(". $row_contratos['mac']  . "-->" .  $row_contratos['modelo']  . ")\"" ; 
	  ?> ><?php 
	  		echo $row_contratos['ip']; 
	  ?></div>
      </td>
      <td><?php echo $row_contratos['idDeCliente']."-".str_replace(" ","_",$row_contratos['apellido'])."-".str_replace(" " ,"_", $row_contratos['nombre'])."[".$row_contratos['CRT']."]"; ?></td>
      <td><div <?php echo  "title=\"$".$row_contratos['importe']." x mes.\"" ;  ?>><?php echo $row_contratos['NombrePlan']; ?></div></td>
      <td><?php echo $row_contratos['empleado']; ?></td>
      <td><?php echo $row_contratos['Estado']; ?></td>
      <td><a href="contrato.form.php?nrocontrato=<?php echo $row_contratos['idContrato']; ?>">editar</a></td>
    </tr>
    <?php } while ($row_contratos = mysql_fetch_assoc($contratos)); ?>
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
  </tr>
</table><?php echo "en total existen $contar_contratos_activos contratos activos"; ?>
</body>
</html>
<?php
include("db/free.php");

?>
