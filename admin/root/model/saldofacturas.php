<?php
class saldofacturas extends EntidadBase {

/*
 * `id`, `idCliente`, `Fecha`, `NumeroComprobante`, `total`, `pago`, `adeuda`
 * 
 * */


	public function __construct (){
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"null" ,"clas"=>"hidden" ,"label"=>"ID:" ),
			"idCliente"=> array(  
				"typeform" => "numerico","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"null" ,"clas"=>"hidden"  ),

				
			"Fecha" => array( "typeform" => "fechahora","claseform"=>"inputbox","comandoform"=>"date",
				"dbtipo"=>"not null","clas"=>"glyphicon glyphicon-calendar"),
				
			
			"NumeroComprobante"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"not null"  ),	
			
			"total"=> array(  "typeform" => "moneda", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ,
				"dbtipo"=>"not null", "dbdefault" => 0, "label"=>"total"  ),				

			"pago"=> array(  "typeform" => "moneda", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ,
				"dbtipo"=>"not null", "dbdefault" => 0, "label"=>"total"  ),				

			"adeuda"=> array(  "typeform" => "moneda", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ,
				"dbtipo"=>"not null", "dbdefault" => 0, "label"=>"total"  ),				

						
			
				);
		$table="saldofacturas";
        // $auxiliar = " and ( `idCliente` = $IDCLIENTE )";
        
        parent::__construct($table);
    }
    
    public function saldo($idFactura){
		// el importe total del cliente.
		$sql="SELECT adeuda as total FROM `saldofacturas` WHERE id='$idFactura'";
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
