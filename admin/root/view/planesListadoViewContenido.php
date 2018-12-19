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
						<div class="col-sm-1">id</div>
						<div class=" col-sm-4">Nombre Descriptivo</div>
						<div class="col-sm-2">Abreviacin</div>
						<div class="col-sm-2">importe</div>
						<div class="col-sm-2">accion</div>
				</div>
				<?php 
					/*
 * `id`, `idComprob`, `idFactura`, `ImporteAplicado`, `otros`
 * 
 * */
					// listado de registros.
			
			while( $planes->mostrar("id","0",">") ){
			?>
			<form role="form" id="planes_<?php echo $planes->id ?>" autocomplete="off" method="post" action="<?php 
				echo $helper->url("planes","editar",array(
					"id" => $planes->id 
					)
					) ?>" >
				<div class="row">
					<div class="col-sm-1"><?php echo $planes->mostrar_editar("id",$html) ?></div>
					<div class=" col-sm-4"><?php echo $planes->mostrar_editar("NombrePlan",$html) ?></div>
					<div class="col-sm-2"><?php echo $planes->mostrar_editar("CRT",$html) ?></div>
					<div class="col-sm-2"><?php echo $planes->importe() ?></div>
					<div class="col-sm-2"><div class="form-footer">
					 <button type="submit" class="btn btn-info btn-circle" id="detalleeditar" name="detalleenviar" value="<?php
					 echo $planes->id ;
					 ?>">
					 <span class="glyphicon glyphicon-pencil"></span></button>
					 <button type="submit" id="detalledelete"  name="detalledelete" class="btn btn-warning btn-circle" value="<?php
					 echo $planes->id ;
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
				<form role="form" id="planes_new" autocomplete="off" method="post" action="<?php 
				echo $helper->url("planes","agregar",array( "agregar"=>"si" )) ?>" >
				<div class="row">
					<div class="col-sm-1">#nuevo</div>
					<div class=" col-sm-4"><?php echo $planes->mostrar_editar("NombrePlan",$html,"") ?></div>
					<div class="col-sm-2"><?php echo $planes->mostrar_editar("CRT",$html,"") ?></div>
					<div class="col-sm-2">0</div>
					<div class="col-sm-2"><div class="form-footer">
						 <button type="submit" class="btn btn-info">
						 <span class="glyphicon glyphicon-log-in"></span>agregar</button>
						</div>
					</div>
				  </div>
				</form>
			
			</div>
		</div>
		
