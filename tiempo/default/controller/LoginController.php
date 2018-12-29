<?php
class loginController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
		Debuger::nolog();
    }
    
    public function index(){
		if (isset($_GET["msg"])){
			$msg="<div class=\"warning\">usuario no validado</div>" ;
		}else{
			$msg="";
		}
		$this->view("loginIndex",array(
			"estado" => $msg ,
            "Pagtitulo"=>"..::-Ingreso-::..",
        ),FALSE);
    }
	public function salir(){
		// desasociar sesion.
		parent::salir();
		$this->redirect("login","index");
	}

	public function contrasenna(){
		// comprobar responder al logeo.
		$usuarios = new usuarios();
		if (isset($_POST["usr"])){
			$usuarios = new usuarios();
			
			if ( $usuarios->buscar("funciones", $_POST["usr"]) ){
				
				$usr=$usuarios->funciones;
				$swt=random_int(1,5); // variable azar para contraseña.
				$cmd = $usuarios->comandos ;
				$this->run( $usuarios->comandos  ) ;
				$this->set_sesion("login_usuario_id",$usuarios->id );
				$this->set_sesion("login_usuario_nombre",$usuarios->nombre . ", ".$usuarios->apellido );
				$this->set_sesion("login_usuario_grupo",$usuarios->grupo );
				$this->set_sesion("login_usuario_Departamento",$usuarios->Departamento );
				
				$this->view("loginClave",array(
					"indicio"=>":". $this->get_sesion("login_pregunta"), // ":".$this->get_sesion("login_local"),
					"Pagtitulo"=>"..::-Ingreso-::..",
				), FALSE);
			}
			else{
				$this->redirect("login","index?msg=userfail");
			}
		}else{
			$this->redirect("login","index?msg=fail");
		}
	}
	public function __call($name, $arguments)
    {
		// directamente cargar el logeo.
		$this->index();
	}
	private function run ($cmd){
		$GLOBALS["loginfuncion"] = new loginFunction();
		$tcmd = '$loginfuncion = $GLOBALS["loginfuncion"] ; '."\n".$cmd;
		// echo "<div>$tcmd</div>";
		eval( $tcmd );
		$funcionlogin=$GLOBALS["loginfuncion"];
		// echo "---------------------------";
		// var_dump($GLOBALS["loginfuncion"]);
		// echo $funcionlogin->local;
		
		$this->set_sesion("login_local",$funcionlogin->local );
		$this->set_sesion("login_pregunta",$funcionlogin->pregunta );

		
	}
	public function comprobacion(){
		// comprobar responder al logeo.
		if (isset( $_POST["paswd"])){
			if ( $_POST["paswd"] == $this->get_sesion("login_local") ){
				// exito de logeo
				$this->set_sesion("login_usuario_activo","activo"); // con esto pasa el logeo.
				$this->redirect("index","index");
			}else{
				$this->redirect("login","contrasenna");
			}
		}else{
		// falla de logeo
		$this->redirect("login","index?msg=failsur");
			
		}
		
		
	}
}
?>
