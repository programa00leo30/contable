<?php
class IndexController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
        // Debuger::nolog();
		// $this->plantilla("index");
    }
    
    public function index(){
         
        //Creamos el objeto usuario
        $usuarios = new usuarios();
        $clientes = new clientes();
        $totales = new movimientocomercial();
        
		$usr = $usuarios->buscar( "id" , $this->get_sesion("login_usuario_id"));
		
		$this->view("index",array(
            "user"=>$usuarios,
            "movimientocomercial"=>$totales,
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
