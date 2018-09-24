<?php
/* --------- clientesFormulario
 * formulario de edicion y agregado de clientes
 * facturaFormDetalleViewContenido.php
 * 
 */
$mensaje=isset($mensaje)?$mensaje:"";
if (!isset($l)) $l="";
$ngroup = "has-error has-feedback";
$inputgroup = "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span><div class=\"warning\" >"
	. $mensaje ."</div>";
// funcion para que aparezca la fecha en el costado de los campos pertinentes.
// $html->javascript("",$helper->url("js","bootstrap-datetimepicker.min.js"));
// esta pagina esta en modalidad iframe.

// solamente los detalles de la factura actual. 
// $detalle = $fact_detalle->getBy( "idFact",$idfactura);

?>
		<div class="signup-form-container">
    
			 <!-- form start -->
			 
			 
				<div class="form-header">
					<div class="pull-left"></div>
					<h3 class="form-title">
					<i class="fa fa-user"></i>detalle factura:</h3><?php echo nz($l) ; ?>
				</div>
				<table>
					<tr>
						<th>id</th>
						<th>relacFactura</th>
						<th>cantidad</th>
						<th>detalle</th>
						<th>precio por unidad</th>
						<th>subtotal</th>
						<th>accion</th>
					</tr>
				<?php 
					// listado de registros.
			while( $fact_detalle->mostrar("idFact",$idfactura) ){
				?>
			<form role="form" id="register-form" autocomplete="off" method="post" action="<?php 
				echo $helper->url("facturas","iframe/confirmardetalle?iddetalle=".$fact_detalle->id ) ?>" >
				<tr>
					<td><?php echo $fact_detalle->mostrar_editar("id",$html) ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("idFact",$html) ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("Cantidad",$html) ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("Detalle",$html) ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("porunidad",$html) ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("subtotal",$html) ?></td>
					<td><div class="form-footer">
					 <button type="submit" class="btn btn-info">
					 <span class="glyphicon glyphicon-log-in"></span>modificar</button>
				</div></td>
				  </tr>
			</form>
				<?php 
					// fin de listado de registros.
				}
				// agregar detalle:
				?>
				<form role="form" id="register-form" autocomplete="off" method="post" action="<?php 
				echo $helper->url("facturas","iframe/confirmardetalle?agregar=si" ) ?>" >
				<tr>
					<td>&Euml;nuevo</td>
					<td><?php echo $fact_detalle->mostrar_editar("idFact",$html,$idfactura) ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("Cantidad",$html,"") ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("Detalle",$html,"") ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("porunidad",$html,"") ?></td>
					<td><?php echo $fact_detalle->mostrar_editar("subtotal",$html,"") ?></td>
					<td><div class="form-footer">
						 <button type="submit" class="btn btn-info">
						 <span class="glyphicon glyphicon-log-in"></span>agregar</button>
						</div>
					</td>
				  </tr>
				</form>
			
			</table>
		</div>
		
