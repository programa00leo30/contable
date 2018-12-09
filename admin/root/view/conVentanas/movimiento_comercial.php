<?php
// Movimiento comercial
include("core/core.php");
include("db/saldos_clientes.php");

$l = "dir=ASC";
$ord = "";
$CLI = (isset($_GET["idCliente"]) and $_GET["idCliente"]!="" )?" id=".$_GET["idCliente"]:"";
if ($CLI == ""){
	echo "el cliente no posee facturacion posible";
	exit(0);
}
	 
$lista = new db("","SELECT *
FROM `movimientocomercial` 
where $CLI
".$ord );
$dt=$lista->fetch_array();
$t=sadode($_GET["idCliente"]); // adquiero el saldo del clinete.
?>
<body>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <caption>
    Listado de precios <?php echo "saldo actual :$ $t" ?>
  </caption>
  <tr>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=id&$l">id</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=nombre&$l">fecha</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=CET&$l">observaciones</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=FechaImporte&$l">importe</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=importe&$l">total</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=importe&$l">total</a></th>
  </tr>
  <?php do { 
  $t1=$t ; 
  $t -= $dt['total']; ?>
    <tr>
      <td><?php echo $dt['id'] ;  ?></td>
      <td><?php echo fecha($dt['fecha']); ?></td>
      <td><?php echo $dt['obsev']; ?></td>
      <td><?php echo money_format('$%.2n',$dt['total']); ?></td>
      <td><?php echo  money_format('$%.2n',$t1) ;  ?></td>
      <td><a href="<?php 
      $miid = $dt["idregistro"];
      if ($dt["tipo"]==1) {
		  // factura
		  echo "fact.form.php?id=$miid";
	  }else{
		  //recivo
		  echo "cobro.form.php?id=$miid";
		 } 
      ;
      
       ?>" target="mainFrame" >ver</a></td>
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
