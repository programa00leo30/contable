<?php
class contratosController extends ControladorBase{
    
    private $usuario;
    public function usr(){
		return $this->usuario;
	}
	
    public function __construct() {
        parent::__construct();
        $usuar = new usuarios();
        $this->usuario = $usuar->buscar( "id" , $this->get_sesion("login_usuario_id"));
    }
    
    public function contratos(){
		$this->index();		
	}
    
    public function index(){
         
        //Creamos el objeto usuario
        $clientes = new clientes();
        $contratos = new contrato();
    
    	$this->view("contratoListado",array(
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Listado de Contratos::..",
        ));
    }
    
    public function nuevo(){
		$clientes = new clientes();
        $contratos = new contrato();
        
		
		$this->view("contratosFormAlta",array(
			"editar"=>false,
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Agregar contrato::..",
        ));
		
	}
	
	public function edicion(){
		$clientes = new clientes();
        $contratos = new contrato();
        if (isset($_GET["id"])){
			$id = $_GET["id"];
			$contratos->buscar("id",$id);
		};
		
		$this->view("contratosFormAlta",array(
            "editar"=>$id,
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Editar Contrato::..",
        ));
	}
	
	public function confirmar(){
		
		$clientes = new clientes();
        $contratos = new contrato();
        if (isset($_POST["id"])){
			$contratos->guardarform($_POST);
		}elseif (isset($_POST)){
			$contratos->guardarform($_POST,true);
		}
		
		$this->view("contratoForm",array(
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Listado de Contratos::..",
        ));
        
	}
	
}
?>
