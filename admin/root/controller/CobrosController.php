<?php

/* 
	controlador de cobros. recibos de los clienets.
	* : 
*/
 class cobrosController extends ControladorBase{
	
	public function __construct() {
		parent::__construct();
		
    }
    
	
    public function index(){
       
       // $this->check();
       $this->ultimos();
         
       
    }
    public function ultimos(){
		// mostrar los ultimos movimientos de un cliente.
		$idCliente = $this->check();
		
		$cliente = new clientes();
		// $cliente->buscar("id",$idCliente );
		// $contable = new contable($idCliente );
		$comp = new comppago();
		
		$this->view("cobrosListado",array(
			"factura" => $comp,
			"clientes" => $cliente,
			"Pagtitulo" => "Ultimos Movimientos de ".$cliente->nombre.", ".$cliente->apellido
		));
	}
	
	public function nuevo(){
		// agregar nuevo recibo de cobranza.
		$cliente = new clientes();
		$comp = new comppago();
	
		
		
	}
	
	public function editar(){
		$cliente = new clientes();
		$comp = new comppago();
		$this->view("cobrosForm",array(
			"clientes"=>$cliente
			,"comppago"=>$comppago
			,"Pagtitulo"=>"editar comprobantes de cobro"
		));
		
	}
	
	
	/* *******************************************
	 * 
	 * detalle de cobros.
	 * 
	/* *******************************************/
	
	
	public function nuevodetalle(){
		// agregar nuevo detalle de recibo
		$recibo = $_GET["idRecibo"];
		if ($recibo){
			$comppago= new comp_detalle();
			$rt=$comppago->buscar("idComprob",$recibo);
			
			if($rt){
				$rtn= $comppago->guardarform($_POST,true);
				$this->view("cobrosDetalle",array(
					"comppago"=>$comppago
					,"idRecibo"=>$recibos
					,"Pagtitulo"=>"detalles de comprobante de recibos"
				));
			}
		}else{
			$this->redirect("cobros","detalle");
		}
	}
	
	public function detalle(){
		$recibo = $_GET["idRecibo"];
		if ($recibo){
			$comppago= new comp_detalle();
			
			if($rt){
				$rtn= $comppago->guardarform($_POST,true);
				$this->view("cobrosDetalle",array(
					"comppago"=>$comppago
					,"idRecibo"=>$recibos
					,"Pagtitulo"=>"detalles de comprobante de recibos"
				,false));
			}
		}else{
			$this->redirect("cobros","index");
		}
	}
}

