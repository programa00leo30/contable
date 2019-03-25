<?php
if (!isset($documento)){
	$documento = new html("html");
	$documento->add([
		new html("head",[], new html("title",[],"ERROR"))
		, new html("body")
		]
	);
}
// reemplazar el contenido por este:
$documento->body->SetContent(new html("div",['class'=>"container-fluid"],
	[
		new html("h2",[],"ERROR 404")
		,new html("p",[],"no se ha encontrado")
		,new html("strong",[],$title)
		,new html("a",[href => $helper->url("index","index")],"regresar al inicio")
	]
);

echo $documento;
