<?php
class facturadetalleController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }

	
	public function fail(){
		// mostrar mensaje en caso de falla
		// echo "existio un error mensaje:".(isset($_GET["msg"])?$_GET["msg"]:"falla");
		$this->view("error",array(
			"nro"=>0,
			"title"=>"FACTURAS",
			"text"=>"existio una falla en la operacion con la factura detalle",
			"mensaje"=>nz($_GET["msg"],"desconocida"),
			"control"=>"facturadetalle",
			"accion"=>"index"
		));
		
	}
	public function detalle(){
		$this->index();
	}
	public function index(){
		$fac_detalle = new fact_detalle();
		$factura = new factura();
		
		if (isset($_GET["idfac"])){
			$idfactura=$_GET["idfac"];
		}elseif ($this->get_sesion("facturaID" )){ // retorna falso sin no existe.
			$idfactura=$this->get_sesion("facturaID" );
		}else{
			$this->redirect("facturadetalle","fail?msg='falla obtencion detalle'");
		}
		// $this->plantilla("");
		// formulario detalle de las factura
		$this->view("facturaFormDetalle",array(
			"idfactura"=>$idfactura,
			"fact_detalle"=>$fac_detalle,
			"Pagtitulo" =>"detalle de facturas"
		),false);
	}
	public function checfactura($idfact ){
		// verificar si esta factura puede ser modificada.
		return true; // invalidacion.
		
	}
	/* eliminiar un detalle */
	private function del_detalle(){
		$fac_detalle = new fact_detalle();
		// verificar informacion:
			$det=nz($_POST["id"]);
			$chec=$fac_detalle->buscar("id",$det);
		// $this->checfactura();
			if ($chec and $this->checfactura($fac_detalle->idFact ) ){
				$iddet=$fac_detalle->deleteById($det);
				if ($iddet){
					// var_dump($iddet);
					$this->redirectDetalle($fac_detalle->idFact);
				}else{
					$this->redirect("facturadetalle","fail?msg='no se pudo editar el detalle'");
				}
			}else{
				$this->redirect("facturadetalle","fail?msg='detalle no encontrado'");
			}
	}
	/* guardar informacion en la base de datos.*/
	public function confirmardetalle(){
		
		switch (  $_POST["boton"]) {
			case "add" :
			case "change":
				$this->confirmar();break;
			case "delete":
				// echo "eliminando";break;
				$this->del_detalle();break;
			default:
				$this->index();break;
			
		}
	}
	public function confirmar(){
		$fac_detalle = new fact_detalle();
		// $this->checfactura();
		// verificar informacion:
		if (isset($_GET["agregar"])){
			// nuevo detalle.
			$iddet=$fac_detalle->guardarform($_POST,true);
			if ($iddet){
				// var_dump($iddet);
				$this->redirectDetalle($fac_detalle->idFact);
			}else{
				$this->redirect("facturadetalle","fail?msg='no se pudo agregar el detalle'");
			}
		}else{
			// edicion de detalle:
			$det=nz($_POST["id"]);
			$chec=$fac_detalle->buscar("id",$det);
			if ($chec and $this->checfactura($fac_detalle->idFact )){
				$iddet=$fac_detalle->guardarform($_POST);
				if ($iddet){
					// var_dump($iddet);
					$this->redirect("facturadetalle","detalle",array("idfac"=>$fac_detalle->idFact));
				}else{
					$this->redirect("facturadetalle","fail?msg='no se pudo editar el detalle'");
				}
			}else{
				$this->redirect("facturadetalle","fail?msg='detalle no encontrado'");
			}	
		}
	}
	private function redirectDetalle($idFact){	
		$this->redirect("facturadetalle","detalle",array("idfac"=>$idFact));
	}
		
}
