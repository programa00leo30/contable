<?php
class CssController extends ControladorBase{

    public function __construct() {
		global $debug;
		if(is_null($debug))$debug= ChromePhp::getInstance();
        parent::__construct();
    }

    public function __call($name, $arguments)
	{
		global $debug;
		$debug->trigger(false); // no mostrar mensajes.

		$dato=$this->modelo->MiArchivo("css",$name) ;
		// echo $dato;

		if ($this->modelo->falla()>1){
			$dato=$this->MiArchivo("css","estilo.css") ; // valor por defecto.
		//if (substr_compare($dato,"_thumbnail")) {
			// quiere hacer un redimencionamiento.
		//	str_replace("_thumbnail","",$dato);
		//	}
		}
		// no utilizar plantilla
		$this->view("includeCss",array(
            "dato"=>$dato,
            "tipe"=>"text/css"
        ), FALSE);
	}

}
?>
