<?php
 error_reporting  (E_ALL);
 ini_set ('display_errors', true);

$actualDir=pathinfo( __file__, PATHINFO_DIRNAME); 
$objetivo = "/admin/front" ;
//Configuración global
require_once "$actualDir$objetivo/config/global.php";

// iniciar el core:
require_once "$actualDir/core/core.php";


//Cargamos controladores y acciones
// var_dump($PathController);
if(count($PathController) >= 3){
	// cargar el objeto controlador
	
    $controllerObj=cargarControlador($PathController[1]);
    // disparar la accion de ese objeto.
    
    if(isset($PathController[3])){
		lanzarAccion($controllerObj,$PathController[2],$PathController ) ;
	}else { // mas de dos.
		lanzarAccion($controllerObj,$PathController[2]);
	}
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj,ACCION_DEFECTO);
}

?>
