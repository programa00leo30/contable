<?php

/* 
	controlador de cobros. recibos de los clienets.
	* : 
*/
 class cobrosController extends ControladorBase{
	
	public function __construct() {
		parent::__construct();
		
    }
    
	
    public function index(){
       
       // $this->check();
       $this->ultimos();
         
       
    }
    public function ultimos(){
		// mostrar los ultimos movimientos de un cliente.
		// $idCliente = $this->check();
		
		$cliente = new clientes();
		// $cliente->buscar("id",$idCliente );
		// $contable = new contable($idCliente );
		$comp = new comppago();
		$this->view("cobrosListado",array(
			"factura" => $comp,
			"clientes" => $cliente,
			"Pagtitulo" => "Ultimos Movimientos de ".$cliente->nombre.", ".$cliente->apellido
		));
	}
	
	public function nuevo(){
		// agregar nuevo recibo de cobranza.
		$cliente = new clientes();
		$comp = new comppago();
		
		$this->view("cobrosForm", array(
			"clientes"=>$cliente
			,"comprobante" => $comp
			,"detalle" => false
			,"Pagtitulo" => "Crear un recibo para cliente"
		));
		
	}
	public function editaredicion(){
		$this->editar();
	}
	public function editar(){
		$cliente = new clientes();
		$comp = new comppago();
		$idRec=nz($_GET["idRecibo"],0);
		
		$this->view("cobrosForm",array(
			"clientes"=>$cliente
			,"comprobante"=>$comp
			,"idComppago"=>$idRec
			,"detalle"=>true
			,"Pagtitulo"=>"editar comprobantes de cobro"
		));
		
	}
	public function confirmar(){
		// confirma y resuelve situacion:
		if (isset($_GET["recibonuevo"])){
			// es un recibo nuevo
			$comp = new comppago();
			$rt = $comp->guardarform($_POST,true);
			$cliente = new clientes();

			if (!$comp->falla){
				// exito
				$this->set_sesion("idCompPago",$rt[1]);
				$this->view("cobrosForm",array(
					"clientes"=>$cliente
					,"comprobante"=>$comp
					,"idComppago"=>$rt[1]
					,"detalle"=>true
					,"Pagtitulo"=>"editar comprobantes de cobro"
				));
			}else{
				// existio un error:
				$this->view("cobrosForm",array(
					"clientes"=>$cliente
					,"comprobante"=>$comp
					,"detalle"=>false
					,"Pagtitulo"=>"editar comprobantes de cobro"
				));
			}
		}else if (isset($_GET["editarcheck"])){
						$comp = new comppago();
			$rt = $comp->guardarform($_POST);
			if (!$comp->fail()){
				$this->redirect("cobros","editaredicion",array("idRecibo"=>$_GET["idRecibo"]));
			}else{
				$this->redirect("cobros","falla?msg=".$rt[0][1]);
			}
		}
			
			
		
	}
	public function nuevopagafactura(){
		$fact = new saldofacturas();
		$idfact = isset($_GET["facturaid"])?$_GET["facturaid"]:-1;
		$chk = $fact->buscar("id",$idfact);
		if ($chk){
			// todo bien.
			if ($chk->adeuda <> 0){
				$comppago = new comppago();
				$compdetall = new comp_detalle();
				$idComp = $comppago->guardarform(
					array(
					"idCobrador" => 1
					,"cajero" => 1
					,"nrocontrol" => 15
					,"idCliente" => $chk->idCliente
					,"Fecha" => date("Y-m-d")
					,"Importe" => $chk->adeuda
					/*
					,"Observac" => "solicitado desde aciones"
					,"hasregistro" => base64_encode("solicitado desde aciones")
					,"hora" => date("H:i:s")
					,"medioPago" => 1 
					*/
					),true);
				if (!$comppago->fail()){
					// agregamos el deatlle.
					echo "-----idcomp dump:";
					var_dump($idComp);
					echo "-----idcomp dump:";
					
					$idCompdetalle = $compdetall->guardarform(array(
						"idComprob"=> $idComp[1]
						,"idFactura"=> $chk->id
						,"ImporteAplicado"=> $chk->adeuda
						// ,"otros"=>"
						),true);
					if (!$compdetall->fail()){
						// todo fue un exito.
						$this->redirect("cobros","ultimos?msg=agregadoOK");
					}
				}else{
					 $this->redirect("cobros","ultimos?msg=no se puedo agregar nuevo detalle");
				}
			}else{
				 $this->redirect("cobros","ultimos?msg=no se pudo agregar recibo.");
			}
		}else{
			$this->redirect("cobros","ultimos?msg=no se pudo verificar factura");
		}
	}
	
	public function editarborrar(){
		$idRecib=isset($_GET["idRecibo"])?$_GET["idRecibo"]:-1;
		$comp = new comppago();
		$comp->deleteById($idRecib);
		$this->redirect("cobros","ultimos");
		// echo "fin.";
	}
	/* *******************************************
	 * 
	 * detalle de cobros.
	 * 
	/* *******************************************/
	
	
	public function nuevodetalle(){
		// agregar nuevo detalle de recibo
		$recibo = $_GET["idRecibo"];
		if ($recibo){
			$comppago= new comp_detalle();
			$rt=$comppago->buscar("idComprob",$recibo);
			
			if($rt){
				$rtn= $comppago->guardarform($_POST,true);
				$this->view("cobrosDetalle",array(
					"comppago"=>$comppago
					,"idRecibo"=>$recibos
					,"Pagtitulo"=>"detalles de comprobante de recibos"
				));
			}
		}else{
			$this->redirect("cobros","detalle");
		}
	}
	
	public function detalle(){
		$recibo = $_GET["idRecibo"];
		if ($recibo){
			$comppago= new comppago();
			$comp_detalle= new comp_detalle();
			// $rt=$comppago->buscar("id",$recibo);
			
				$this->view("cobrosFormDetalle",array(
					"comppago"=>$comppago
					,"comp_detalle"=>$comp_detalle
					,"idRecibo"=>$recibo
					,"Pagtitulo"=>"detalles de comprobante de recibos"
				,false));
			
		}else{
			echo "sin detalle";
		}
	}
	public function confirmardetalle(){
		$compdetalle = new comp_detalle();

		if (isset($_POST["detalledelete"])){
			$id=($_POST["detalledelete"]);
			$compdetalle->deleteById($id);
			$this->redirect("cobros","editaredicion",array("idRecibo"=>$_GET["idRecibo"]));
		}else{
			if (isset($_POST["detalleenviar"])){
				// modificar 
				$compdetalle->guardarform($_POST);
				if (!$compdetalle->fail()){
					$this->redirect("cobros","detalle",array("idRecibo"=>$_GET["idRecibo"]));
				}
			}
		}
	}
}

