<?php
class comp_detalle extends EntidadBase {

/*
 * `id`, `idComprob`, `idFactura`, `ImporteAplicado`, `otros`
 * 
 * */


	public function __construct (){
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"autoincrement" ,"clas"=>"hidden" ,"label"=>"ID:" ),
			"idComprob"=> array(  
				"typeform" => "numerico","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"not null" ,"clas"=>"hidden"  ),
			"idFact"=> array(  
				"typeform" => "numerico","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"not null" ,"clas"=>"hidden"  ),
			
			"ImporteAplicado"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ,"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ),	
			"otros"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"not null" )				
						
			
				);
		 $table="comp_detalle";
        
        parent::__construct($table);
    }
    
    public function tabla(){
		return $this->table ;
	}

}
