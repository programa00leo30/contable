<?php

/* 

	este es el core principal 
	
*/
/*

	para convertir:
	http://localhost/www/www.iduv.gob.ar/front/index.php/ejemplo/principal?id=12
	
	PATH_INFO  = 	/ejemplo/principal 
	QUERY_STRING  = id=12
	
	echo $_SERVER["PATH_INFO"];
	
*/

/*
 * clase tiempo para saber demoras del script.
 * /

class tiempo{
	private static $iniTimer;
	public function __construct(){
		self::$iniTimer = microtime(true);
	}
	public function __call($name,$arg){
		echo "<div>(".round( microtime(true) - self::$iniTimer ,5).")archivo:".$arg[0]." linea:".$arg[1]."</div>\n";
	}
} ;
$tiempo = new tiempo();
// */

function tiempo($f,$l){
	// global $tiempo ;
	// $tiempo->t( $f , $l);
};

tiempo( __FILE__ , __LINE__);

	require_once 'error.php';
	// $error_handle = new MiControlError();

if (defined ("PATH")) {
	// PATH_INFO // 
	//Base para los controladores
	
	require_once 'ControladorBase.php';
	 tiempo( __FILE__ , __LINE__);
	//Funciones para el controlador frontal
	require_once 'ControladorFrontal.func.php';
	tiempo( __FILE__ , __LINE__);
}
else {
	echo "falla critica!";
}

if (isset($_SERVER["PATH_INFO"])){
	
	$PathController  = 	explode("/",$_SERVER["PATH_INFO"]) ;
	tiempo( __FILE__ , __LINE__);
}else{
	$PathController = array();
	tiempo( __FILE__ , __LINE__);
}

if (debugmode){
	// muestra errores:
	echo MiControlError::salida() ;
}
