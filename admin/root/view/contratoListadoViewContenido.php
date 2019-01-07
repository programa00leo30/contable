<?php

?>			
					<h2 class="sub-header">Listado de contratos</h2>
					<!-- seccion de informacion -->
						<div class="table-responsive">
							<table class="table table-striped">
							  <thead>
								<tr>
								  <th>#</th>
								  <th>Fecha</th>
								  <th>Cliente</th>
								  <th>seccion y contrato nro</th>
								  <th>IP</th>
								  <th>PLAN</th>
								  <th>Acciones</th>
								</tr>
							  </thead>
							  <tbody id="tblContratos">
					<?php
						// tiempo( __FILE__ , __LINE__);
						
					while( $contratos->mostrar("id",0,">") ){
						/*
						 * `id`, `nrocontrato`, `seccion`, 
						 * `ip`, `localidad`, `idEquipo`, `idCliente`, 
						 * `idPlan`, `idEmpleado`, `Estado`, `fechaalta`, 
						 * `fechacierre`, `otrosdatos`
						 * 
						 * */
						 $clientes->buscar("id",$contratos->idCliente );
						$nombre="[".$clientes->id."]".$clientes->nombre.", ".$clientes->apellido;
						$facNro = $contratos->seccion."-".$contratos->nrocontrato;
						$ip = $contratos->ip;
						$PLAN = $contratos->idPlan;
						
						switch( 1 ){	// eleccion de estado de factura.
							case "1" : $n="" ;break;
							case "2" : $n="success" ; break ;
							case "3" : $n="warning" ; break ;
							case "5" : $n="danger" ; break;
							default : $n="";
						}
						?>
						<tr class="<?php echo $n ?>" data-idfactura="<?php echo $contratos->id ?>">
							<td ><?php echo $contratos->id ?></td>
							<td ><?php echo $contratos->Fecha ?></td>
							<td ><?php echo $nombre ?></td>
							<td ><?php echo $facNro ."(".$contratos->id . ")" ?></td>
							<td><?php echo $ip ?></td>
							<td><?php echo $PLAN ?></td>
							<td><a class="delete_contrato" data-accion="borrar" data-idfactura="<?php 
								echo $contratos->id; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-trash"></i></a>
							<a class="edit_contrato" data-accion="edicion" data-idfactura="<?php 
								echo $contratos->id; ?>" href="javascript:void(0)">
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
					echo $helper->paginador($contratos,"contratos","listado",$inicio,$cantidadPorHoja);
					?>
					</div>
					
<?php
$elurl=$helper->url("contratos","");
$laur = $helper->url("contratos","");

$html->javascript(<<<USOJAVA

$('#tblContratos').on('click','tr td a', function(evt){
   var target,idFactu,valorSeleccionado;
   // target = $(event.target);
   target = $(evt.target);
   idFactu = target.parent().data('idfactura');
   activacion = target.parent().data('accion');
   valorSeleccionado = target.text();
   /* alert("Referencia Seleccionado: "+valorSeleccionado+"\\n idCliente: "+ target.parent().data('idcliente') +" acion:"+activacion );
   location.href = "$laur"+activacion+"?id="+idFactu; */
   haciaurl= "http:$laur"+activacion+"?id="+idFactu;
   $(location).attr('href',haciaurl );

});

USOJAVA
);

