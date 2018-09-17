<?php
class indexController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
         
        //Creamos el objeto usuario
        $usuarios = new usuarios();
        $clientes = new clientes();
        
		$usr = $usuarios->buscar( "id" , $this->get_sesion("login_usuario_id"));
		
		$this->view("index",array(
            "usuarios"=>$usuarios,
            "clientes"=>$clientes,
            "Pagtitulo"=>"..::Bienvenido::..",
        ));
    }
	public function salir(){
		// desasociar sesion.
		parent::salir();
		$this->redirect("index","index");
	}
	public function titulo(){
		$this->view("titulo",array(
			"Pagtitulo" => "encabezado"
		));
		
	}
	
	public function contenido(){
		$this->view("titulo",array(
			"Pagtitulo" => "encabezado"
		));
		
	}
	
}
?>
