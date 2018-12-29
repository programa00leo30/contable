<?php
class contrato extends EntidadBase {

/*
 * `id`, `nrocontrato`, `seccion`, 
 * `ip`, `localidad`, `idEquipo`, `idCliente`, 
 * `idPlan`, `idEmpleado`, `Estado`, `fechaalta`, 
 * `fechacierre`, `otrosdatos`
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
			
			"seccion"=> array(  
				"dbtipo"=>"not null", 
				"typeform" => "numerico", "comandoform"=>"numerico", 
				"claseform"=>"inputbox" , "clas"=>"glyphicon glyphicon-th-list",
				"label"=>"Seccion de identificacion:" ),
				
			"nrocontrato"=> array(  
				"dbtipo"=>"not null", 
				"typeform" => "numerico", "comandoform"=>"numerico", 
				"claseform"=>"inputbox" , "clas"=>"glyphicon glyphicon-tags",
				"label"=>"Numero de contrato:" ),
			
			"ip"=> array(  
				"dbtipo"=>"null",
				"typeform" => "text", "comandoform"=>"alfanumerico", 
				"claseform"=>"inputbox" , "clas"=>"glyphicon glyphicon-user" ,
				"label"=>"ip de cliente:" ),
			
			"localidad"=> array(  
				"dbtipo"=>"null",
				"typeform" => "text", "comandoform"=>"alfanumerico", 
				"claseform"=>"inputbox" , "clas"=>"glyphicon glyphicon-user" ,
				"label"=>"localidad de instalacion:" ),
			
			"idEquipo"=> array( 
				"dbtipo"=>"null"
				,"typeform" => "relacional", "comandoform"=>"id", 
				"claseform"=>"inputbox", "clas"=>"gglyphicon glyphicon-modal-window" ,
				"label"=>"equipo utilizado:"
				,"sql"=>array(
					"id",
					"
					SELECT id,  
					select id,CONCAT( `ip`
						,'[',`mac`
						,'] ',`identificador` ) as nombre  FROM `equipos`
						WHERE `estado` = 1 
						 ",
					"nombre") 
				),
			
			"idCliente"=> array( 
				"dbtipo"=>"not null", 
				"typeform" => "relacional", "comandoform"=>"id", 
				"claseform"=>"inputbox" , "clas"=>"glyphicon glyphicon-user" ,
				"label"=>"cliente:",
					// 0=columna relacionada 1=consulta sql. 2=columna a mostrar
					"sql"=>array("id","select id,CONCAT( `nombre`,', ',`apellido`) as nombre FROM `clientes` ","nombre") 
					),
			
			"idPlan"=> array( 
				"dbtipo"=>"null", 
				"typeform" => "relacional", "comandoform"=>"id", 
				"claseform"=>"inputbox" , "clas"=>"glyphicon glyphicon-compressed" ,
				"label"=>"Plan contratado:",
					// 0=columna relacionada 1=consulta sql. 2=columna a mostrar
					"sql"=>array("id","SELECT 
						id,
						CONCAT( `planes_con_importes`,' [',`CRT`,'] $',`importe`) as nombre 
						FROM `planes_con_importes` ",
						"nombre") 
					),
				
			
			"idEmpleado"=> array( 
				"dbtipo"=>"not null", 
				"typeform" => "relacional", "comandoform"=>"id", 
				"claseform"=>"inputbox" , "clas"=>"glyphicon glyphicon-user" ,
				"label"=>"Quien Realiza la el contrato:",
					// 0=columna relacionada 1=consulta sql. 2=columna a mostrar
					"sql"=>array("id","SELECT  id,CONCAT( `Nombre`,', ',`Apellido`) as nombre FROM `empleados` ","nombre") 
			),
			
			"Estado"=> array( 
				"dbtipo"=>"not null", "dbdefault" => 1,
				"typeform" => "relacional", "comandoform"=>"id", 
				"claseform"=>"inputbox" , "clas"=>"glyphicon glyphicon-user" ,
				"label"=>"Estado actual del contrato:",
					// 0=columna relacionada 1=consulta sql. 2=columna a mostrar
					"sql"=>array("id","SELECT id,`estado` as nombre FROM `contrato_estados` ","nombre") 
			),
				
			
				);
		$table="contrato";
        
        
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
