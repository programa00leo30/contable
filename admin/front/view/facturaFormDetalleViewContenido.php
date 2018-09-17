<?php
/* --------- clientesFormulario
 * formulario de edicion y agregado de clientes
 * facturaFormDetalleViewContenido.php
 * 
 */
if (!isset($l)) $l="";
$ngroup = "has-error has-feedback";
$inputgroup = "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span><div class=\"warning\" >$mensaje</div>";
// funcion para que aparezca la fecha en el costado de los campos pertinentes.
// $html->javascript("",$helper->url("js","bootstrap-datetimepicker.min.js"));
// esta pagina esta en modalidad iframe.

?>
		<div class="signup-form-container">
    
			 <!-- form start -->
			 <form role="form" id="register-form" autocomplete="off" method="post" action="<?php 
				echo $helper->url("facturas","detalleeditar" ) ?>" >
			 
			 <div class="form-header">
				<div class="pull-left"></div>
					<h3 class="form-title">
					<i class="fa fa-user"></i>detalle factura:</h3><?php echo $l ; ?>
				</div>
				<div class="row">
				  <div class="col-md-2">cantidad</div>
				  <div class="col-md-4">detalle</div>
				  <div class="col-md-3">precio por unidad</div>
				  <div class="col-md-3">subtotal</div>
				</div>
				<?php 
					// listado de registros.
				?>
				<div class="row">
				  <?php echo $fact_detalle->mostrar_editar("id",$html) ?>
				  <?php echo $fact_detalle->mostrar_editar("idFact",$html) ?>
				  <div class="col-md-2"><?php echo $fact_detalle->mostrar_editar("cantidad",$html) ?></div>
				  <div class="col-md-4"><?php echo $fact_detalle->mostrar_editar("Detalle",$html) ?></div>
				  <div class="col-md-3"><?php echo $fact_detalle->mostrar_editar("porunidad",$html) ?></div>
				  <div class="col-md-3"><?php echo $fact_detalle->mostrar_editar("subtotal",$html) ?></div>
				</div>
				<?php 
					// fin de listado de registros.
				?>
			</form>
		</div>
		
