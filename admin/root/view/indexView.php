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
		<div class="col-md-12" >
			<!-- pagina central. -->
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
				
			</div><!-- pagina centro -->
			<?php
			include("barralateral.php");
			?>
		</div>
	<?php 
include("footer.php") ; 
?>
	
