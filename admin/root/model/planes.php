<?php
class planes extends EntidadBase {

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

			"NombrePlan"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-user" ),
			"CRT"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-user" ),			
			
				);
		$table="planes";
        
        
        parent::__construct($table);
    }
    
	public function importe($idplan= ""){
		// el importe total del cliente.
		if ($idplan == "") $idplan=$this->id;
		
		$sql="SELECT importe as total FROM `planes_con_importes` WHERE id='$idplan'";
		$sqtr=$this->query($sql);
		if ($sqtr){
			$rt=$sqtr->fetch_object();
			if ($rt){
				return $rt->total;
			}else return 0;
		}else{ 
			// echo $this->fail().$sql;
			return -1;
		}
	}
		
	
    public function tabla(){
		return $this->table ;
	}

}
