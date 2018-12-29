<?php

	/*
	en caso de que llamen a una funcion desconocida del controlador 
	*/
$url=URL."/";
$Pagtitulo="PAGINA NO ENCONTRADA" ;
$title = isset($title)?$title:"ERROR";
$name = isset($name)?$name:"ERROR";

// include("head.php");
//include("estructura.php");
?>
<html>
	<head>
		<title>ERROR</title>
	</head>
<body>
		<div class="container-fluid">
			<h2>ERROR 404 </h2><p><strong><?php  
				echo $title ?></strong>- no se ha encontrado <strong><?php  
			echo $name ?></strong></p>
			<div><a href="<?php echo $url ?>" >regresar al inicio</a></div>
		</div>
	
	
</html>
