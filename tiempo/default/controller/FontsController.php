<?php
class FontsController extends ControladorBase{

    public function __construct() {
        parent::__construct();
        Debuger::nolog();
    }

    public function __call($name, $arguments)
	{
		$dato=$this->modelo->MiArchivo("fonts",$name) ;
		if ($this->modelo->falla()>1){
			// no esta el archivo
			$dato=$this->modelo->MiArchivo("fonts","summernote.ttf") ; // valor por defecto.
		}
		// no utiliza plantilla.
		$this->view("include",array(
            "dato"=>$dato,
            "tipe"=>"binary/fonts"
        ), FALSE);
	}

}
?>
