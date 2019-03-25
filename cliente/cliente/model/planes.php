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
				"dbtipo"=>"autoincrement" ,"extras"=>['class'=>"hidden"] ,"label"=>"ID:" ),

			"NombrePlan"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-user"] ),
			"CRT"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-user"] ),			
			
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
	public function guardarform($post,$agregar=false){
		if (isset($post["importe"])){
			$importe = $this->importe((isset($post["id"])?$post["id"]:-1) );
			if ($importe <> $post["importe"] ){
				$nuevoImporte = $post["importe"];
			}
			unset($post["importe"]);			
		}
		$rt = parent::guardarform($post,$agregar);
		
		if ( $rt[0][0] and isset($nuevoImporte)){
			// Debuger::log("planes","agregando nuevo importe");
			$nuevodetalle = new planes_importes();
			$nuevodetalle->guardarform( array(
				"idPlan"=>$rt[1]
				,"FechaImporte" => date("Y-m-d H:i:s")
				,"importe" => $nuevoImporte
			) , true);
		}
		// Debuger::log("planes","fin de guardar");
		return $rt;
			
	}
	
    public function tabla(){
		return $this->table ;
	}

}
