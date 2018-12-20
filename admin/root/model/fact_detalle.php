<?php
class fact_detalle extends EntidadBase {

	public function __construct (){
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"autoincrement" ,"clas"=>"hidden" ,"label"=>"ID:" ),
			"idFact"=> array(  
				"typeform" => "numerico","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"not null" ,"clas"=>"hidden"  ),
				
			"Cantidad"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ),

			"idDetalle"=> array(  
				"typeform" => "relacional","claseform"=> "obligatorio" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"null" ,"clas"=>"hidden"  ),
				
			"Detalle"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"not null" ),
				
			"porunidad"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ,"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ),
			"impuesto"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ,"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ),
			"subtotal"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"null" ,"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" )
				);
		 $table="fac_detalle";
        
        parent::__construct($table);
    }
    
    public function tabla(){
		return $this->table ;
	}
	public function add(){
		// calcular el subtotal:
		// echo "agregando registro...";
		if ($this->Cantidad == 0 ){
			$this->Cantidad = 1;
		}
		if ($this->porunidad != 0 ){
				$this->subtotal = $this->Cantidad * $this->porunidad ;
		}else{
			$this->porunidad = $this->subtotal / $this->Cantidad;
		}
		// var_dump($this);
		return parent::add();
		
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
