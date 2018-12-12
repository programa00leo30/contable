<?php
 error_reporting  (E_ALL);
 ini_set ('display_errors', true);
define("debugmode",true);
$actualDir=pathinfo( __file__, PATHINFO_DIRNAME); 
// $objetivo = "/admin/front" ;
$objetivo = "admin" ;
//Configuración global
// require_once "$actualDir$objetivo/config/global.php";

// iniciar el core:
require_once $actualDir."/core/core/core.php";

// ejecutar todo lo que se deba a travez de  la variable 
// de control PathController.
Debuger::log("warn","inicio");
ChromePhp::log("warn","inicio");
core($PathController);
Debuger::log("warn","fin");

?>
