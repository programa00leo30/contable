<?php
class clientesController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
         
        //Creamos el objeto usuario
        /*
        $clientes = new clientes();
		$this->plantilla("clienteslistado",array(
            "clientes"=>$clientes,
            "Pagtitulo"=>"Listado Clientes",
        ));
		*/
		$this->listado();
    }
	public function salir(){
		// desasociar sesion.
		parent::salir();
		$this->redirect("index","index");
	}
	public function listado(){
		
        $clientes = new clientes();
        $cantidadPorHoja=10; // configurable.
        if (isset($_GET["pag"])){
			if ($_GET["pag"] == "first" ){
				$inicio=0;
			}elseif ($_GET["pag"] == "preview" ) {
				// hoja anterior
				if ($session->pagina == 0 ) $session->pagina = 1;
				$inicio = intval( ( $this->get_sesion("pagina") - $cantidadPorHoja )  );
			
			}elseif ($_GET["pag"] == "next" ){
				if ($session->pagina == 10 ) $session->pagina = 9;
				$inicio = intval( $this->get_sesion("pagina") + $cantidadPorHoja);
			}else {
				$inicio = intval( $cantidadPorHoja* $_GET["pag"] ) ;
			}
		}else{
			$inicio=0;
		}
        $this->set_sesion("pagina",$inicio) ;
		$totales = new movimientocomercial();
		
		$this->view("clienteslistado",array(
			"clientes" => $clientes,
			"movimientocomercial" => $totales,
			"inicio" => $inicio,
			"cantidadPorHoja" => $cantidadPorHoja,
			"Pagtitulo" => "encabezado"
		));
		
	}
	
	public function facturas(){
		$this->redirect("facturas","nueva",[cliente=>$_GET["cliente"]]);
	}
	
	public function cobros(){
		$this->redirect("cobros","nuevo",["cliente"=>nz($_GET["cliente"])]);
	}
	
	public function contratos(){
		$this->redirect("contratos","nuevo",["cliente"=>nz($_GET["cliente"])]);
	}
	
	public function editar(){
		// mostrar formulario
		$ifid=(isset($_GET["cliente"]))?$_GET["cliente"]:"-1";
		$clientes = new clientes();
		$cliente = $clientes->buscar("id",$ifid);
		if ( $cliente) {
			$this->set_sesion("idCliente",$cliente->id) ;
			$this->view("clientesFormulario",array(
				"cliente" => $cliente,	
				"idCliente" => $ifid,
				"clientes" => $clientes ,
				"Pagtitulo"=>"agregar / editar cliente"
				)); 
		}else{
			$this->redirect("clientes","listado");
		}
	}
	public function altas(){
		// mostrar formulario
		$clientes = new clientes();		
		$this->set_sesion("idCliente","-1") ;
		$cliente = $clientes->columnas;

		$this->view("clientesFormulario",array(
			"clientes" => $clientes,	
			"Pagtitulo"=>"agregar / editar cliente"
			)); 

	}
	public function addcliente(){
		// agregar nuevo cliente
	}
	public function modifcliente(){
		// modificar cliente
	}
	public function contrato(){
		
        $clientes = new clientes();
		$this->view("clientesContrato",array(
		
			"clientes" => $clientes,
			"Pagtitulo" => "encabezado"
		));
		
	}
	public function agregar(){
		// para agregar nuevo.
				// y el cliente a modificar
		$clientes = new clientes();
		foreach($_POST as $k=>$v){
			$clientes->$k = $v;
		}
		if ( $clientes->add()){
			$this->redirect("clientes","listado");
		}
	}
		
	public function confirmar(){
		// recepcion del formulario de edicion / alta.
		if (isset($_POST["id"]) && ($_POST["id"]!="") ){
			if ($this->verifica("idCliente","id")){
				// acepto las variables de entrada formulario
				// y el cliente a modificar
				$clientes = new clientes();
				foreach($_POST as $k=>$v){
					$clientes->$k = $v;
				}
				$clientes->save();
				$this->redirect("clientes","listado");
			}else{
				// verificacion fallida.
				$this->listado();
			}
		}else{
			// agregar nuevo registro
			$this->agregar();
		}
	}
	public function borrar(){
			$id=$_GET["cliente"];
			$clientes = new clientes();
			if ($clientes->buscar("id",$id) ){
				
				$clientes->setById("activo","1",$clientes->id) ;
				echo "se ha eliminado ".$clientes->nombre.", ".$clientes->apellido.";" ;
				$this->redirect("clientes","listado");
			}else{
				echo "no se ha borrado el cliente $id ;";
			}
	}
	public function contable(){
		// pasar a contabilidad:
		$ifid=(isset($_GET["cliente"]))?$_GET["cliente"]:"-1";
		$clientes = new clientes();
		$cliente = $clientes->buscar("id",$ifid);
		if ( $cliente) {
			$this->set_sesion("idCliente",$cliente->id) ;
			$this->redirect("contable","index"); 
		}else{
			$this->redirect("clientes","listado");
		}
	}
		
	private function verifica($campo,$valor){
		${$campo} = isset($_POST[$valor])?$_POST[$valor]:-1;
		if ( ${$campo} == $this->get_sesion($campo) ){
			return true;
		}else{
			return false;
		}
	}
		
		
}
?>
