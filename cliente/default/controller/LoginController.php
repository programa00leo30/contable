<?php
class loginController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
		Debuger::nolog();
		$this->plantilla("login");
    }
    
    public function index(){
		
		if($this->check(["ip"=>$_SERVER["REMOTE_ADDR"] ])){
			$this->redirect("index","index");
		}
		$this->view("loginIndex",array(
			"mensaje" => $_SERVER["REMOTE_ADDR"]
			,"estado" => $msg 
            ,"title"=>"..::-INGRESO-::.."
        ));
    }
	public function salir(){
		// desasociar sesion.
		parent::salir();
		$this->redirect("login","index");
	}
	private function check($array){
		$chk=false;
		$usuario = new usuarios();
		
		if (isset($array["ip"])){
			// verificar por ip.
			$rt = $usuario->iporigen($array["ip"]);
			if ($rt) {$chk = true;echo "valido";}
			
		}elseif ( isset($array["user"]) and isset($array["Passwd"]) ){
			$rt = $usuario->buscar("nombusuario",$array["user"]);
			if ($rt)
				if ( $rt->Passwd == $array["Passwd"] )	$chk=true ;

		}
		
		if ($chk){
			// legeado. registrando:
			$this->set_sesion("login_usuario_id",$rt->id );
			$this->set_sesion("login_usuario_nombre",$rt->nombre . ", ".$rt->apellido );
			// al grupo al cual hacer referencia de uso:
			$this->set_sesion("login_usuario_grupo","cliente" );
			$this->set_sesion("login_usuario_activo","activo");
			
		}
		return $chk;
	}
	public function entrar(){
		// comprobar responder al logeo.
		$usuarios = new usuarios();
		if ($this->check($_POST["usr"])){
			$this->redirect("index","index");
		}
		else{
				$this->redirect("login","index?msg=userfail");
		}
		
	}
	public function __call($name, $arguments)
    {
		// directamente cargar el logeo.
		switch( substr($name,0,3) ){
			case "css" : $this->css(substr($name,3),"");break;
			case "jss" : $this->js(substr($name,3),"");break;
			default : $this->index();
		}
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
	
	
	
	/* *******************************************************
	 * Modulos auxiliares de usos:
	/* *******************************************************/
	
	private function js($name, $arguments)
	{
		global $debug;
		$debug->trigger(false); // no mostrar mensajes.
		$dato=$this->modelo->MiArchivo("js",$name) ;
		// echo $dato;

		if ($this->modelo->falla()>1){
			// no esta el archivo
			$dato=$this->modelo->MiArchivo("js","npm.js") ; // valor por defecto.
		}
		// no utiliza plantilla.
		$this->view("include",array(
            "dato"=>$dato,
            "tipe"=>"text/javascript"
        ), FALSE);
	}
	public function css($name, $arguments)
	{
		$dato=$this->modelo->MiArchivo("css",$name) ;
		// echo $dato;

		if ($this->modelo->falla()>1){
			$dato=$this->MiArchivo("css","estilo.css") ; // valor por defecto.
		}
		// no utilizar plantilla
		$this->view("includeCss",array(
            "dato"=>$dato,
            "tipe"=>"text/css"
        ), FALSE);
	}
	
}
?>
