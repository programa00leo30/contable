<?php
class comp_detalle extends EntidadBase {

/*
 * `id`, `idComprob`, `idFactura`, `ImporteAplicado`, `otros`
 * 
 * */


	public function __construct (){
		
		// $auxiliar = " and ( `idCliente` = $IDCLIENTE )";
		$auxiliar = "";
		
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"autoincrement" ,"clas"=>"hidden" ,"label"=>"ID:" ),
			"idComprob"=> array(  
				"typeform" => "numerico","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"not null" ,"clas"=>"hidden"  ),
			
			"idFactura"=> array( 
				"dbtipo"=>"not null"
				,"typeform" => "relacional", "claseform"=>"inputbox" , "comandoform"=>"id"
				, "clas"=>"glyphicon glyphicon-user" ,"label"=>"identificador de factura"
				,"sql"=>array(
					"id",
					"select id,CONCAT( `idCliente`
						,', ',`NumeroComprobante`
						,' $',`total`
						,'( ',`adeuda`,')' ) as nombre FROM `saldofacturas`
						WHERE ( `adeuda` <> 0 ) $auxiliar
						 ",
					"nombre") 
				),
				
			
			"ImporteAplicado"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ,"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ),	
			"otros"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null" )				
						
			
				);
		$table="comp_detalle";
        
        
        parent::__construct($table);
    }
    public function sql_cliente($idCliente){
		$this->atributos["idFactura"]["sql"] = array(
					"id",
					"select id,CONCAT( `idCliente`
						,', ',`NumeroComprobante`
						,' $',`total`
						,'( ',`adeuda`,')' ) as nombre FROM `saldofacturas`
						WHERE ( `adeuda` <> 0 )  and ( `idCliente` = $idCliente )
						 ",
					"nombre")
					;
		
	}
    public function tabla(){
		return $this->table ;
	}

}
