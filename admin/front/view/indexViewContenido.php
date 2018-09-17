<?php
	// $usuario = $user->buscar("id" , $this->get_sesion("login_usuario_id"));
	// var_dump($user);
?>
			<div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="100" class="panel widget anim-running anim-done" style="">
			</div>
			<div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="100" class="panel widget anim-running anim-done" style="">
				<div class="panel-body bg-primary">
					<div class="row row-table row-flush">
						<div class="col-xs-8">listado de clientes:</div>
					</div>
				</div>
				<div class="panel-body">
				  <!-- Bar chart-->
				  <div class="text-center">
					 <div data-bar-color="primary" data-height="30" data-bar-width="6" data-bar-spacing="6" class="inlinesparkline inline">
						<?php
						$inicio = 0;
						$cantidadPorHoja = 5;
						include("clienteslistadoViewContenido.php");
						/*
							$clients = $clientes->getAll( "default",0,10);
							foreach ($clients as $cl){
								$k="";
								/* [id]  [activo]  [nombre]  [apellido]  [nombusuario]  [Passwd]  [sexo]  
								 * [tipodocumento]  [docnro]  [fechanac]  [nacionalidad]  [direccion]  [localidad]  
								 * [provincia]  [cp]  [mail]  [tel]  [celular] 						
								 * /
						
								foreach ($cl as $key=>$dato){
									$k.=" [".$key."] ";
								// * /
							
								
						?>
						<div class="col-md-12">
						<div class="col-md-1"><?php echo $cl->id ?></div>
						<div class="col-md-4"><?php echo $cl->nombre .", ".$cl->apellido ?></div>
						<div class="col-md-4"><?php echo $cl->direccion ?></div>
						<div class="col-md-2"><a href="<?php 
							echo $helper->url("clientes","editar?cliente=".$cl->id)  
							?>">editar</a>
							<a href="<?php 
							echo $helper->url("clientes","borrar?id=".$cl->id)  
							?>">eliminar</a></div>
						</div>
						<?php
								// };
								echo $k;
							};
							*/
						?>
					 </div>
				  </div>
			   </div>
			</div>
			<div data-toggle="play-animation" data-play="fadeInDown" data-offset="0" data-delay="100" class="panel widget anim-running anim-done" style="">
			   <div class="panel-body bg-primary">
				  <div class="row row-table row-flush">
					 <div class="col-xs-8">
						<p class="mb0"><?php echo $user->Nombre ?></p>
						<h3 class="m0"><?php echo $user->Apellido ?></h3>
					 </div>
					 <div class="col-xs-4 text-center">
						<em class="fa fa-user fa-2x"><sup class="fa fa-plus"></sup>
						</em>
					 </div>
				  </div>
			   </div>
			   <div class="panel-body">
				  <!-- Bar chart-->
				  <div class="text-center">
					 <div data-bar-color="primary" data-height="30" data-bar-width="6" data-bar-spacing="6" class="inlinesparkline inline">
						 <canvas style="display: inline-block; width: 150px; height: 30px; vertical-align: top;" width="150" height="30"></canvas>
					 </div>
				  </div>
			   </div>
			</div>
<?php

/*                   
			<div class="col-md-10" id="paginaCentro" >
				<?php echo $msg 
				//</section>
				
				?>
				<section class="main row" >
					<div class="col-md-12">lista usuarios</div>
					<!-- seccion de informacion -->
					<?php
						$usr=$usuarios->getAll( "default",0,10);
						
						foreach($usr as $k=>$v){
							foreach ( $v as $i){
							?>
						<div class="col-md-4"><?php echo $i ?></div>
					<?php		
							}
						}
					?>
				</section>
				
			</div>
*/
