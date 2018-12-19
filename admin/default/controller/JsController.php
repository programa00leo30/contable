<?php
class JsController extends ControladorBase{

    public function __construct() {
				global $debug;
		if(is_null($debug))$debug= ChromePhp::getInstance();
        parent::__construct();
        Debuger::nolog();
    }

    public function __call($name, $arguments)
	{
		global $debug;
		$debug->trigger(false); // no mostrar mensajes.
		$dato=$this->modelo->MiArchivo("js",$name) ;
		// echo $dato;

		if ($this->modelo->falla()>1){
			// no esta el archivo
			$dato=$this->modelo->MiArchivo("js","npm.js") ; // valor por defecto.
		}
		// no utiliza plantilla.
		$this->view("include",array(
            "dato"=>$dato,
            "tipe"=>"text/javascript"
        ), FALSE);
	}

}
?>
