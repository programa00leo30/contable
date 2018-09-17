<?php
class FontsController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }
    
    public function __call($name, $arguments)
	{
		$dato=PATH."/fonts/".$name ;
		// echo $dato;
		
		if (!file_exists($dato)){
			$dato=PATH."/fonts/glyphicons-halflings-regular.ttf" ; // valor por defecto.
		}
		// no utilizar plantilla
		$this->view("include",array(
            "dato"=>$dato,
            "tipe"=>""
        ), FALSE);
	}
 
}
