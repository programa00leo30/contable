<?php

/* 
	controlador de cobros. recibos de los clienets.
	* : 
*/
 class cobrosController extends ControladorBase{
	
	public function __construct() {
		parent::__construct();
		
    }
    
	private function check(){
		if ($this->get_sesion("cobros_idCliente")){
			// if ($this->IdDelCliente == ""){
		   $this->selecionarCliente();
		   exit(0); // no hay error. pero no continuamos ejecutando.
		 }
		 return $this->get_sesion("cobros_idCliente");
	}
	
	public function selecionarCliente(){
		// seleccionar el cliente a evaluar.
		//Creamos el objeto usuario
        // $usuarios = new usuarios();
        $clientes = new clientes();
        
		// $usr = $usuarios->buscar( "id" , $this->get_sesion("login_usuario_id"));
		
		$this->view("indexCobros",array(
            "cliente"=>$clientes,
            "Pagtitulo"=>"..::Seleccionar Cliente::..",
        ));
	}
	public function selecione(){
		// cliente seleccionado.
		$clientes = new clientes();
        $cliente = $clientes->buscar( "id" , $_GET["id"]);
		if ($cliente){
			$this->set_sesion("cobros_idCliente",$cliente->id);
			$this->redirect("cobros","ultimos");
		
		}else {
			$this->redirect("cobros","selecionarCliente");
		}
		
	}
	
    public function index(){
       
       // $this->check();
       $this->listado();
         
       
    }
    public function ultimos(){
		// mostrar los ultimos movimientos de un cliente.
		$idCliente = $this->check();
		
		$cliente = new clientes();
		// $cliente->buscar("id",$idCliente );
		$contable = new contable($idCliente );
		
		$this->view("cobrosListado",array(
			"cliente" => $cliente,
			"Pagtitulo" => "Ultimos Movimientos de ".$cliente->nombre.", ".$cliente->apellido
		));
	}
	public function listado(){
		// un listado de movimientos del cliente.
		$cliente = new clientes();
		$cliente->buscar("id",$this->idCliente() );
		$contable = new contable($this->IdDelCliente );
		
		$this->view("contableListado",array(
			"cliente" => $cliente->getAll,
			"cliente" => $cliente->getAll,
			"Pagtitulo" => "Estado Contable"
		));
	}
}

