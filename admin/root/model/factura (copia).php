<?php
class factura extends EntidadBase {
	/*
	  `id` int(11) NOT NULL,
	  `idEmpleado` int(11) NOT NULL,
	  `idCliente` int(11) NOT NULL,
	  `cajero` int(4) NOT NULL DEFAULT '0',
	  `nrocontrol` int(11) DEFAULT NULL,
	  `factCerrada` int(1) DEFAULT '0' COMMENT 'si la factura es posible modificarla',
	  `idDeContrato` int(11) DEFAULT NULL COMMENT 'que contrato genero la factura',
  `tipFact` varchar(1) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'se refiere a fact A o B o C.',
  `Fecha` date DEFAULT NULL,
  `Total` decimal(12,4) NOT NULL,
  `Impuesto` decimal(12,4) NOT NULL,
  `Observaciones` text COLLATE utf8_spanish2_ci,
  `nroCupon` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
  */
	public function __construct (){
		
		tiempo( __FILE__ , __LINE__);
		
		$this->atributos = array (
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"autoincrement" ,"clas"=>"hidden" ,"label"=>"ID:" ),

			"idEmpleado"=> array( 
				"typeform" => "relacional", "claseform"=>"inputbox" , "comandoform"=>"id", 
				"dbtipo"=>"not null", "clas"=>"glyphicon glyphicon-user" ,"label"=>"atendido por:",
					// 0=columna relacionada 1=consulta sql.
					"sql"=>array("id","select id,Nombre FROM `empleados` ","Nombre")  
					) ,
			"idCliente"=> array( 
				"typeform" => "relacional", "claseform"=>"inputbox" , "comandoform"=>"id", 
				"dbtipo"=>"not null", "clas"=>"glyphicon glyphicon-user" ,"label"=>"cliente:",
					// 0=columna relacionada 1=consulta sql. 2=columna a mostrar
					"sql"=>array("id","select id,CONCAT( `nombre`,', ',`apellido`) as nombre FROM `clientes` ","nombre") 
					),
			"factCerrada"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"default" ,"dbdefault"=>0, 
				"clas"=>"hidden" ,"label"=>"la factura esta cerrada?" ),					
			"idDeContrato"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"null" ,"clas"=>"hidden" ,"label"=>"ID:" ),					
			
			"cajero"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"default null","label"=>"nro punto venta" ),
			"nrocontrol"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"not null" , "label" => "nro Factura"),
			
			"tipFact" => array( 
				"typeform" => "list", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"not null", "clas"=>"" ,"label"=>"tipo de factura",
					"list"=>array("A","B","C","D" ) 
					) ,
			"Fecha" => array( "typeform" => "fechahora","claseform"=>"inputbox","comandoform"=>"date",
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-calendar"),
			"Impuesto"=> array(  "typeform" => "numerico", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"dbtipo"=>"DEFAUL NULL",
				"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ,"label"=>"Impuesto"),
			"Total"=> array(  "typeform" => "moneda", "claseform"=>"inputbox" , "comandoform"=>"numerico", 
				"htmlfirst"=>"<span class=\"input-group-addon\">$</span>" ,
				"dbtipo"=>"DEFAUL NULL", "label"=>"total" ),
			"Observaciones"=> array(  "typeform" => "textarea", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","label"=>"Observaciones" ),
			"nroCupon"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null", "label"=>"Numero de cupon:" )
				);
		
		 $table="factura";
		 tiempo( __FILE__ , __LINE__);
        parent::__construct($table);
		 tiempo( __FILE__ , __LINE__);
    }
    
    public function tabla(){
		return $this->table ;
	}
	public function add(){
		// completa algunos campos obligatorios y de valor 0
		$this->idDeContrato=0;
		$this->Impuesto=0;
		$this->Total=0;
		parent::add();
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
