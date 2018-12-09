<?php

/*
modulo de seguridad

*/
define("DEBUG",true);


if ( defined("DEBUG") ) { // MODO DESARROLLO.
	include("error_report.php");

}
else{
	
	session_start();
	if ( isset($_SERVER["HTTP_USER_AGENT"])){
		/* 
		 * navegador normal chrome: 
		 * 		Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/33.0.1750.152 Chrome/33.0.1750.152 Safari/537.36
		 * navegador celular chrome
		 * 		Mozilla/5.0 (Linux; Android 4.1.2; GT-I8260L Build/JZO54K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mobile Safari/537.36
		 * navegador celular estandar
		 * 		Mozilla/5.0 (Linux; U; Android 4.1.2; es-us; GT-I8260L Build/JZO54K) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.3
		 *  guardar en archivos
		*/
		//$file = "log.user_agent.txt";
		//$o = fopen( $file ,"w");
		// fwrite($o,$_SERVER["HTTP_USER_AGENT"]);
		// echo $_SERVER["HTTP_USER_AGENT"];
		$analisis = "GT-I8260L" ; // utilizar este texto para determinar que es mi celular.
		if ( ! ( strpos( $_SERVER["HTTP_USER_AGENT"] ,$analisis  ) === false ) ) // {
		{
			// existe el texto dentro del encabezado.
			// se estima autorizado. modalidad celular.
			include("./core/core.php"); // funciones del sistema.
			include("./celular/index.php"); // pagina principal
			
			exit(); // debe concluir aqui.
		}
	}

	if (isset($_GET["ses"] ) && $_GET["ses"]  == "salir" ){
		
		session_destroy();
	} 


	if ( ! isset($_SESSION["loginok"] ) ){
		$target = "index.php"; // hasta que se me ocurra algo mejor.
		include("login.form.php");
		
		exit();
	}

}



// funciones de agregado que sirvan para propositos generales.
function fecha ( $supuesta = "") {
	global $_SESSION;
	
	if ($supuesta == "" ) {
		if (isset($_SESSION["fechasys"])) {
			$rt = $_SESSION["fechasys"];
		}else{
			$rt = date ("Y-m-d");
		}
	}else{
		$rt = $supuesta ;
	}
	return $rt ;
}

if (!function_exists("GetSQLValueString")){
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
	  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

	  switch ($theType) {
		case "text":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;    
		case "long":
		case "int":
		  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
		  break;
		case "double":
		  $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
		  break;
		case "date":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;
		case "defined":
		  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
		  break;
	  }
	  return $theValue;
	}

}
?>
