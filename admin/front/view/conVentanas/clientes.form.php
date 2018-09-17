<?php require_once('Connections/lealsh.php'); ?>
<?php

include("db/clientes.php");



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>clientes altasmodifca</title>
<script  type="text/javascript" >
function newidclie(x)
{
  function convert(str, p1, offset, s)
  {
   return "idclie=" + document.forms["form_clientes"]["modid"].value ;
  }
  var s = String(x);
  var test = /(idclie=\d+(?:\.\d*)?)\b/g;
  return s.replace(test, convert);
}

function greeting()
{
var tr = newidclie(document.forms["form_clientes"].action);
// tr..replace( /idclie=[0-9]+&/g , "?idclie=" + document.forms["form_clientes"]["modid"].value +"&");
// tr += document.forms["form_clientes"]["modid"].value;
document.forms["form_clientes"].action = tr ;
// alert ( "acion=" + tr ) ;

}

</script>
</head>

<body>
<?php 
echo "ver";

include("plantillas/clientes.forms.php");

?>
<?php if (nz($row_Recordset1clienteform['id']) != ""){  ?>
<iframe src="index.php?movimiento_comercial&idCliente=<?php echo $row_Recordset1clienteform['id'] ?>" style='width: 100%; height: 250px;' ></iframe><?php
}
?>
</body>
</html>
<?php
mysql_free_result($Recordset1clienteform);
?>
