<?php
class planesController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
         
        //Creamos el objeto usuario
        $planes = new planes();
        
		$this->view("planesListado",array(
            "planes"=>$planes,
            "Pagtitulo"=>"..::Edicion de planes::..",
        ));
        
    }
	public function agregar(){
		if(isset($_GET["agregar"])){
			$plan = new planes();
			$id = $plan->guardarform($_POST,true);
			$this->index();
		}
	}
	public function editar(){
		if (isset($_GET["id"])){
			$plan=new planes();
			$chk=$plan->guardarform($_POST);
			// if ($chk[0][0]){
				$this->view("planesListado",array(
				"planes"=>$plan,
				"Pagtitulo"=>"..::Edicion de planes::..",
			));
			
			
		}
	}
}
?>
