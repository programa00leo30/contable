<?php require_once('Connections/lealsh.php'); ?>
<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET["MM_insert"])) && ($_GET["MM_insert"] == "alta")) {
  $insertSQL = sprintf("INSERT INTO equipo_marcas (id, marca, url) VALUES (%s, %s, %s)",
                       GetSQLValueString($_GET['id'], "int"),
                       GetSQLValueString($_GET['marca'], "text"),
                       GetSQLValueString($_GET['url'], "text"));

  mysql_select_db($database_lealsh, $lealsh);
  $Result1 = mysql_query($insertSQL, $lealsh) or die(mysql_error());
}

if ((isset($_GET["MM_update"])) && ($_GET["MM_update"] == "update")) {
  $updateSQL = sprintf("UPDATE equipo_marcas SET marca=%s, url=%s WHERE id=%s",
                       GetSQLValueString($_GET['marca'], "text"),
                       GetSQLValueString($_GET['url'], "text"),
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_lealsh, $lealsh);
  $Result1 = mysql_query($updateSQL, $lealsh) or die(mysql_error());
}

mysql_select_db($database_lealsh, $lealsh);
$query_marca = "SELECT * FROM equipo_marcas";
$marca = mysql_query($query_marca, $lealsh) or die(mysql_error());
$row_marca = mysql_fetch_assoc($marca);
$totalRows_marca = mysql_num_rows($marca);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>marcas de equipos</title>
<link href="divtitle.css" rel="stylesheet" type="text/css" />
<link href="trhover.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>id</td>
    <td>Marca</td>
    <td>URL Fabricante </td>
    <td>accion</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <?php do { ?>
      <form id="update" name="update" method="GET" action="<?php echo $editFormAction; ?>"><tr>
        <td>
          <label>
          <input name="id" type="text" id="id" value="<?php echo $row_marca['id']; ?>" />
          </label>    </td>
        <td><label>
          <input name="marca" type="text" id="marca" value="<?php echo $row_marca['marca']; ?>" />
            </label></td>
        <td><label>
          <input name="url" type="text" id="url" value="<?php echo $row_marca['url']; ?>" />
            </label></td>
        <td>
          <button name="MM_update" value="update">Modificar informacion</button></td>
      </tr></form>
      <?php } while ($row_marca = mysql_fetch_assoc($marca)); ?>
    
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <form id="alta" name="alta" method="POST" action="<?php echo $editFormAction; ?>">
  <tr>
    <td>
      <label>
        <input name="id" type="text" id="id" value="<?php echo $row_marca['id']; ?>" />
        </label>    </td>
    <td><label>
      <input name="marca" type="text" id="marca" value="<?php echo $row_marca['marca']; ?>" />
    </label></td>
    <td><label>
      <input name="url" type="text" id="url" value="<?php echo $row_marca['url']; ?>" />
    </label></td>
    <td>
   <button name="MM_insert" value="equipos">Alta Nuevo Equipo</button>   </td>
  </tr>
  <input type="hidden" name="MM_insert" value="alta">
  </form>
</table>
</body>
</html>
<?php
mysql_free_result($marca);
?>
