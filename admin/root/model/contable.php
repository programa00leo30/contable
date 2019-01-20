<?php
class Contable extends EntidadBase{
    
    // protected $campos;
    /*
		
	*/
	
    public function __construct($idCliente) {
		// la columna id es el id del cilente.
        $this->atributos  = array(
			"id" => array(  "typeform" => "hidden","claseform"=> "inputbox" , "comandoform"=>"no-editor", 
				"dbtipo"=>"autoincrement" ,"extras"=>['class'=>"hidden"] ) , 
			"idfact",  
			"idrec", 
			"fecha", 
			"obsev", 
			"total", 
			"tipo"	,
			// atributos especiales:
			"where" => " WHERE `id`  = '$idCliente' "
			);
        
        $table="movimientocomercial";
        
        parent::__construct($table);
    }
 	
    public function tabla(){
		return $this->table ;
	}

	
	
	/* 
	 * la tabla es de solo lectura ( vista )
	 */
	 
    public function __set($val,$campo){
		// tabla de solo lectura. ( vista )
		return false;
	}

	public function setById($comlumn,$value,$id){
		return false;
	}
	public function deleteById($id){
		return false;
	}
	public function deleteBy($column,$value){
        return false;
    }
	public function add(){
		return false;
	}
}
?>
