<?php
class facturasController extends ControladorBase{
     
    public function __construct() {
        parent::__construct();
    }
	public function ultimas(){
		// listado de facturas no cerradas
		$factura=new factura();
		$clientes = new clientes();
		$saldofacturas = new saldofacturas();
		$this->view("facturaListado",array(
			"factura" => $factura,
			"saldofacturas" => $saldofacturas,
			"clientes" => $clientes,
			"Pagtitulo" => "ultimas facturas"
		));
		
	}
	public function pagar(){
	
		$this->redirect("cobros"
			,"nuevopagafactura"
			,array(
				"facturaid"=>isset($_GET["idFactura"])?$_GET["idFactura"]:-1
			)
		);
		
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
			"detalle" => false,	// no mostrar detalle.
			"Pagtitulo" => "encabezado"
		));
	}
	public function confirmar(){
		// recibo nueva factura o edicion de factura.
		// confirmacion de facturas:
		$factura = new factura();
		$clientes = new clientes();
		if(isset($_POST["id"])){
			// si existe este campo la factura existe
			// modo editar
			$idFact=isset($_POST["id"])?$_POST["id"]:$this->get_sesion("facturaID");
			$registro=$factura->buscar("id",$idFact);
			if ($registro){
				$factura->guardarform($_POST);
				$this->set_sesion("facturaID" , $registro->id );
				$this->redirect("facturas","editar?idFactura=".$registro->id);
			}elseif (isset($_GET["facturaNueva"])){
				$this->redirect("facturas","fail?error=$registro");
			}
		}elseif (isset($_GET["facturaNueva"])){
			// no hay id de factura se agrega nueva factura.
			// var_dump($_POST);
			list($error,$idFact) = $factura->guardarform($_POST,true);
			if ($error){				
				// si se crea una que se refresque el campo.
				$this->set_sesion("facturaID",$idFact);
				$this->redirect("facturas","editar?idFactura=".$idFact);
				//echo "exito $idFact"; 
			}else{
				// hubo algun error al intentar guardar.
				$this->redirect("facturas","fail?msg='existio un error'");
				// echo "fallo";
			}
		}else{
			// opcion desconocida.
			$this->redirect("facturas","nueva");
		}
		
	}
	public function fail(){
		// mostrar mensaje en caso de falla
		// echo "existio un error mensaje:".(isset($_GET["msg"])?$_GET["msg"]:"falla");
		$this->view("error",array(
			"nro"=>0,
			"title"=>"FACTURAS",
			"text"=>"existio una falla en la operacion con la factura",
			"mensaje"=>nz($_GET["msg"],"desconocida"),
			"control"=>"facturas",
			"accion"=>"index"
		));
		
	}
	public function edicion(){
		// diferencia con editar es que no valida con get_sesion();
		// Envio formulario para edicion de facturas no cerradas.
		$factura = new factura();
		$clientes = new clientes();
		if (isset($_GET["idFactura"])){
			$idF = (int)($_GET["idFactura"]);
			// comprobacion de confianza. no solicitar algo y editar otra.
			$factura->buscar("id",$idF);
			if ($factura->factCerrada == 0){
				// la factura puede ser editada.
				$this->set_sesion("facturaID",$idF);
				$this->view("facturaForm",array(
					"destino" => "confirmar",
					"clientes" => $clientes,	// model cliente
					"fatura" => $factura,	// model factura
					"idfatura" => $idF,
					"detalle" => true,	// no mostrar detalle.
					"Pagtitulo" => "editando factura"
				));
			}else{
				$this->redirect("facturas","fail?msg='la factura no puede editarse ya esta cerrada'");
			}
		}else{
			// los datos no condicen.
			$this->redirect("facturas","fail?msg='falla de datos'");
		}
	}
	public function editar(){
		// Envio formulario para edicion de facturas no cerradas.
		$factura = new factura();
		$clientes = new clientes();
		if (isset($_GET["idFactura"])){
			$idF = (int)($_GET["idFactura"]);
			if ($idF == $this->get_sesion("facturaID")){
				// comprobacion de confianza. no solicitar algo y editar otra.
				$factura->buscar("id",$idF);
				if ($factura->factCerrada == 0){
					$this->view("facturaForm",array(
						"destino" => "confirmar",
						"clientes" => $clientes,	// model cliente
						"fatura" => $factura,	// model factura
						"idfatura" => $idF,
						"detalle" => true,	//mostrar detalle.
						"Pagtitulo" => "editando factura"
					));
				}else{
					$this->redirect("facturas","fail?msg='la factura no puede editarse ya esta cerrada'");
				}
			}else{
				$this->redirect("facturas","fail?msg='solicitud de edicion no autorizada'");
			}	
		}else{
			// los datos no condicen.
			$this->redirect("facturas","fail?msg='falla de datos'");
		}
	}
	/* 
	 * borrar una factura:
	 * 
	 */
	public function borrar(){
		$idFact=nz($_GET["idFactura"],-1);
		$fac=new factura();
		$f=$fac->buscar("id",$idFact);
		$msg="sin cambio";
		if ($f){
			$faDet=new fact_detalle();
			$faDet->deleteBy("idFact",$f->id);
			$fac->deleteById($idFact);
			$msg="eliminada confirmada";
		}
		$this->redirect("facturas","ultimas?msg=$msg");
	}
	/* 
	 * control de detalle de factura:
	 * 
	 */
	public function detalle(){
		$fac_detalle = new fact_detalle();
		$factura = new factura();
		
		if (isset($_GET["idfac"])){
			$idfactura=$_GET["idfac"];
		}elseif ($this->get_sesion("facturaID" )){ // retorna falso sin no existe.
			$idfactura=$this->get_sesion("facturaID" );
		}else{
			$this->redirect("facturas","fail?msg='falla obtencion detalle'");
		}
		$this->plantilla("");
		// formulario detalle de las factura
		$this->view("facturaFormDetalle",array(
			"idfactura"=>$idfactura,
			"fact_detalle"=>$fac_detalle,
			"Pagtitulo" =>"detalle de facturas"
		));
	}
	public function checfactura($idfact ){
		// verificar si esta factura puede ser modificada.
		return true; // invalidacion.
		
	}
	public function deldetalle(){
		$fac_detalle = new fact_detalle();
		// verificar informacion:
		if (isset($_GET["deleted"])){
			// eliminar detalle
			$det=nz($_POST["id"]);
			$chec=$fac_detalle->buscar("id",$det);
		// $this->checfactura();
			if ($chec and $this->checfactura($fac_detalle->idFact ) ){
				$iddet=$fac_detalle->deleteById($det);
				if ($iddet){
					// var_dump($iddet);
					$this->redirect("facturas","detalle?idfac=".$fac_detalle->idFact);
				}else{
					$this->redirect("facturas","fail?msg='no se pudo editar el detalle'");
				}
			}else{
				$this->redirect("facturas","fail?msg='detalle no encontrado'");
			}
		}else{
			// edicion de detalle:
			$this->redirect("facturas","fail?msg='detalle no encontrado'");				
		}
	}
	public function confirmardetalle(){
		$fac_detalle = new fact_detalle();
		// $this->checfactura();
		// verificar informacion:
		if (isset($_GET["agregar"])){
			// nuevo detalle.
			$iddet=$fac_detalle->guardarform($_POST,true);
			if ($iddet){
				// var_dump($iddet);
				$this->redirect("facturas","detalle?idfac=".$fac_detalle->idFact);
			}else{
				$this->redirect("facturas","fail?msg='no se pudo agregar el detalle'");
			}
		}else{
			// edicion de detalle:
			$det=nz($_POST["id"]);
			$chec=$fac_detalle->buscar("id",$det);
			if ($chec and $this->checfactura($fac_detalle->idFact )){
				$iddet=$fac_detalle->guardarform($_POST);
				if ($iddet){
					// var_dump($iddet);
					$this->redirect("facturas","detalle?idfac=".$fac_detalle->idFact);
				}else{
					$this->redirect("facturas","fail?msg='no se pudo editar el detalle'");
				}
			}else{
				$this->redirect("facturas","fail?msg='detalle no encontrado'");
			}	
		}
	}
}
