<?php
class planes_importes extends EntidadBase {

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
				"dbtipo"=>"autoincrement" ,"extras"=>['class'=>"hidden"] ,"label"=>"ID:" ),

			"idPlan"=> array( 
				"typeform" => "relacional", "claseform"=>"inputbox" , "comandoform"=>"id"
				, "extras"=>['class'=>"glyphicon glyphicon-user"] ,"label"=>"cliente:"
				,"dbtipo"=>"not null"
					// 0=columna relacionada 1=consulta sql. 2=columna a mostrar
				,"sql"=>array(
					"id",
					"select id,CONCAT( `NombrePlan`
						,' (',`CRT`
						,')' ) as nombre FROM `planes`
						 ",
					"nombre") 
				),
				
			"FechaImporte" => array( "typeform" => "fechahora","claseform"=>"inputbox","comandoform"=>"date",
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-calendar"]),
			"importe"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ,"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ),				
			
				);
		$table="planes_importes";
        
        
        parent::__construct($table);
    }

    public function tabla(){
		return $this->table ;
	}

}
