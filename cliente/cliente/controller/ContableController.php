<?php

/* 
	controlador de contabilidad: 
*/
 class contableController extends ControladorBase{
	private $IdDelCliente ;
	
	public function __construct() {
		parent::__construct();
		if ( $this->get_sesion("idCliente") != "" ){
			$this->IdDelCliente = $this->get_sesion("idCliente") ;  
		}else{
			$this->redirect("clientes","listado");
		}
    }
    private function idCliente(){
		if ( $this->get_sesion("idCliente") != "" ){
			$this->IdDelCliente = $this->get_sesion("idCliente") ;  
		
		}else{
			$this->redirect("clientes","listado");
		}
		return $this->IdDelCliente ;
	}
	
    public function index(){
         
        //Creamos el objeto usuario
        /*
        $clientes = new clientes();
		$this->plantilla("clienteslistado",array(
            "clientes"=>$clientes,
            "Pagtitulo"=>"Listado Clientes",
        ));
		*/
		$this->listado();
    }
    
	public function listado(){
		// un listado de movimientos del cliente.
		$cliente = new clientes();
		$cliente->buscar("id",$this->idCliente() );
		// $contable = new contable($this->IdDelCliente );
		$comp = new comppago();
		
		$this->view("contableListado",array(
			"clientes" => $cliente,
			"factura" => $comp,
			"Pagtitulo" => "Estado Contable"
		));
	}
}

