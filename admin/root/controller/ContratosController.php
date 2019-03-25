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
            "idCliente"=>nz($_GET["cliente"],""),
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
			$rt=$contratos->guardarform($_POST);
		}elseif (isset($_POST)){
			$rt=$contratos->guardarform($_POST,true);
		}
		// var_dump($_POST);
		if ($rt[1]){
			$this->index();
		}else{
			// existio falla.
		$this->view("contratoForm",array(
            "editar"=>(isset($_POST["id"])?$_POST["id"]:false),
            "contratos"=>$contratos,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::CONTRATOS::..",
        ));
			
		}
	}
	
}
?>
