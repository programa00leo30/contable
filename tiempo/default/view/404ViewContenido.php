<?php
$title=isset($title)?$title:"titulo";
$name=isset($name)?$name:"no name";
$url=isset($url)?$url:$helper->url("index","index");

?>
			<div class="container-fluid">
				<h2>ERROR 404 </h2><p><strong><?php  
					echo $title ?></strong>- no se ha encontrado <strong><?php  
					echo $name ?></strong></p>
				<div><a href="<?php 
					echo $url ?>" >regresar al inicio</a></div>
			</div>
