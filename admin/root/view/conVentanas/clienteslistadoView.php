<?php

include("head.php");

$contador=array("t"=>0,"cero"=>0,"moroso"=>array(0,0),"adeuda"=>array(0,0));
?>
<body>
<a href="<?php echo $helper->url("clientes","index?filtro=SoloActivos" ) ?>">mostrar a todos</a>!!<a href="<?php
	echo $estaurl ?>	">solo activos(por defecto)</a><br>
<a href="<?php echo $helper->url("clientes","index?ordenado=id") ?>">ordenados por nro de alta(por defecto)</a>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <caption>
    listado de clientes
  </caption>
  <tr>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=id">nroCliente(id)</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=apellido">Apellido</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=nombre">Nombre</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=celular">telefono</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=direccion">direccion</a></th>
    <th scope="col"><a href="<?php echo $estaurl ?>&orden=id">adeudado</a></th>
    <th scope="col">otro</th>
  </tr>
  <?php 
  $losclientes = $clientes->getAll();
  foreach (  $losclientes as $cliente ) { 
	// var_dump($cliente);
	/*
	  $tx="";
	  $susaldo = saldode($row_Recordset1listadoClientes['id']);
	  $tx=$susaldo;
	  // $contador=array("t"=>0,"cero"=>0,"moroso"=>0,"adeuda"=>0);
	  $contador["t"]++;
	  if (($susaldo + 0)<>0){
			$import=importecontrato($row_Recordset1listadoClientes['id']);
			$limite = $import * .2; // 20% del limite.
			if ($susaldo > $limite) {
				$contador["moroso"][1] += $tx;
				$tx="<div class=\"moroso\" title=\"Por contrato :$import MOROSO \" >$tx</div>";
				$contador["moroso"][0]++;
				
			}else{
				 $contador["adeuda"][1] += $tx;
				 $tx="<div class=\"adeuda\" style=\"color: rgba(61, 219, 22, 0.82) ; \" title=\"adeuda por Contrato :$import\">$tx</div>";
				 $contador["adeuda"][0]++;
			}
		}else {
			if($susaldo == "El cliente no posee facturas" )
			{
				$tx="<div class=\"nosaldo\">$tx</div>";
			}else{
				$tx="<div class=\"nosaldo\" style=\"color: rgba(61, 219, 22, 0.82) ; \" >$tx</div>";
				$contador["cero"]++;
			}
		}
	  */
	  $tx="----";
	  ?>
    <tr>
      <td><?php echo $cliente->id . " /" // .$clien->id() ;  ?></td>
      <td><?php echo $cliente->apellido; ?></td>
      <td><?php echo $cliente->nombre; ?></td>
      <td><?php echo $cliente->celular; ?></td>
      <td><?php echo $cliente->direccion; ?></td>
      <td><?php echo $tx; ?></td>
      <td><a href="<?php 
		echo $helper->url("clientes","editar?id=".$cliente->id ); 
      ?>" target="_iframe-main" >editar</a></td>
    </tr>
    <?php 
    } 
    /*
     while ($row_Recordset1listadoClientes = mysql_fetch_assoc($Recordset1listadoClientes)); 
     */
     
     ?>
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
RESUMEN: <?php
echo "Total de clientes:".$contador["t"]." con saldo cero:" . $contador["cero"] 
	." total adeudado:". ( $contador["adeuda"][1] + $contador["moroso"][1] )
	." en mora: $" .$contador["moroso"][1]."(".$contador["moroso"][0].") sin mora: $" . $contador["adeuda"][1] ."(".$contador["adeuda"][0].")"  ;
	
?>
</body>
</html>
<?php
// mysql_free_result($Recordset1listadoClientes);

// mysql_free_result($saldos);
?>
