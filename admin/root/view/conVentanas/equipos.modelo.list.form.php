<?php require_once('Connections/lealsh.php'); ?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "update")) {
  $updateSQL = sprintf("UPDATE equipo_modelo SET idMarca=%s, modelo=%s, observac=%s WHERE id=%s",
                       GetSQLValueString($_POST['marcaMod'], "int"),
                       GetSQLValueString($_POST['modelo'], "text"),
                       GetSQLValueString($_POST['observac'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_lealsh, $lealsh);
  $Result1 = mysql_query($updateSQL, $lealsh) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "alta")) {
  $insertSQL = sprintf("INSERT INTO equipo_modelo (id, idMarca, modelo, observac) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['marcaAlt'], "int"),
                       GetSQLValueString($_POST['modelo'], "text"),
                       GetSQLValueString($_POST['observac'], "text"));

  mysql_select_db($database_lealsh, $lealsh);
  $Result1 = mysql_query($insertSQL, $lealsh) or die(mysql_error());
}

mysql_select_db($database_lealsh, $lealsh);
$query_Recordset1modelo = "SELECT * FROM equipo_modelo ORDER BY id DESC";
$Recordset1modelo = mysql_query($query_Recordset1modelo, $lealsh) or die(mysql_error());
$row_Recordset1modelo = mysql_fetch_assoc($Recordset1modelo);
$totalRows_Recordset1modelo = mysql_num_rows($Recordset1modelo);

mysql_select_db($database_lealsh, $lealsh);
$query_marca = "SELECT * FROM equipo_marcas";
$marca = mysql_query($query_marca, $lealsh) or die(mysql_error());
$row_marca = mysql_fetch_assoc($marca);
$totalRows_marca = mysql_num_rows($marca);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>modelos de equipos</title>
<link href="divtitle.css" rel="stylesheet" type="text/css" />
<link href="trhover.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>id</td>
    <td>Marca</td>
    <td>modelo</td>
    <td>Observaciones</td>
    <td>accion</td>
  </tr>
  <form action="<?php echo $editFormAction; ?>" id="alta" name="alta" method="POST">
  <tr>
    <td>
      <label>
        <input name="id" type="text" id="id" />
        </label>    </td>
    <td><label>
      <select name="marcaAlt" id="marcaAlt">
        <?php
do {  
?>
        <option value="<?php echo $row_marca['id']?>"><?php echo $row_marca['marca']?></option>
<?php
} while ($row_marca = mysql_fetch_assoc($marca));
  $rows = mysql_num_rows($marca);
  if($rows > 0) {
      mysql_data_seek($marca, 0);
	  $row_marca = mysql_fetch_assoc($marca);
  }
?>
      </select>
    </label></td>
    <td><label>
      <input name="modelo" type="text" id="modelo" />
    </label></td>
    <td><label>
	<textarea name="observac" rows="1" id="observac" >$r["nombre"]="";
$r["url"]="";</textarea>
    </label></td>
    <td>
   <button name="MM_insert" value="alta">Alta Nuevo Equipo</button>   </td>
  </tr>
  </form>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <?php do { ?><form action="<?php echo $editFormAction; ?>" id="update" name="update" method="POST">
      <tr>
        <td><label>
          <input name="id" type="text" id="id" value="<?php echo $row_Recordset1modelo['id']; ?>" />
                    </label>      </td>
        <td><label>
          <select name="marcaMod" id="marcaMod">
            <?php
do {  
?>
            <option value="<?php echo $row_marca['id']?>"<?php if (!(strcmp($row_marca['id'], $row_Recordset1modelo['idMarca']))) {echo "selected=\"selected\"";} ?>><?php echo $row_marca['marca']?></option>
            <?php
} while ($row_marca = mysql_fetch_assoc($marca));
  $rows = mysql_num_rows($marca);
  if($rows > 0) {
      mysql_data_seek($marca, 0);
	  $row_marca = mysql_fetch_assoc($marca);
  }
?>
          </select>
          </label></td>
        <td><label>
          <input name="modelo" type="text" id="modelo" value="<?php echo $row_Recordset1modelo['modelo']; ?>" />
                  </label></td>
        <td><label>
          <textarea name="observac" rows="1" id="observac" ><?php echo $row_Recordset1modelo['observac']; ?></textarea>
          </label></td>
        <td><button name="MM_update" value="update">Modificar informacion</button></td>
      </tr>
        </form><?php } while ($row_Recordset1modelo = mysql_fetch_assoc($Recordset1modelo)); ?>

  <tr>
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
mysql_free_result($Recordset1modelo);

mysql_free_result($marca);
?>
