<?php
class miperfilController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
        $this->plantilla("index");
    }
    
    public function index(){
       $mensaje="";
       $acion=array();
		
        //Creamos el objeto usuario
        $usuarios = new usuarios();
		$usuarios->buscar("id", $this->get_sesion("login_usuario_id") ) ;
		$this->view("miperfilindex",array(
            "usuario"=>$usuarios,
            "mensaje"=>$mensaje,
            "acion"=>$acion,
            "Pagtitulo"=>"..::Editar Perfil::..",
        ));
    }
    
	public function contenido(){
		$this->view("miperfileditar",array(
			"Pagtitulo" => "encabezado"
		));
		
	}
	public function confirmar(){
		
		$valores=array("Nombre"=>"","Apellido"=>"","funciones"=>"","comandos"=>"","seguridad"=>"");
		$ban=false;$ms=array();
		$usuarios = new usuarios();
		$usuarios->buscar("id", $this->get_sesion("login_usuario_id") ) ;
		foreach ( $valores as $k=>$v){
			if ( isset( $_POST[$k] ) ){
				$valores[$k]= $_POST[$k];
				$usuarios->$k = $_POST[$k] ;
			}else{
				$ban=true; // hay un error
				$ms[]=$k;
			}
		}
		if ($ban){
			// $this->redirect("miperfil","index?f=failuser&ms=$ms");
			$mensaje="Existe un problema:";
			// $acion = array("key","Nombre","nokey");
			$this->view("miperfilindex",array(
			"usuario"=>$usuarios,
			"mensaje"=>$mensaje,
			"acion"=>$ms,
			"Pagtitulo"=>"..::Editar Perfil::..",
			));
		}else{
			// guardar cambios:
			$id=$this->get_sesion("login_usuario_id");
			foreach ($valores as $k=>$v){
				$usuarios->setById($k,$v,$id);
			};
					
			$this->redirect("miperfil","index");
		}
	}
}
?>
