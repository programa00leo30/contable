<?php
class facturacompra_detalle extends EntidadBase {

	public function __construct (){
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"autoincrement" ,"clas"=>"hidden" ,"label"=>"ID:" ),
			"idFactV"=> array(  
				"typeform" => "relacional","claseform"=> "obligatorio" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"not null" ,"clas"=>"hidden"  ),
			"Cantidad"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"default null" ),
			"Detalle"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"not null" ),
			"porunidad"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"DEFAUL NULL" ),
			"impuesto"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"DEFAUL NULL" ),
			"subtotal"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"DEFAUL NULL" )
				);
		 $table="facuracompra_detalle";
        
        parent::__construct($table);
    }
    
    public function tabla(){
		return $this->table ;
	}

	public function check($campo,$valor){
		// busca en la base de datos el valor del campo
		if (in_array($campo,$this->columnas)){
			
			$tmp = parent::getAll();
			foreach($tmp as $tm ){
				if ($tm->$campo == $valor ){
					// valor encontrado.
					foreach($this->columnas as $c){
						$this->$c = $tm->{$c} ;
					}
					return true;
				}
			}
		}else
			return false;
	}
}
