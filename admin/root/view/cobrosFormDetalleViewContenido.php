<?php


?>
		<div class="signup-form-container">
    
			 <!-- form start -->
			 
			 
				<div class="form-header">
					<div class="pull-left"></div>
					<h3 class="form-title">
					<i class="fa fa-user"></i>detalle recibos:</h3>
				</div>
			<div class="table">
				<div class="row">
						<div class="col-sm-1">#id</div>
						<div class=" hidden">idRecibo</div>
						<div class="col-sm-4">idfactura</div>
						<div class="col-sm-3">ImporteAplicado</div>
						<div class="col-sm-2">otros</div>
						<div class="col-sm-2">accion</div>
				</div>
				<?php 
					/*
 * `id`, `idComprob`, `idFactura`, `ImporteAplicado`, `otros`
 * 
 * */
					// listado de registros.
			$recibo = $comppago->buscar("id",$idRecibo);
			$comp_detalle->sql_cliente( $recibo->idCliente );
			echo "<div id=idReciboCliente >";
			echo "<div >recibocliente:". $recibo->idCliente . "</div>" ;
			echo "</div>\n";
			
			while( $comp_detalle->mostrar("idComprob",$idRecibo) ){
			?>
			<form role="form" id="comppDetalle_<?php echo $comp_detalle->id ?>" autocomplete="off" method="post" action="<?php 
				echo $helper->url("cobros","confirmardetalle",array(
					"idRecibo" => $comp_detalle->id 
					)
					) ?>" >
				<div class="row">
					<div class="col-sm-1"><?php echo $comp_detalle->mostrar_editar("id",$html) ?></div>
					<div class=" hidden"><?php echo $comp_detalle->mostrar_editar("idComprob",$html) ?></div>
					<div class="col-sm-4"><?php echo $comp_detalle->mostrar_editar("idFactura",$html) ?></div>
					<div class="col-sm-3"><?php echo $comp_detalle->mostrar_editar("ImporteAplicado",$html) ?></div>
					<div class="col-sm-2"><?php echo $comp_detalle->mostrar_editar("otros",$html) ?></div>
					<div class="col-sm-2"><div class="form-footer">
					 <button type="submit" class="btn btn-info btn-circle" id="detalleeditar" name="detalleenviar" value="<?php
					 echo $comp_detalle->id ;
					 ?>">
					 <span class="glyphicon glyphicon-pencil"></span></button>
					 <button type="submit" id="detalledelete"  name="detalledelete" class="btn btn-warning btn-circle" value="<?php
					 echo $comp_detalle->id ;
					 ?>" >
						 <i class="glyphicon glyphicon-remove"></i></button>
				</div></div>
				</div>
			</form>
				<?php 
					// fin de listado de registros.
				}
				// agregar detalle:
				?>
				<div class="row">
				<form role="form" id="factDetalle" autocomplete="off" method="post" action="<?php 
				echo $helper->url("cobros","iframe/confirmardetalle?agregar=si" ) ?>" >
				<div class="row">
					<div class="col-sm-1">#nuevo</div>
					<div class=" hidden"><?php echo $comp_detalle->mostrar_editar("idComprob",$html,$idRecibo) ?></div>
					<div class="col-sm-4"><?php echo $comp_detalle->mostrar_editar("idFactura",$html,"") ?></div>
					<div class="col-sm-3"><?php echo $comp_detalle->mostrar_editar("ImporteAplicado",$html,0) ?></div>
					<div class="col-sm-2"><?php echo $comp_detalle->mostrar_editar("otros",$html) ?></div>
					<div class="col-sm-2"><div class="form-footer">
						 <button type="submit" class="btn btn-info">
						 <span class="glyphicon glyphicon-log-in"></span>agregar</button>
						</div>
					</div>
				  </div>
				</form>
				</div>
			</div>
		</div>
		
