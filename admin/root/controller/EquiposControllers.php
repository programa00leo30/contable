<?php
/* 
	controlador de contabilidad: 
*/
 class equiposController extends ControladorBase{
	
	public function __construct() {
		parent::__construct();
		
    }
    public function listado(){
		
		$this->redirect("index","index");
	}
	
}
