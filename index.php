<?php
error_reporting  (E_ALL); ini_set ('display_errors', true);


define("debugmode",true);
$actualDir=pathinfo( __file__, PATHINFO_DIRNAME); 
// $actualDir="/home/leandro/test";
// $objetivo = "/admin/front" ;
$objetivo = "cliente" ;
//Configuración global
// require_once "$actualDir$objetivo/config/global.php";

// iniciar el core:
 require_once $actualDir."/core/core/core.php";

// ejecutar todo lo que se deba a travez de  la variable 
// de control PathController.

core($PathController);


?>
