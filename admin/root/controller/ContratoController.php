<?php
class contratoController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
         
        //Creamos el objeto usuario
        $contratos = new clientes();
        $totales = new contrato();
        
		$usr = $usuarios->buscar( "id" , $this->get_sesion("login_usuario_id"));
		
		$this->view("contratoListado",array(
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Listado de Contratos::..",
        ));
    }
    public function nuevo(){
		$contratos = new clientes();
        $totales = new contrato();
        
		$usr = $usuarios->buscar( "id" , $this->get_sesion("login_usuario_id"));
		
		$this->view("contratoForm",array(
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Listado de Contratos::..",
        ));
		
	}
	public function editar(){
		$contratos = new clientes();
        $totales = new contrato();
        
		$usr = $usuarios->buscar( "id" , $this->get_sesion("login_usuario_id"));
		
		$this->view("contratoListado",array(
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Listado de Contratos::..",
        ));
	}
	
	public function confirmar(){
		
		$contratos = new clientes();
        $totales = new contrato();
        
		$usr = $usuarios->buscar( "id" , $this->get_sesion("login_usuario_id"));
		
		$this->view("contratoListado",array(
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Listado de Contratos::..",
        ));
        
	}
	
}
?>
