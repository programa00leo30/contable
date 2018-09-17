<?php

?>			
					<h2 class="sub-header">Movimiento comercial de: <?php echo $cliente->nombre . ", ". $cliente->apellido ?></h2>
					<!-- seccion de informacion -->
						<div class="table-responsive">
							<table class="table table-striped">
							  <thead>
								<tr>
								  <th>fecha</th>
								  <th>tipo</th>
								  <th>descripcion</th>
								  <th>importe</th>
								  <th>total</th>
								</tr>
							  </thead>
							  <tbody id="tblClientes">
					<?php
						
						$usr=$contable->getAll( "default",$inicio,$cantidadPorHoja);
						$cont=0;
						$facturas = new facturas($clientes->id);
						$recibos = new recibos($clientes->id);
						
						foreach($usr as $k=>$v){
							
							// foreach ( $v as $i){
							if ($v->activo < 6){
								switch($v->activo){
									case "1" : $n="" ;break;
									case "2" : $n="success" ; break ;
									case "3" : $n="warning" ; break ;
									case "5" : $n="danger" ; break;
									default : $n="";
								}
							?>
						<tr class="<?php echo $n ?>" data-idcliente="<?php echo $v->id ?>">
							<td ><?php echo $v->id ."(".$v->activo . ")" ?></td>
							<td ><?php echo $v->nombre .", ". $v->apellido ?></td>
							<td><?php echo $v->direccion ?></td>
							<td ><?php echo $v->celular ?></td>
							<td><a class="delete_cliente" data-accion="borrar" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-trash"></i></a>
							<a class="edit_cliente" data-accion="editar" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-pencil"></i></a>
							<a class="config_cliente" data-accion="config" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-cog"></i></a>
							<a class="config_cliente" data-accion="contable" data-idcliente="<?php echo $v->id; ?>" href="javascript:void(0)">
                <i class="glyphicon glyphicon-usd"></i></a><?php 
								/*
								 echo "<a href=\""
								.$helper->url("clientes","editar?cliente=".$v->id ) 
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
					echo $helper->paginador($clientes,"clientes","listado",$inicio,$cantidadPorHoja);
					?>
					</div>
					<button type="button" class="bb-hello-world btn btn-primary btn-lg">Run example</button>
<?php
$elurl=$helper->url("clientes","borrar");
// ejemplo:
/*
$html->javascript("        $('.bb-hello-world').on('click', function (e) {
          bootbox.alert(\"Hello world!\");
        });
"
);

$('#tblClientes').on('click','tr td', function(evt){
   var target,idCliente,valorSeleccionado;
   /* target = $(event.target); * /
   target = $(evt.target);
   idCliente = target.parent().data('idcliente');
   valorSeleccionado = target.text();
   alert("Valor Seleccionado: "+valorSeleccionado+"\\n idCliente: "+ target.parent().data('idcliente'));
});

