<?php
class SassController extends ControladorBase{

    public function __construct() {
        parent::__construct();
        Debuger::nolog();
    }

    public function __call($name, $arguments)
	{
		$dato=$this->modelo->MiArchivo("sass",$name) ;
		// echo $dato."($name)<br>\n";

		if ($this->modelo->falla()>1){
			$dato=$this->MiArchivo("sass","main.scss") ; // valor por defecto.
		}
		// no utilizar plantilla
		$this->view("includeCss",array(
            "dato"=>$dato,
            "tipe"=>"text/scss"
        ), FALSE);
	}

}
?>
