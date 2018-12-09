<?php

$nro=nz($nro);
$title=nz($title);
$text=nz($text);
$mensaje=nz($mensaje);
$control=nz($control);
$accion=nz($accion);


?>
			<div class="container-fluid">
				<h2>ERROR <?php echo $nro ?> </h2><p><strong><?php  echo $title ?></strong>- <?php 
					echo $text ?> <strong><?php  
				echo $mensaje ?></strong></p>
				<div><a href="<?php echo $helper->url($control,$accion) ?>" >regresar al inicio</a></div>
			</div>
