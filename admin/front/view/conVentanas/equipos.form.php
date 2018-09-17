<?php require_once('Connections/lealsh.php'); ?>
<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "equipos")) {
  $updateSQL = sprintf("UPDATE equipos SET ip=%s, mac=%s, localidad=%s, modelo=%s, config=%s,". // idCliente=%s, idPlan=%s, 
  "Estado=%s, otrosdatos=%s WHERE id=%s",
                       GetSQLValueString($_POST['ip'], "text"),
                       GetSQLValueString($_POST['mac'], "text"),
                       GetSQLValueString($_POST['localidad'], "text"),
                       GetSQLValueString($_POST['modelo'], "int"),
                       GetSQLValueString($_POST['textarea'], "text"),
         //              GetSQLValueString($_POST['idCliente'], "int"),
         //              GetSQLValueString($_POST['idPlan'], "int"),
                       GetSQLValueString($_POST['estado'], "int"),
					   GetSQLValueString($_POST['otrosdatos'], "text"),
                       GetSQLValueString($_POST['hiddenField'], "int"));

  mysql_select_db($database_lealsh, $lealsh);
  $Result1 = mysql_query($updateSQL, $lealsh) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "equipos")) {
  $insertSQL = sprintf("INSERT INTO equipos (ip, mac, localidad, modelo, config, Estado , otrosdatos) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ip'], "text"),
                       GetSQLValueString($_POST['mac'], "text"),
                       GetSQLValueString($_POST['localidad'], "text"),
                       GetSQLValueString($_POST['modelo'], "int"),
                       GetSQLValueString($_POST['textarea'], "text"),
                       GetSQLValueString($_POST['estado'], "int"),
					   GetSQLValueString($_POST['otrosdatos'], "text"));

  mysql_select_db($database_lealsh, $lealsh);
  $Result1 = mysql_query($insertSQL, $lealsh) or die(mysql_error());
}

$colname_equipos = "-1";
if (isset($_GET['idequipo'])) {
  $colname_equipos = (get_magic_quotes_gpc()) ? $_GET['idequipo'] : addslashes($_GET['idequipo']);
}
mysql_select_db($database_lealsh, $lealsh);
$query_equipos = sprintf("SELECT * FROM equipos WHERE id = %s", $colname_equipos);
$equipos = mysql_query($query_equipos, $lealsh) or die(mysql_error());
$row_equipos = mysql_fetch_assoc($equipos);
$totalRows_equipos = mysql_num_rows($equipos);

mysql_select_db($database_lealsh, $lealsh);
$query_EquiposEstados = "SELECT * FROM equipo_estado";
$EquiposEstados = mysql_query($query_EquiposEstados, $lealsh) or die(mysql_error());
$row_EquiposEstados = mysql_fetch_assoc($EquiposEstados);
$totalRows_EquiposEstados = mysql_num_rows($EquiposEstados);

mysql_select_db($database_lealsh, $lealsh);
$query_EquiposMarcas = "SELECT * FROM equipo_marcas marca join equipo_modelo modelo on modelo.idMarca = marca.id";
$EquiposMarcas = mysql_query($query_EquiposMarcas, $lealsh) or die(mysql_error());
$row_EquiposMarcas = mysql_fetch_assoc($EquiposMarcas);
$totalRows_EquiposMarcas = mysql_num_rows($EquiposMarcas);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>modificar equipos</title>
<script type="text/javascript">
  function remplazar() {
            var text = document.getElementById("mac");
            text.value = text.value.replace(/-/gi,":");
			return true;
    }
</script>
</head>

<body>
<form id="equipos" name="equipos" method="POST" action="<?php echo $editFormAction; ?>">
  <p>
    <input name="hiddenField" type="hidden" value="<?php echo $row_equipos['id']; ?>" /> 
  ID: 
  <?php echo $row_equipos['id']; ?></p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>ip</td>
      <td><label>
        <input name="ip" type="text" id="ip" value="<?php echo $row_equipos['ip']; ?>" />
      </label>	  </td>
      <td>&nbsp;</td>
      <td>mac</td>
      <td><input name="mac" type="text" id="mac" value="<?php echo $row_equipos['mac']; ?>"  title="se rehemplasara automaticamente los giones ( - ) por dos puntos ( : )"/><script type="text/javascript">
document.getElementById("mac").onblur=remplazar ;
</script></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>modelo</td>
      <td><select name="modelo" id="modelo">
          <?php
do {  
?>
          <option value="<?php echo $row_EquiposMarcas['id']?>"<?php if (!(strcmp($row_EquiposMarcas['id'], $row_equipos['modelo']))) {echo "selected=\"selected\"";} ?>><?php echo $row_EquiposMarcas['modelo']?></option>
          <?php
} while ($row_EquiposMarcas = mysql_fetch_assoc($EquiposMarcas));
  $rows = mysql_num_rows($EquiposMarcas);
  if($rows > 0) {
      mysql_data_seek($EquiposMarcas, 0);
	  $row_EquiposMarcas = mysql_fetch_assoc($EquiposMarcas);
  }
?>
      </select></td>
      <td>&nbsp;</td>
      <td colspan="2" rowspan="7">configuracion(archivo texto) 
        <label>
        <textarea name="textarea" style="margin: 2px; height: 251px; width: 100%;" ><?php echo $row_equipos['config']; ?></textarea>
        </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>estado</td>
      <td><select name="estado" id="estado">
        <?php
do {  
?>
        <option value="<?php echo $row_EquiposEstados['idActivo']?>"<?php if (!(strcmp($row_EquiposEstados['idActivo'], $row_equipos['Estado']))) {echo "selected=\"selected\"";} ?>><?php echo $row_EquiposEstados['Descripcion']?></option>
        <?php
} while ($row_EquiposEstados = mysql_fetch_assoc($EquiposEstados));
  $rows = mysql_num_rows($EquiposEstados);
  if($rows > 0) {
      mysql_data_seek($EquiposEstados, 0);
	  $row_EquiposEstados = mysql_fetch_assoc($EquiposEstados);
  }
?>
            </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>ubicacion</td>
      <td><input name="localidad" type="text" id="localidad" value="<?php echo $row_equipos['localidad']; ?>" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><label>observaciones
          <textarea name="otrosdatos"   style="width:100% ; height:100%" ><?php echo $row_equipos['otrosdatos']; ?></textarea>
      </label></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>
    <label><button name="MM_insert" value="equipos">Alta Nuevo Equipo</button>
    </label>
</p>
  <p>
    <label><button name="MM_update" value="equipos">Modificar informacion</button>
    </label>
</p>
  
</form>

</body>
</html>
<?php
mysql_free_result($equipos);

mysql_free_result($EquiposEstados);

mysql_free_result($EquiposMarcas);
?>
