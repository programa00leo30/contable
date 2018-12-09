<?php

if(isset($_GET["ms"])){
	// un mensaje. del sistema:
	$msg = "<div class=\"col-md-3\">".$_GET["ms"]."</div>";
	
}else
	$msg="";
	

include("head.php") ;
?>
    <body>
			<?php include("barrasuperior.php") ; ?>
			<!-- pagina lateral-->
		<div class="col-md-12">
			<div class="col-md-10 container well" id="paginaCentro" >
				<?php 
				echo $msg ;
				// </section>
				?>
				
				
				<section class="main row " >
					<div class="col-md-12 ">lista usuarios</div>
					<!-- seccion de informacion -->
						<div class="col-md-12" >
					<?php
						$usr=$clientes->getAll( "default",$inicio,$cantidadPorHoja);
						$cont=0;
						foreach($usr as $k=>$v){
							// foreach ( $v as $i){
							?>
						<div class="col-md-12 ">
							<div class="col-md-1"><?php echo $v->id ?></div><div class="col-md-5"><?php echo $v->nombre .", ". $v->apellido ?></div>
							<div class="col-md-4"><?php echo $v->direccion ?></div><div class="col-md-1"><?php echo $v->cp ?></div>
							<div class="col-md-1"><?php 
								echo "<a href=\""
								.$helper->url("clientes","editar?cliente=".$v->id ) 
								."\">editar</a>" ; ?></div>
						</div>
					<?php		
							// }
						}
						
					?>
						</div>
						<div class="col-md-12 center">
						<?php
						// echo $pag;
						echo $helper->paginador($clientes,"clientes","listado",$inicio,$cantidadPorHoja);
						?>
						</div>
					<!-- finde listado -->
				</section>
			</div><!-- pagina centro -->
			<?php
			include("barralateral.php");
			?>
		</div>
		
	<?php 
include("footer.php") ; 
?>
	
