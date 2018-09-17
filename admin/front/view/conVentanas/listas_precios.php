<?php
// listado de clientes:
include("core/core.php");
$l = "dir=ASC";
$ord = "";
if (isset($_GET["orden"])){
	if (isset($_GET["dir"])){
			if ($_GET["dir"]=="ASC") $l = "dir=DESC";
			else $l = "dir=ASC";
	}
	switch($_GET["orden"]){
		case "id" : $ord="ORDER BY id ".(($l=="dir=ASC")?"ASC":"DESC"); break; 
		case "nombre" : $ord="ORDER BY nombre ".(($l=="dir=ASC")?"ASC":"DESC"); break; 
		case "FechaImporte" : $ord="ORDER BY FechaImporte ".(($l=="dir=ASC")?"ASC":"DESC"); break;
		case "importe" : $ord="ORDER BY importe ".(($l=="dir=ASC")?"ASC":"DESC"); break;
	}
}
 
$lista = new db("","SELECT *
FROM `planes_con_importes` 
".$ord );
$dt=$lista->fetch_array();

?>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <caption>
    Listado de precios
  </caption>
  <tr>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=id&$l">id</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=nombre&$l">nombre extendido</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=CET&$l">Abreviatura</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=FechaImporte&$l">Fecha de vigencia</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=importe&$l">importe</a></th>
    <th scope="col">otro</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $dt['id'] ;  ?></td>
      <td><?php echo $dt['NombrePlan']; ?></td>
      <td><?php echo $dt['CRT']; ?></td>
      <td><?php echo $dt['FechaImporte']; ?></td>
      <td><?php echo $dt['importe']; ?></td>
      <td><a href="<?php echo $estaurl."&ed=".$dt['id']; ?>">editar</a></td>
    </tr>
    <?php } while ($dt = $lista->fetch_array() ); ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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

?>
