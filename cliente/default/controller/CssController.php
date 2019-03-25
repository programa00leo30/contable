<?php
class CssController extends ControladorBase{

    public function __construct() {
        parent::__construct();
        Debuger::nolog();
    }

    public function __call($name, $arguments)
	{
		$dato=$this->modelo->MiArchivo("css",$name) ;
		// echo $dato;

		if ($this->modelo->falla()>1){
			$dato=$this->MiArchivo("css","estilo.css") ; // valor por defecto.
		}
		// no utilizar plantilla
		$this->view("includeCss",array(
            "dato"=>$dato,
            "tipe"=>"text/css"
        ), FALSE);
	}

}
?>
