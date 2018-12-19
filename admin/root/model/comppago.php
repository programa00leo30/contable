<?php
class comppago extends EntidadBase {
	/*
* `id`
* `idCobrador`,
* 
* , `cajero`, `nrocontrol`,
*  `idCliente`, `Fecha`, `Importe`, 
*  `Observac`, `hasregistro`, `nombrecupon`, `cupon`, `fechacupon`,
*  `hora`, `medioPago`
* 
  */
	public function __construct (){
		
		tiempo( __FILE__ , __LINE__);
		
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"autoincrement" ,"clas"=>"hidden" ,"label"=>"ID:" ),

			"idCobrador"=> array( 
				"typeform" => "relacional", "claseform"=>"inputbox" , "comandoform"=>"id", 
				"dbtipo"=>"not null", "clas"=>"glyphicon glyphicon-user" ,"label"=>"atendido por:",
					// 0=columna relacionada 1=consulta sql.
					"sql"=>array("id","select id,Nombre FROM `empleados` ","Nombre")  
					) ,
			"idCliente"=> array( 
				"typeform" => "relacional", "claseform"=>"inputbox" , "comandoform"=>"id", 
				"dbtipo"=>"not null", "clas"=>"glyphicon glyphicon-user" ,"label"=>"cliente:",
					// 0=columna relacionada 1=consulta sql. 2=columna a mostrar
					"sql"=>array("id"
						,"select id,CONCAT( `nombre`,', ',`apellido`) as nombre FROM `clientes` "
						,"nombre") 
					),
			"Fecha"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"default" ,"dbdefault"=>0, 
				"clas"=>"hidden" ,"label"=>"la factura esta cerrada?" ),									
			
			"cajero"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"default null","label"=>"nro punto venta" ),
			"nrocontrol"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"not null" , "label" => "nro Factura"),
			

			"fechacupon" => array( "typeform" => "fechahora","claseform"=>"inputbox","comandoform"=>"date",
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-calendar"),
			"Importe"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"DEFAUL NULL",
				"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ,"label"=>"Impuesto"),
			
			"Observac"=> array(  "typeform" => "textarea", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","label"=>"Observaciones" ),
			
			"cupon"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null", "label"=>"Numero de cupon:" )
			,"hasregistro"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null", "label"=>"Numero de cupon:" )
			,"nombrecupon"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null", "label"=>"Numero de cupon:" )
			,"medioPago"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null", "label"=>"Numero de cupon:" )
			,"hora"=> array(  "typeform" => "time", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null", "label"=>"Numero de cupon:" )
				);
		
		 $table="comppago";
		 
        parent::__construct($table);
		
    }
    
    public function tabla(){
		return $this->table ;
	}
	
}
