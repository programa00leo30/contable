<?php

?>			
					<h2 class="sub-header">Seleccionar un cliente</h2>
					<!-- seccion de informacion -->
						<div class="table-responsive">
							<table class="table table-striped">
							  <thead>
								<tr>
								  <th>##</th>
								  <th>nombre, apellido</th>
								  <th>direccion</th>
								  <th>celular</th>
								  <th>acciones</th>
								</tr>
							  </thead>
							  <tbody id="tblClientes">
					<?php
						
						// $usr=$cliente->getAll( "default",$inicio,$cantidadPorHoja);
						$cont=0;
						// $facturas = new facturas($clientes->id);
						// $recibos = new recibos($clientes->id);
						
						// foreach($usr as $k=>$v){
						// solo los clientes activos de categoria menor que 6
						while ( $cliente->mostrar("activo","6","<") ){
							$n="";
							// foreach ( $v as $i){
							if ($cliente->activo < 6){
								switch($cliente->activo){
									case "1" : $n="" ;break;
									case "2" : $n="success" ; break ;
									case "3" : $n="warning" ; break ;
									case "5" : $n="danger" ; break;
								}
							?>
						<tr class="<?php echo $n ?>" data-idcliente="<?php echo $cliente->id ?>">
							<td ><?php echo $cliente->id ."(".$cliente->activo . ")" ?></td>
							<td ><?php echo $cliente->nombre .", ". $cliente->apellido ?></td>
							<td><?php echo $cliente->direccion ?></td>
							<td ><?php echo $cliente->celular ?></td>
							<td><a class="config_cliente" data-accion="selecione" data-idcliente="<?php 
										echo $cliente->id; ?>" href="javascript:void(0)">
							<i class="glyphicon glyphicon-cog"></i></a><?php 
								/*
								 echo "<a href=\""
								.$helper->url("clientes","editar?cliente=".$cliente->id ) 
								."\">editar</a>" ; */
								?></td>
						</tr>
					<?php		
							} // si esta activo.
						} // fin del bucle.
						
					?>
						</tbody>
					</table>
					<div class="col-md-12 center">
					<?php
					// echo $pag;
					echo $helper->paginador($cliente,"clientes","listado",$inicio,$cantidadPorHoja);
					?>
					</div>
					<button type="button" class="bb-hello-world btn btn-primary btn-lg">Run example</button>
<?php
$elurl=$helper->url("clientes","borrar");
$laur = $helper->url("clientes","");


$html->javascript(<<<USOJAVA

$('#tblClientes').on('click','tr td a', function(evt){
   var target,idCliente,valorSeleccionado;
   target = $(evt.target);
   idCliente = target.parent().data('idcliente');
   activacion = target.parent().data('accion');
   valorSeleccionado = target.text();
   /* 
   alert("Referencia Seleccionado: "+
		valorSeleccionado+"\\n idCliente: "+ 
		target.parent().data('idcliente') +
		" acion:"+activacion );
   location.href = "$laur"+activacion+"?id="+idCliente; 
   */
   haciaurl= "http:$laur"+activacion+"?cliente="+idCliente;
   $(location).attr('href',haciaurl );
});

USOJAVA
);
