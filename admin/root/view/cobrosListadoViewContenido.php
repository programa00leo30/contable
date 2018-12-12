<?php

?>			
					<h2 class="sub-header">Listado de recibos</h2>
					<!-- seccion de informacion -->
						<div class="table-responsive">
							<table class="table table-striped">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>recibo nro</th>
								  <th>cliente</th>
								  <th>monto</th>
								  <th>Acciones</th>
								</tr>
							  </thead>
							  <tbody id="tblFactura">
					<?php
						// tiempo( __FILE__ , __LINE__);
						$losclient=$clientes->getAll();
						// tiempo( __FILE__ , __LINE__);
						function eleccliente($id,$losclient){
							$ban=false;
							foreach($losclient as $v){
								if ($v->id == $id){
									$ban=true;break;
								}
							}
							if ($ban){
								return $v;
							}else{
								return null;
							}
						}
						
					while( $factura->mostrar("id",0,">") ){
						$client=eleccliente( $factura->idCliente ,$losclient );
						$nombre="[".$client->id."]".$client->nombre.", ".$client->apellido;
						$facNro = $factura->cajero."-".$factura->nrocontrol;
						$monto=$factura->Total;
						switch( 1 ){	// eleccion de estado de factura.
							case "1" : $n="" ;break;
							case "2" : $n="success" ; break ;
							case "3" : $n="warning" ; break ;
							case "5" : $n="danger" ; break;
							default : $n="";
						}
						?>
						<tr class="<?php echo $n ?>" data-idfactura="<?php echo $factura->id ?>">
							<td ><?php echo $factura->Fecha ?></td>
							<td ><?php echo $facNro ."(".$factura->id . ")" ?></td>
							<td ><?php echo $nombre ?></td>
							<td><?php echo $monto ?></td>
							<td><a class="delete_factura" data-accion="borrar" data-idfactura="<?php 
								echo $factura->id; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-trash"></i></a>
							<a class="edit_factura" data-accion="edicion" data-idfactura="<?php 
								echo $factura->id; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-pencil"></i></a>
							</td>
						</tr>
					<?php		
							}// fin del bucle.
						
					?>
						</tbody>
					</table>
					<div class="col-md-12 center">
					<?php
					// echo $pag;
					$inicio=0;$cantidadPorHoja=20;
					echo $helper->paginador($factura,"facturas","ultimas",$inicio,$cantidadPorHoja);
					?>
					</div>
					
<?php
$elurl=$helper->url("cobros","borrar");
$laur = $helper->url("cobros","editar");

$html->javascript(<<<USOJAVA

$('#tblFactura').on('click','tr td a', function(evt){
   var target,idFactu,valorSeleccionado;
   // target = $(event.target);
   target = $(evt.target);
   idFactu = target.parent().data('idfactura');
   activacion = target.parent().data('accion');
   valorSeleccionado = target.text();
   /* alert("Referencia Seleccionado: "+valorSeleccionado+"\\n idCliente: "+ target.parent().data('idcliente') +" acion:"+activacion );
   location.href = "$laur"+activacion+"?id="+idFactu; */
   haciaurl= "http:$laur"+activacion+"?idFactura="+idFactu;
   $(location).attr('href',haciaurl );

});

USOJAVA
);

