<?php
class fact_detalle extends EntidadBase {

	public function __construct (){
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"autoincrement" ,"clas"=>"hidden" ,"label"=>"ID:" ),
			"idFact"=> array(  
				"typeform" => "relacional","claseform"=> "obligatorio" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"not null" ,"clas"=>"hidden"  ),
			"Cantidad"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ),

			"idDetalle"=> array(  
				"typeform" => "relacional","claseform"=> "obligatorio" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"not null" ,"clas"=>"hidden"  ),
				
			"Detalle"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"not null" ),
				
			"porunidad"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ),
			"impuesto"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ),
			"subtotal"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" )
				);
		 $table="fac_detalle";
        
        parent::__construct($table);
    }
    
    public function tabla(){
		return $this->table ;
	}
	public function add(){
		// para agregar un registro
		if (isset($this->idFac) and $this->idFac != ""){
			// confirmar que tengo una factura asociada.
			parent::add();
		}
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
