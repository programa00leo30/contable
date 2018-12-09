<?php
class Clientes extends EntidadBase{
    
    
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
				"dbtipo"=>"autoincrement" ,"clas"=>"hidden" ,"label"=>"ID:" ),
			"activo" => array( "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-user" ) ,
			"nombre"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-user" ),
			"apellido"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-user" ),
			"nombusuario"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-user" ),
			"Passwd" => array( "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-user" ) , 
			"sexo"=> array( "typeform" =>  "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"not null","clas"=>"glyphicon glyphicon-tags" ),
			"tipodocumento" => array( "typeform" => "list", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null", "clas"=>"glyphicon glyphicon-user" ,"label"=>"tipo de documento",
					"list"=>array("DNI" ,"LE","LC","LU","CDI","RUC" ) 
					) ,
			"docnro" => array( "typeform" => "numerico","claseform"=>"inputbox","comandoform"=>"numerico",
				"dbtipo"=>"null" ,"clas"=>"glyphicon glyphicon-sort-by-attributes"),
			"fechanac" => array( "typeform" => "fechahora","claseform"=>"inputbox","comandoform"=>"date",
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-calendar"),
			"nacionalidad"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-home" ),
			"direccion"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-home" ),
			"localidad"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-home" ),
			"provincia"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-home" ),
			"cp"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","htmlfirst"=>"<span class=\"input-group-addon\">CP</span>" , ),
			"mail"=> array( "typeform" =>  "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","htmlfirst"=>"<span class=\"input-group-addon\">@</span>" , ),
			"tel"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-earphone" ),
			"celular"=> array(  "typeform" => "text", "claseform"=>"inputbox" , "comandoform"=>"alfanumerico", 
				"dbtipo"=>"null","clas"=>"glyphicon glyphicon-phone" )
				);
        
        $table="clientes";
        
        parent::__construct($table);
    }
    
    public function tabla(){
		return $this->table ;
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
?>
