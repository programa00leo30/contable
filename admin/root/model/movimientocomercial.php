<?php
class movimientocomercial extends EntidadBase {

/*
 * `id`, `idComprob`, `idFactura`, `ImporteAplicado`, `otros`
 * 
 * */


	public function __construct (){
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"null" ,"extras"=>['class'=>"hidden"] ,"label"=>"ID:" ),
			"idfact"=> array(  
				"typeform" => "numerico","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"null" ,"extras"=>['class'=>"hidden"]  ),
			"idrec"=> array(  
				"typeform" => "numerico","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"null" ,"extras"=>['class'=>"hidden"]  ),
				
			"Fecha" => array( "typeform" => "fechahora","claseform"=>"inputbox","comandoform"=>"date",
				"dbtipo"=>"not null","extras"=>['class'=>"glyphicon glyphicon-calendar"]),
				
			
			"obsev"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"not null"  ),	
			
			"Total"=> array(  "typeform" => "moneda", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ,
				"dbtipo"=>"not null", "dbdefault" => 0, "label"=>"total"  ),				
			"tipo"=> array(  
				"typeform" => "numerico","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"not null" ,"extras"=>['class'=>"hidden"]  )
						
			
				);
		$table="movimientocomercial";
        // $auxiliar = " and ( `idCliente` = $IDCLIENTE )";
        
        parent::__construct($table);
    }
    
    public function total($idCliente){
		// el importe total del cliente.
		$sql="SELECT sum(total) as total FROM `movimientocomercial` WHERE id='$idCliente'";
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
	public function add(){
		return false;
	}
	public function setById($column,$a,$b){
		return false;
	}
	
    public function tabla(){
		return $this->table ;
	}

}
