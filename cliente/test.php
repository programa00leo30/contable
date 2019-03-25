<?php
	/* *********************************
	 * utilidad para ejecutar un comando por intervalo de tiempo
	 * 
	 * **********************************/
	 
//  error_reporting  (E_ALL); ini_set ('display_errors', true);
define("debugmode",true);
// $actualDir=pathinfo( __file__, PATHINFO_DIRNAME); 
$actualDir="/home/leandro/www/contable";
// $actualDir="/home/leandro/test";
// $objetivo = "/admin/front" ;
$objetivo = "admin" ;
//Configuración global
// require_once "$actualDir$objetivo/config/global.php";
define("PATH","$actualDir.DIRECTORY_SEPARATOR.$objetivo");
// iniciar el core:
require_once $actualDir."/core/core/core.php";

$modelo = new documento($actualDir.DIRECTORY_SEPARATOR.$objetivo.DIRECTORY_SEPARATOR.'root');

$modelo->setAccion("controller");


$rt=require_once($modelo->runing( ucwords("cront").'.php') );

// no tiene el Controller al final para que no se pueda ejecutar por web.
$controlador = new cront();

$controlador->cronometro();
