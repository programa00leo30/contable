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
		$this->plan = new planes();
		
    }
    private function nuevaFactura($contrato){
		$clientes = $this->clientes;
		$factura = $this->factura;
		$detalle = $this->detalle;
		$plan = $this->plan;
		
		//$pl = $plan->buscar("id",$contrato->idPlan);
			$importe= (string) $plan->importe($contrato->idPlan);
			// *
			$datosfac=[
				idEmpleado => 1 ,
				idCliente => $contrato->idCliente ,
				cajero => "0" ,
				nrocontrol => (string) $factura->nroControl(0) ,
				idDeContrato => $contrato->id ,
				tipFact => "C",
				Fecha => date("Y-m-d"),
				Total => (string)$importe,
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
		$dia=date("d");
		$mes=date("m");
		$hora=date("H");
		$min=date("i");
		$diaSemana = date("N");
		/*
		 * ar("Minutos",$html)])
		 * r("Horas",$html)])
		 * _editar("DiaMes",$html)])
		 * r("Mes",$html)])
		 * strar_editar("DiaSemana",$
		 * 
		 * */
		
		$contrato = new contrato();
		// agregar control de tiempo:
		
		while( $contrato->mostrar("Estado",1,"=") ){
			$ban=true;
			/* los * equivalen a todos */
			if ( ( $contrato->Minutos <> "*" ) and ( $contrato->Minutos <> $min ) ) $ban=false ;
			if ( ( $contrato->Horas <> "*" ) and ( $contrato->Horas <> $hora ) ) $ban=false ;
			if ( ( $contrato->DiaMes <> "*" ) and ( $contrato->DiaMes <> $dia ) ) $ban=false ;
			
			if ( ( $contrato->Mes <> "*" ) and ( $contrato->Mes <> $mes ) ) $ban=false ;
			if ( ( $contrato->DiaSemana <> "*" ) and ( $contrato->DiaSemana <> $diaSemana ) ) $ban=false ;
			
			if ($ban){
				// crear una factura:
				$this->nuevaFactura($contrato);
			}else{
				echo new html("html",[],[
					new html("head",[])
					,new html("body",[],
						[
							new html("div",[],"contrato no ejecutado:".$contrato->id)
						]
					)
				]);
			}
		}
		 
	}
	
}
