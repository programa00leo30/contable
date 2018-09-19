<?php
class facturasController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }

	public function nueva(){
		// debo saber que cliente
		tiempo( __FILE__ , __LINE__);
		$factura = new factura();
		$clientes = new clientes();
		tiempo( __FILE__ , __LINE__);
		// eliminiar variable precedente.
		$this->set_sesion("facturaID" , null);
		tiempo( __FILE__ , __LINE__);
		$this->view("facturaForm",array(
			"destino" => "confirmar",
			"clientes" => $clientes,	// model cliente
			"fatura" => $factura,	// model factura
			"detalle" => "falso",	// no mostrar detalle.
			"Pagtitulo" => "encabezado"
		));
	}
	public function confirmar(){
		// confirmacion de facturas:
	}
	
		
	public function editar(){
		$factura = new factura();
		$clientes = new clientes();
		if(isset($_POST["id"]) or isset($_GET["facturaNueva"])){
			// si existe este campo la factura existe
			// modo editar
			$idFact=isset($_POST["id"])?$_POST["id"]:$this->get_sesion("facturaID");
			$registro=$factura->buscar("id",$idFact);
			if ($registro){
				$this->set_sesion("facturaID" , $registro->id );
			}; // else{
			// $factura->guardarform($_POST);
		
		}else{
			// agregar nueva factura.
			$idFAct=$factura->guardarform($_POST,true);
			if ($idFAct){				
				// si se crea una que se refresque el campo.
				$this->set_sesion("facturaID",$idFAct);
				$this->redirect("facturas","confirmar?facturaNueva=si");
			}else{
				// hubo algun error al intentar guardar.
				echo "error :";
				// var_dump($idFAct);
				exit(1); // falla de salida
			}
		}
		$this->view("facturaForm",array(
			"clientes" => $clientes,	// model cliente
			"fatura" => $factura,	// model factura
			"detalle" => "falso",	// no mostrar detalle.
			"Pagtitulo" => "encabezado"
		));
	}
	
	public function detalle(){
		$fac_detalle = new fact_detalle();
		$factura = new factura();
		
		if ($this->get_sesion("facturaID" )){ // retorna falso sin no existe.
			$idfactura=$this->get_sesion("facturaID" );
		}
		// formulario detalle de las factura
		$this->view("facturaFormDetalle",array(
			"facturaid"=>$idfactura,
			"Pagtitulo" =>"detalle de facturas"
		));
	}
}
