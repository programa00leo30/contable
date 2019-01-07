<?php
/* 
	controlador de contabilidad: 
*/
 class cront extends ControladorBase{
	private $clientes,$facturas,$detalle,$plan;
	public function __construct() {
		parent::__construct();
		$this->clientes = new clientes();
		$this->factura = new factura();
		$this->detalle=new fact_detalle();
		$this->plan = new planes_importes();
		
    }
    private function nuevaFactura($contrato){
		$clientes = $this->clientes;
		$factura = $this->factura;
		$detalle = $this->detalle;
		$plan = $this->plan;
		
		$pl = $plan->buscar("id",$contrato->idPlan);
			$importe= (string) $pl->importe;
			// *
			$datosfac=[
				idEmpleado => 1 ,
				idCliente => $contrato->idCliente ,
				cajero => "0" ,
				nrocontrol => (string) $factura->nroControl(0) ,
				idDeContrato => $contrato->id ,
				tipFact => "C",
				Fecha => date("Y-m-d"),
				Total => (int)$importe,
				Impuesto => "0",
				Observaciones => "facturacion automatica periodo:". ["enero","febrero","marzo","abril"
					,"mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"][date("n")] ,
				nroCupon => "0"
			];
			$idDeFactura = $factura->guardarform($datosfac,true);
			// var_dump($idDeFactura);
			$datosDetalle=[
			
			idFact=>$idDeFactura[1]
			,Cantidad=>1
			,Detalle=>$contrato->otrosdatos			
			,porunidad=> (int)$importe
			,impuesto=> 0
			,subtotal=> (int)$importe
			];
			$idDetalle = $detalle->guardarform($datosDetalle,true);
			// */
			echo " cliente:". $contrato->idCliente ."(". $contrato->idPlan. ")importe: ". $importe ."\n";
	}
    public function cronometro(){
		/* *************************
		 * ejecutar acciones de cronometro.
		 * *************************/
		 
		$contrato = new contrato();
		
		while( $contrato->mostrar("Estado",1,"=") ){
			$this->nuevaFactura($contrato);
		}
		 
	}
	
}
