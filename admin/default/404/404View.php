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
$documento = new html("html");
$helper = new AyudaVistas();
$documento->add([
	new html("head",[], new html("title",[],"ERROR"))
	, new html("body")
	]
);
$documento->body->add(new html("div",['class'=>"container-fluid"],
	[
		new html("h2",[],"ERROR 404")
		,new html("p",[],"no se ha encontrado")
		,new html("strong",[],$title)
		,new html("a",[href => $helper->url("index","index")],"regresar al inicio")
	]
));
			

echo $documento;
