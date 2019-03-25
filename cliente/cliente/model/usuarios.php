<?php
class usuarios extends EntidadBase{
    
    
    // protected $campos;
    /*
		protected $id;
    protected $activo;
    protected $nombre;
    protected $apellido;
    protected $nombusuario;
    protected $Passwd;
    protected $sexo;
    protected $tipodocumento;
    protected $docnro;
    protected $fechanac;
    protected $nacionalidad;
    protected $direccion;
    protected $localidad;
    protected $provincia;
    protected $cp;
    protected $mail;
    protected $tel;
    protected $celular;
	*/
	
    public function __construct() {
        $this->atributos  = array(
			"id"=> array(  
				"typeform" => "hidden","claseform"=> "inputbox" , 
				"comandoform"=>"no-editor",
				"dbtipo"=>"autoincrement" ,"extras"=>['class'=>"hidden"] ,"label"=>"ID:" ),
			"activo" => array( "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-user"] ) ,
			"nombre"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-user"] ),
			"apellido"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-user"] ),
			"nombusuario"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-user"] ),
			"Passwd" => array( "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-user"] ) , 
			"sexo"=> array( "typeform" =>  "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"not null","extras"=>['class'=>"glyphicon glyphicon-tags"] ),
			"tipodocumento" => array( "typeform" => "list", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null", "extras"=>['class'=>"glyphicon glyphicon-user"] ,"label"=>"tipo de documento",
					"list"=>array("DNI" ,"LE","LC","LU","CDI","RUC" ) 
					) ,
			"docnro" => array( "typeform" => "numerico","claseform"=>"inputbox","comandoform"=>"numerico",
				"dbtipo"=>"null" ,"extras"=>['class'=>"glyphicon glyphicon-sort-by-attributes"]),
			"fechanac" => array( "typeform" => "fechahora","claseform"=>"inputbox","comandoform"=>"date",
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-calendar"]),
			"nacionalidad"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-home"] ),
			"direccion"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-home"] ),
			"localidad"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-home"] ),
			"provincia"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-home"] ),
			"cp"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","htmlfirst"=>"<span class=\"input-group-addon\">CP</span>" , ),
			"mail"=> array( "typeform" =>  "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","htmlfirst"=>"<span class=\"input-group-addon\">@</span>" , ),
			"tel"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-earphone"] ),
			"celular"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","extras"=>['class'=>"glyphicon glyphicon-phone"] )
				);
        
        $table="clientes";
        
        parent::__construct($table);
    }
    
    public function tabla(){
		return $this->table ;
	}
	public function iporigen($ipOrigen){
		// buscar la direccion ip para el cliente.
		$contrato = new contrato();
		$rt= $contrato->buscar("ip",$ipOrigen);
		if ( $rt ){
			$cl=$this->buscar("id",$rt->idCliente);
		
			if ($cl){
				return $cl;
			}
		};
		return false;
	}
	
	

}
?>
