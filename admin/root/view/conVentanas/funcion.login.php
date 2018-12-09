<?php

// modulo auxiliar de funciones de seguridad para login

$swt = rand(0,9);
$nro = rand(0,9);
 
function cadenas ($semilla,$cadena,$nro) {
	return array($semilla,$cadena.$semilla);
}


function numeros ($semilla,$cadena,$nro) {
	return array($nro,$semilla.$nro.$cadena);
}

?>